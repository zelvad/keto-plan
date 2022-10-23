<?php

namespace Domain\Subscription\Data;

use Domain\Subscription\Models\Concerns\SubscriptionStatus;
use Spatie\DataTransferObject\DataTransferObject;

class SubscriptionSaveData extends DataTransferObject
{
    public string $token;
    public string $accountId;
    public string $status = SubscriptionStatus::ACTIVE;
}
