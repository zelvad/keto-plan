<?php

namespace App\Nova;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Domain\Feedback\Models\Feedback as DomainFeedback;

class Feedback extends Resource
{
    public static $model = DomainFeedback::class;

    public static $title = 'id';

    public static $search = [
        'id', 'email', 'phone', 'name',
    ];

    public static array $indexDefaultOrder = [
        'is_resolved' => 'asc',
    ];

    public static function indexQuery(NovaRequest $request, $query): Builder
    {
        if (empty($request->get('orderBy'))) {
            $query->getQuery()->orders = [];

            return $query->orderBy(
                key(static::$indexDefaultOrder),
                reset(static::$indexDefaultOrder),
            );
        }

        return $query;
    }

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make(__('Name'), 'name')
                ->readonly(),

            Text::make(__('Email'), 'email')
                ->readonly(),

            Text::make(__('Phone'), 'phone')
                ->readonly(),

            Textarea::make(__('Message'), 'message')
                ->readonly(),

            Boolean::make(__('Is resolved'), 'is_resolved'),
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
