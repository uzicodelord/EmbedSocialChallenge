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
        $reviewsWithText = array_filter($reviews, function ($review) {
            return !empty($review['text']);
        });
        $reviewsWithoutText = array_filter($reviews, function ($review) {
            return empty($review['text']);
        });

        $ratingOrder = $request->input('rating_order');
        $dateOrder = $request->input('date_order');

        usort($reviewsWithText, function ($a, $b) use ($ratingOrder, $dateOrder) {
            if (isset($a['rating'], $a['date'], $b['rating'], $b['date']) && $a['rating'] === $b['rating']) {
                return $dateOrder === 'newest_first' ? strtotime($a['date']) - strtotime($b['date']) : strtotime($b['date']) - strtotime($a['date']);
            }

            return $ratingOrder === 'highest_first' ? $b['rating'] - $a['rating'] : $a['rating'] - $b['rating'];
        });

        usort($reviewsWithoutText, function ($a, $b) use ($ratingOrder, $dateOrder) {
            if (isset($a['rating'], $a['date'], $b['rating'], $b['date']) && $a['rating'] === $b['rating']) {
                return $dateOrder === 'newest_first' ? strtotime($a['date']) - strtotime($b['date']) : strtotime($b['date']) - strtotime($a['date']);
            }

            return $ratingOrder === 'highest_first' ? $b['rating'] - $a['rating'] : $a['rating'] - $b['rating'];
        });


        $sortedReviews = array_merge($reviewsWithText, $reviewsWithoutText);

        return view('reviews', ['reviews' => $sortedReviews]);
    }
}
