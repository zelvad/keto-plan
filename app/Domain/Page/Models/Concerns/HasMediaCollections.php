<?php

namespace Domain\Page\Models\Concerns;

use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasMediaCollections
{
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('snippet_preview')
            ->singleFile();
    }

    public function getSnippetMedia(): ?Media
    {
        return $this->getFirstMedia('snippet_preview');
    }

    public function getSnippetAttribute(): ?string
    {
        return $this->getSnippetMedia()?->getUrl();
    }
}
