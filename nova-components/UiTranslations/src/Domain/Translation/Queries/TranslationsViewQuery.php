<?php

namespace Scalemeup\UiTranslations\Domain\Translation\Queries;

use Scalemeup\UiTranslations\Domain\Translation\Models\NovaUiTranslation;

class TranslationsViewQuery
{
    public function execute()
    {
        return NovaUiTranslation::latest('id')->get();
    }
}
