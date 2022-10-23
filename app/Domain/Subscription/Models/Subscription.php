<?php

namespace Domain\Subscription\Models;

use Domain\Subscription\Models\Concerns\HasStatus;
use Domain\Subscription\Models\Concerns\HasUser;
use Domain\Subscription\Models\Concerns\SubscriptionStatus;
use Domain\Subscription\Queries\SubscriptionQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model implements SubscriptionStatus
{
    use HasStatus;
    use HasUser;

    protected $guarded = [];

    protected $dates = [
        'next_payment_date',
    ];

    public function newEloquentBuilder($query): SubscriptionQueryBuilder
    {
        return new SubscriptionQueryBuilder($query);
    }
}
