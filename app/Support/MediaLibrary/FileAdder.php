<?php

namespace Support\MediaLibrary;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\Conversions\ImageGenerators\Image;
use Spatie\MediaLibrary\MediaCollections\FileAdder as FileAdderBase;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\File;

class FileAdder extends FileAdderBase
{
    public function defaultSanitizer(string $fileName): string
    {
        $name = (string) Str::of(pathinfo($fileName, PATHINFO_FILENAME))
            ->replace('.', '-')
            ->slug()
            ->limit(50);

        $extension = pathinfo($fileName, PATHINFO_EXTENSION);

        return Str::lower("{$name}.{$extension}");
    }

    public function toMediaCollection(string $collectionName = 'default', string $diskName = ''): Media
    {
        if ((new Image)->canHandleMime(File::getMimeType($this->pathToFile))) {
            $this->fillWidthAndHeight();
        }

        return parent::toMediaCollection($collectionName, $diskName);
    }

    protected function fillWidthAndHeight(): void
    {
        [$width, $height] = getimagesize($this->pathToFile);

        $this->customProperties['width'] = $width;
        $this->customProperties['height'] = $height;
    }
}
