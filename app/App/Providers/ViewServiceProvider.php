<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewInstance;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        View::composer('*', function (ViewInstance $view): void {
            $view->with('authUser', auth()->user());
            $view->with('isOpenRegisterForm', session()->get('lastForm') === 'register' and request()->segment(1) !== 'register');
            $view->with('isOpenLoginForm', session()->get('lastForm') === 'login' and request()->segment(1) !== 'login');
            $view->with('discountPercent', settings('percent_for_home', 20));
        });
    }

    public function boot(): void
    {
        //
    }
}
