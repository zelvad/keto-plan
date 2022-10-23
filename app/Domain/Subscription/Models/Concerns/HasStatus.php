<?php

namespace Domain\Subscription\Models\Concerns;

trait HasStatus
{
    public static function statuses(): array
    {
        return [
            SubscriptionStatus::ACTIVE,
            SubscriptionStatus::ERROR,
        ];
    }
}
