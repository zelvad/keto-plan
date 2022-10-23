<?php

namespace Scalemeup\UiTranslations\Domain\Translation\DataTransferObjects;

use Scalemeup\UiTranslations\Domain\Translation\Requests\UpdateTranslationRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateTranslationDataTransferObject extends DataTransferObject
{
    public int $id;
    public string $key;
    public array $translations;

    public static function fromRequest(
        UpdateTranslationRequest $request
    ): self {
        return new self([
            'id' => $request->get('id'),
            'key' => $request->get('key'),
            'translations' => $request->get('translations'),
        ]);
    }
}
