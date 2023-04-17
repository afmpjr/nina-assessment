<?php

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
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/search', [UserController::class, 'search']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/users/{id}/previous-experiences', [UserController::class, 'previousExperiences']);

Route::get('/previous-experiences', [PreviousExperienceController::class, 'index']);
Route::get('/previous-experiences/{id}', [PreviousExperienceController::class, 'show']);
