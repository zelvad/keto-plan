<?php

namespace Scalemeup\UiTranslations\Domain\Translation\Actions;

use Scalemeup\UiTranslations\Domain\Translation\DataTransferObjects\UpdateTranslationDataTransferObject;
use Scalemeup\UiTranslations\Domain\Translation\Models\NovaUiTranslation;

class UpdateTranslationAction
{
    public function execute(UpdateTranslationDataTransferObject $data): void
    {
        NovaUiTranslation::find($data->id)->update([
            'key' => $data->key,
            'translations' => $data->translations,
        ]);
    }
}
