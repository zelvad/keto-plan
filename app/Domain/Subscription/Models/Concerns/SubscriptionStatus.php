<?php

namespace Domain\Subscription\Models\Concerns;

interface SubscriptionStatus
{
    public const ACTIVE = 'active';
    public const ERROR = 'error';
}
