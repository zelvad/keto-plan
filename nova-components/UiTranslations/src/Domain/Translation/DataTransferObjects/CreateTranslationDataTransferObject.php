<?php

namespace Scalemeup\UiTranslations\Domain\Translation\DataTransferObjects;

use Scalemeup\UiTranslations\Domain\Translation\Requests\StoreTranslationRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreateTranslationDataTransferObject extends DataTransferObject
{
    public string $key;
    public array $translations;

    public static function fromRequest(
        StoreTranslationRequest $request
    ): self {
        return new self([
            'key' => $request->get('key'),
            'translations' => $request->get('translations'),
        ]);
    }
}
