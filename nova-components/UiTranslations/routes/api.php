<?php

use Illuminate\Support\Facades\Route;
use Scalemeup\UiTranslations\Http\Controllers\ListTranslationsController;
use Scalemeup\UiTranslations\Http\Controllers\SeedTranslationsController;
use Scalemeup\UiTranslations\Http\Controllers\StoreTranslationController;
use Scalemeup\UiTranslations\Http\Controllers\UpdateTranslationController;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::post('/seed-translations', SeedTranslationsController::class);
Route::get('/translations', ListTranslationsController::class);
Route::post('/translations', StoreTranslationController::class);
Route::put('/translations', UpdateTranslationController::class);
