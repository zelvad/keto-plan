<?php

namespace Scalemeup\UiTranslations\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Scalemeup\UiTranslations\Domain\Translation\Queries\TranslationsViewQuery;

class ListTranslationsController extends Controller
{
    public function __invoke(): Collection | array
    {
        return (new TranslationsViewQuery())->execute();
    }
}
