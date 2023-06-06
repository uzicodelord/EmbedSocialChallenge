<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/reviews/filter', [ReviewController::class, 'filterAndSortReviews'])->name('filter-reviews');
Route::get('/', function () {
    return view('filter_reviews');
})->name('reviews-filter');
