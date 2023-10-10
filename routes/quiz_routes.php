<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\QuestionsController;
use Inertia\Inertia;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
});
Route::resource('quizzes', QuizzesController::class);
Route::resource('questions', QuestionsController::class)->only('index', 'store');
