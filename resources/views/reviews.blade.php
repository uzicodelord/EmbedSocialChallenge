<!DOCTYPE html>
<html>
<head>
    <title>Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Reviews</h1>

    <ul class="list-group">
        @foreach ($reviews as $review)
            <li class="list-group-item">
                <strong>Rating:</strong> {{ $review['rating'] }}<br>
                <strong>Text:</strong> {{ $review['reviewText'] }}<br>
                <strong>Date:</strong> {{ $review['reviewCreatedOn'] }}<br>
            </li>
            <br>
        @endforeach
    </ul>
</div>
</body>
</html>
