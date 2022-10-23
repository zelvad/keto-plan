<?php

namespace Scalemeup\UiTranslations;

use Illuminate\Contracts\Translation\Loader;
use Illuminate\Support\Arr;
use Scalemeup\UiTranslations\Domain\Translation\Models\NovaUiTranslation;

class TranslationsLoader implements Loader
{
    private array $translations;

    public function load($locale, $group, $namespace = null): array
    {
        if (! isset($this->translations[$locale])) {
            $this->translations[$locale] = $this->loadTranslation($locale);
        }

        if ($group === '*' && $namespace === '*') {
            return $this->translations[$locale];
        }

        return $this->translations[$locale][$group] ?? [];
    }

    private function loadTranslation($locale): array
    {
        $translations = [];

        app(NovaUiTranslation::class)->cached()->each(function ($translation) use (&$translations, $locale) {
            Arr::set($translations, $translation->key, $translation->translations[$locale] ?? '');
        });

        return $translations;
    }

    public function addNamespace($namespace, $hint): void
    {
        // TODO: Implement addNamespace() method.
    }

    public function addJsonPath($path): void
    {
        // TODO: Implement addJsonPath() method.
    }

    public function namespaces(): void
    {
        // TODO: Implement namespaces() method.
    }
}
