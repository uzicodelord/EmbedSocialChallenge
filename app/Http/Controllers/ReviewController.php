<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function filterAndSortReviews(Request $request)
    {
        $reviews = json_decode(file_get_contents(storage_path('app/reviews.json')), true);

        $minRating = $request->input('min_rating');
        $reviews = array_filter($reviews, function ($review) use ($minRating) {
            return $review['rating'] >= $minRating;
        });

        $prioritizeText = $request->input('prioritize_text');

        if ($prioritizeText === 'yes') {
            $reviewsWithText = array_filter($reviews, function ($review) {
                return !empty($review['reviewText']);
            });

            $reviewsWithoutText = array_filter($reviews, function ($review) {
                return empty($review['reviewText']);
            });

            $ratingOrder = $request->input('rating_order');
            $dateOrder = $request->input('date_order');

            usort($reviewsWithText, function ($a, $b) use ($dateOrder) {
                if ($a['rating'] === $b['rating']) {
                    return strtotime($a['reviewCreatedOnDate']) - strtotime($b['reviewCreatedOnDate']);
                }

                return $b['rating'] - $a['rating'];
            });

            usort($reviewsWithoutText, function ($a, $b) use ($dateOrder) {
                if ($a['rating'] === $b['rating']) {
                    return strtotime($a['reviewCreatedOnDate']) - strtotime($b['reviewCreatedOnDate']);
                }

                return $b['rating'] - $a['rating'];
            });

            // Merge and return the sorted reviews
            $sortedReviews = array_merge($reviewsWithText, $reviewsWithoutText);
        } else {
            $ratingOrder = $request->input('rating_order');
            $dateOrder = $request->input('date_order');

            usort($reviews, function ($a, $b) use ($dateOrder) {
                if ($a['rating'] === $b['rating']) {
                    return strtotime($a['reviewCreatedOnDate']) - strtotime($b['reviewCreatedOnDate']);
                }

                return $b['rating'] - $a['rating'];
            });

            $sortedReviews = $reviews;
        }

        return view('filter_reviews', ['sortedReviews' => $sortedReviews]);
    }
}

