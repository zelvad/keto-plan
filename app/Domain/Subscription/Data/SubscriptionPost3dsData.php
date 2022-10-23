<?php

namespace Domain\Subscription\Data;

use Spatie\DataTransferObject\DataTransferObject;

class SubscriptionPost3dsData extends DataTransferObject
{
    public string $transactionId;
    public string $paRes;
}
