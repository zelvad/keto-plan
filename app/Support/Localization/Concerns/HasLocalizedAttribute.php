<?php

namespace Support\Localization\Concerns;

use Illuminate\Support\Str;

trait HasLocalizedAttribute
{
    public function getAttribute($key)
    {
        if (!$key) {
            return;
        }

        if (!Str::startsWith($key, 'localized') || $this->hasGetMutator($key)) {
            return parent::getAttribute($key);
        }

        return $this->getLocalizedAttributeValue($key);
    }

    public function getLocalizedAttributeValue(string $key, string $locale = null)
    {
        // localizedTitle => title, localized_title => title
        $key = Str::snake(preg_replace('/localized_?/', '', $key));

        $value = $this->getAttributeValue($key);

        $locale = $locale ?: app()->getLocale();

        return is_array($value) ? $value[$locale] ?? null : $value;
    }
}
