<?php

namespace App\Nova;

use Everzel\NovaEditorJs\NovaEditorJs;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Domain\Post\Models\Post as DomainPost;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class Post extends Resource
{
    public static $model = DomainPost::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make(__('Name'), 'name')
                ->rules(['required', 'string']),

            NovaEditorJs::make('Content', 'content'),

            Number::make(__('Number of successful payments before opening'), 'payment_open_count')
                ->default(0)
                ->rules(['required', 'min:0']),
        ];
    }

    public function cards(Request $request): array
    {
        return [];
    }

    public function filters(Request $request): array
    {
        return [];
    }

    public function lenses(Request $request): array
    {
        return [];
    }

    public function actions(Request $request): array
    {
        return [];
    }
}
