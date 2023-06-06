<!-- resources/views/filter_reviews.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Filter Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Filter Reviews</h1>
    <form method="POST" action="{{ route('filter-reviews') }}">
        @csrf
        <div class="form-group">
            <label for="rating_order">Order by Rating:</label>
            <select class="form-control" name="rating_order" id="rating_order">
                <option value="highest_first">Highest First</option>
                <option value="lowest_first">Lowest First</option>
            </select>
        </div>
        <div class="form-group">
            <label for="min_rating">Minimum Rating:</label>
            <select class="form-control" name="min_rating" id="min_rating">
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date_order">Order by Date:</label>
            <select class="form-control" name="date_order" id="date_order">
                <option value="newest_first">Newest First</option>
                <option value="oldest_first">Oldest First</option>
            </select>
        </div>
        <div class="form-group">
            <label for="prioritize_text">Prioritize by Text:</label>
            <select class="form-control" name="prioritize_text" id="prioritize_text">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>

    @isset($sortedReviews)
        <h2>Sorted Reviews:</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Rating</th>
                <th>Date</th>
                <th>Text</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sortedReviews as $review)
                <tr>
                    <td>{{ $review['rating'] }}</td>
                    <td>{{ $review['date'] }}</td>
                    <td>{{ $review['text'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endisset
</div>
</body>
</html>
