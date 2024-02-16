<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\TechnologyController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Questa rotta restituisce tutti i progetti
Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/types/{typeSlug}', [TypeController::class, 'show']);

Route::get('/technologies/{technologySlug}', [TechnologyController::class, 'show']);
