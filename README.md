# Project Title

Google Custom Search Package

## Description

This package will allow the user to search any topic using google custom search api, and get the top 10 results from mawdoo3.com, save the selected results, add comments on them, modify them, or delete them from the database.

### Prerequisites

* PHP 7.2 +
* Laravel 5.5.*

## Running the Application

* cd into the project folder
* In your terminal run ```composer require mawdoo3customsearchtask/search:dev-master```
* cd into config/ and register the package in app.php providers by adding this line ```Mawdoo3\Search\SearchServiceProvider::class```
* In your terminal run ```php artisan vendor:publish``` and select the package number to publish the package config file to your project config folder
* cd into config/, open sp_mawdoo3_laravel.php and change google custom search api credentials, after getting them from google, and register your engine to search www.mawdoo3.com
* In your terminal run ```php artisan migrate``` to add the table "saved_results" to your database
* In your terminal run ```php artisan config:cache```
* Surf to ```YOUR_PROJECT_URL/search``` and enjoy!

## Export to CSV

* cd to app/Console/ and open Kernel.php
* Search for protected $commands, and add this line ```Commands\ExportResults::class```
* In your terminal run ```php artisan export-to-csv``` to get all database records and export them to the csv file, or you can run ```php artisan export-to-csv --numberOfRecords=number``` to export a specific amount of records
* Search for CSVFiles folder in the root of your projects, and you will find the exported file

## Authors

* **Laith N. Al-Ammouri**
