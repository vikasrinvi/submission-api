<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthenticatedSessionController::class, 'apiLogin']);

Route::post('/submit', [SubmissionController::class, 'submit']);
