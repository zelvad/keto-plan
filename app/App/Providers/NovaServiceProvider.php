<?php

namespace App\Providers;

use Bakerkretzmar\NovaSettingsTool\SettingsTool;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        Nova::serving(function () {
            Nova::script('editor-js-quote', public_path('js/editor-js-plugins/quote.js'));
        });
    }

    protected function routes(): void
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    protected function gate(): void
    {
        Gate::define('viewNova', function (User $user) {
            return in_array($user->role, User::roles());
        });
    }

    protected function cards(): array
    {
        return [
            new Help,
        ];
    }

    protected function dashboards(): array
    {
        return [];
    }

    public function tools(): array
    {
        return [
            new SettingsTool(),
        ];
    }

    public function register(): void
    {
        //
    }
}
