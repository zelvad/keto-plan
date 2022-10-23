<?php

use App\Http\Controllers\Api\Subscription\SubscriptionCallbackController;
use App\Http\Controllers\Api\Subscription\SubscriptionCheckController;
use App\Http\Controllers\Api\Subscription\SubscriptionCreateController;
use App\Http\Controllers\Api\Subscription\SubscriptionPost3dsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'subscription',
], function (): void {
    Route::post('/create', SubscriptionCreateController::class)->name('subscription.create');
    Route::post('/post3ds', SubscriptionPost3dsController::class)
        ->middleware('web')
        ->name('subscription.post3ds');

    Route::get('/check/{code}', SubscriptionCheckController::class)->name('subscription.check');

    Route::match(['post', 'get'], '/callback', SubscriptionCallbackController::class)->name('subscription.callback');
});
