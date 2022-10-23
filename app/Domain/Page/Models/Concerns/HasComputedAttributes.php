<?php

namespace Domain\Page\Models\Concerns;

trait HasComputedAttributes
{
    public function getComputedMetaTitleAttribute(): string
    {
        return $this->localizedMetaTitle; // @phpstan-ignore-line
    }

    public function getComputedMetaDescriptionAttribute(): string
    {
        return $this->localizedMetaDescription; // @phpstan-ignore-line
    }

    public function resolveComputedMetaTitle(array $replacement): string
    {
        return $this->replacePlaceholders($this->computed_meta_title, $replacement);
    }

    public function resolveComputedMetaDescription(array $replacement): string
    {
        return $this->replacePlaceholders($this->computed_meta_description, $replacement);
    }

    private function replacePlaceholders(string $template, array $replacements): string
    {
        foreach ($replacements as $placeholder => $value) {
            $template = str_replace($placeholder, $value, $template);
        }

        return $template;
    }
}
