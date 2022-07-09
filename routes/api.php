<?php

use App\Http\Controllers\FunctionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

route::post('users/login', [\App\Http\Controllers\UserController::class, 'login']);
route::post('users/register', [\App\Http\Controllers\UserController::class, 'register']);
route::get('users/{id}', [\App\Http\Controllers\UserController::class, 'show']);

route::get('movies', [\App\Http\Controllers\MovieController::class, 'index']);
route::get('movies/{id}', [\App\Http\Controllers\MovieController::class, 'show']);

route::get('categories', [\App\Http\Controllers\CategoryController::class, 'index']);
route::get('categories/{id}', [\App\Http\Controllers\CategoryController::class, 'show']);

route::get('classifications', [\App\Http\Controllers\ClassificationController::class, 'index']);
route::get('classifications/{id}', [\App\Http\Controllers\ClassificationController::class, 'show']);

route::get('reservations', [\App\Http\Controllers\ReservationController::class, 'index']);
route::get('reservations/{id}', [\App\Http\Controllers\ReservationController::class, 'show']);
route::get('reservations/user/{user_id}', [\App\Http\Controllers\ReservationController::class, 'getByUser']);

route::get('functions', [\App\Http\Controllers\FunctionsController::class, 'index']);
route::get('functions/{id}', [\App\Http\Controllers\FunctionsController::class, 'show']);
route::get('functions/movie/{movie_id}', [\App\Http\Controllers\FunctionsController::class, 'getByMovie']);

route::get('cinemas', [\App\Http\Controllers\CinemaController::class, 'index']);
route::get('cinemas/{id}', [\App\Http\Controllers\CinemaController::class, 'show']);


route::middleware('auth:api')->group(function() {
    route::resource('movies', \App\Http\Controllers\MovieController::class)
        ->except(['index', 'show']);

    route::resource('categories', \App\Http\Controllers\CategoryController::class)
        ->except(['index', 'show']);

    route::resource('classifications', \App\Http\Controllers\ClassificationController::class)
        ->except(['index', 'show']);

    route::resource('reservations', \App\Http\Controllers\ReservationController::class)
        ->except(['index', 'show']);

    route::resource('functions', \App\Http\Controllers\FunctionsController::class)
        ->except(['index', 'show']);

    route::resource('cinemas', \App\Http\Controllers\CinemaController::class)
        ->except(['index', 'show']);

    route::resource('users', \App\Http\Controllers\UserController::class)
        ->except(['show', 'update']);
});
