<?php

use Domain\Page\Repositories\PageRepository;
use Spatie\Valuestore\Valuestore;
use Support\WeservImages\WeservImages;

if (! function_exists('weserv')) {
    function weserv(string $imageUrl): WeservImages
    {
        return WeservImages::make($imageUrl);
    }
}

if (! function_exists('pages')) {
    function pages(): PageRepository
    {
        return app(PageRepository::class);
    }
}

if (! function_exists('settings')) {
    function settings(string $key = null, $default = null): mixed
    {
        $valueStore = Valuestore::make(config('nova-settings-tool.path'));

        if ($key === null) {
            return $valueStore;
        }

        return $valueStore->get($key, $default);
    }
}
