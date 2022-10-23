<?php

namespace Scalemeup\UiTranslations\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Scalemeup\UiTranslations\Domain\Translation\Actions\SeedTranslationsAction;

class SeedTranslationsController extends Controller
{
    public function __invoke(): Response
    {
        (new SeedTranslationsAction())->execute();

        return response()->noContent();
    }
}
