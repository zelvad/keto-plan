<?php

namespace Scalemeup\UiTranslations;

class TranslationServiceProvider extends \Illuminate\Translation\TranslationServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        parent::register();
    }

    /**
     * Register the translation line loader.
     *
     * @return void
     */
    protected function registerLoader(): void
    {
        $this->app->singleton('translation.loader', function ($app) {
            return new TranslationsLoader($app['files'], $app['path.lang']);
        });
    }
}
