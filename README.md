# Laravel Reviews Filtering and Sorting

This Laravel project allows you to filter and sort reviews from a JSON file based on various criteria. It provides a simple interface for selecting the minimum rating, sorting options, and prioritizing reviews with or without text.

## Installation

To get started with the project, follow these steps:

### Prerequisites

- PHP (>=7.4)
- Composer

### Clone the Repository

git clone https://github.com/uzicodelord/EmbedSocialChallenge

### Navigate to the Project Directory

cd EmbedSocialChallenge

### Install Dependencies

composer install

### Set Up Environment Configuration

cp .env.example .env

php artisan key:generate

### Start the Development Server

php artisan serve


You should now be able to access the application by visiting `http://localhost:8000` in your web browser.

## Usage

1. Open the application in your web browser.
2. Fill in the filter options:
   - Order by Rating: Select the desired rating order (highest first or lowest first).
   - Minimum Rating: Select the minimum rating to include in the results.
   - Order by Date: Select the desired date order (newest first or oldest first).
   - Prioritize by Text: Choose whether to prioritize reviews with text.
3. Click the "Filter" button to apply the filters and see the sorted reviews.

