<?php

namespace Scalemeup\UiTranslations\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Scalemeup\UiTranslations\Domain\Translation\Actions\UpdateTranslationAction;
use Scalemeup\UiTranslations\Domain\Translation\DataTransferObjects\UpdateTranslationDataTransferObject;
use Scalemeup\UiTranslations\Domain\Translation\Queries\TranslationsViewQuery;
use Scalemeup\UiTranslations\Domain\Translation\Requests\UpdateTranslationRequest;

class UpdateTranslationController extends Controller
{
    public function __invoke(UpdateTranslationRequest $request): Collection | array
    {
        (new UpdateTranslationAction())->execute(
            UpdateTranslationDataTransferObject::fromRequest($request)
        );

        return (new TranslationsViewQuery())->execute();
    }
}
