<?php

use App\Http\Controllers\Client\Auth\AuthCookieController;
use App\Http\Controllers\Client\Feedback\FeedbackCreateController;
use App\Http\Controllers\Client\Feedback\FeedbackViewController;
use App\Http\Controllers\Client\Post\PostViewController;
use App\Http\Controllers\Client\User\UserDashboardController;
use App\Http\Controllers\Client\User\UserSettingsUpdateController;
use App\Http\Controllers\Client\User\UserSettingsViewController;
use App\Http\Controllers\Client\User\UserSubscriptionDeleteController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth',
], function (): void {
    Route::get('/dashboard', UserDashboardController::class)
        ->name('dashboard');

    Route::group([
        'prefix' => 'settings',
    ], function (): void {
        Route::get('/', UserSettingsViewController::class)->name('settings.view');
        Route::post('/update', UserSettingsUpdateController::class)->name('settings.update');
    });

    Route::group([
        'prefix' => 'subscribe',
    ], function (): void {
        Route::view('/', 'client.user.subscribe')->name('subscribe.view');
        Route::view('/create', 'client.user.subscribe-create')->name('subscribe.create');
        Route::delete('/delete', UserSubscriptionDeleteController::class)->name('subscription-delete');
    });
});

Route::group([
    'prefix' => 'feedback',
], function (): void {
    Route::get('/', FeedbackViewController::class)->name('feedback.view');
    Route::post('/create', FeedbackCreateController::class)->name('feedback.create');
});

Route::view('/public-offer', 'client.pages.public-offer')->name('public-offer');
Route::view('/terms', 'client.pages.terms')->name('terms');
Route::view('/privacy', 'client.pages.privacy')->name('privacy');
Route::view('/refund', 'client.pages.refund')->name('refund');

Route::get('/post/{post}', PostViewController::class)->name('post.view');

Route::get('/auth-cookie', AuthCookieController::class)->name('auth-cookie');
