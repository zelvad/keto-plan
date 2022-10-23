<?php

namespace Scalemeup\UiTranslations\Domain\Translation\Actions;

use Scalemeup\UiTranslations\Domain\Translation\DataTransferObjects\CreateTranslationDataTransferObject;
use Scalemeup\UiTranslations\Domain\Translation\Models\NovaUiTranslation;

class CreateTranslationAction
{
    public function execute(CreateTranslationDataTransferObject $data): void
    {
        NovaUiTranslation::create([
            'key' => $data->key,
            'translations' => $data->translations,
        ]);
    }
}
