<?php

namespace App\Nova;

use Domain\Subscription\Models\Concerns\SubscriptionStatus;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Http\Requests\NovaRequest;
use Domain\Subscription\Models\Subscription as DomainSubscription;

class Subscription extends Resource
{
    public static $model = DomainSubscription::class;

    public static $title = 'id';

    public static $search = [
        'id', 'user_id',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            BelongsTo::make('User', 'user'),

            Status::make('Status', 'status')
                ->loadingWhen([SubscriptionStatus::ACTIVE])
                ->failedWhen([SubscriptionStatus::ERROR]),

            DateTime::make('Next date payment', 'next_payment_date'),

            Number::make('Failed payments count', 'failed_payments_count'),
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

    public static function authorizedToCreate(Request $request): bool
    {
        return false;
    }

    public function authorizedToUpdate(Request $request): bool
    {
        return false;
    }
}
