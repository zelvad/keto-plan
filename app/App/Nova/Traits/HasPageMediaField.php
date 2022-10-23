<?php

namespace App\Nova\Traits;

use DmitryBubyakin\NovaMedialibraryField\Fields\Medialibrary;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasPageMediaField
{
    private function getSnippetPreviewMediaField(): Medialibrary
    {
        $field = Medialibrary::make(__('Preview'), 'snippet_preview')
            ->single()
            ->autouploading()
            ->accept('image/*')
            ->mediaOnIndex(1);

        $field->previewCallback = fn (Media $media) => url($media->getFullUrl());

        return $field;
    }
}
