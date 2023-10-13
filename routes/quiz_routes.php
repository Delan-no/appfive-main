<?php

use App\Http\Controllers\UserAnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\QuestionsController;
use Inertia\Inertia;

Route::resource('quizzes', QuizzesController::class);

Route::get('quiz', [QuizzesController::class, 'indexQuiz'])->name('quiz');


Route::post('user', [UserAnswerController::class, 'store']);





// Route::resource('questions', QuestionsController::class)->only('index', 'store');
