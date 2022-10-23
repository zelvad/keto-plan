<?php

namespace Scalemeup\UiTranslations\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Scalemeup\UiTranslations\Domain\Translation\Actions\CreateTranslationAction;
use Scalemeup\UiTranslations\Domain\Translation\DataTransferObjects\CreateTranslationDataTransferObject;
use Scalemeup\UiTranslations\Domain\Translation\Queries\TranslationsViewQuery;
use Scalemeup\UiTranslations\Domain\Translation\Requests\StoreTranslationRequest;

class StoreTranslationController extends Controller
{
    public function __invoke(StoreTranslationRequest $request): Collection | array
    {
        (new CreateTranslationAction())->execute(
            CreateTranslationDataTransferObject::fromRequest($request)
        );

        return (new TranslationsViewQuery())->execute();
    }
}
