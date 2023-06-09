<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return response()->json(['message' => 'Please check README for instructions.'], 200);
});

Route::fallback(function () {
    return response()->json(['message' => 'Not Found'], 404);
});


// returns a list of all the users in the database.
Route::get('/users', [UserController::class, 'index']);

// returns a list of users based on the search parameters provided in the query string.
Route::get('/users/search', [UserController::class, 'search']);

// returns a single user based on the ID provided in the URL.
Route::get('/users/{id}', [UserController::class, 'show']);

// returns a list of all the previous experiences of the user specified by the ID provided in the URL.
Route::get('/users/{id}/previous-experiences', [UserController::class, 'getPreviousExperiences']);
