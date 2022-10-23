<?php

namespace Domain\Subscription\Data;

use Spatie\DataTransferObject\DataTransferObject;

class SubscriptionRefundData extends DataTransferObject
{
    public string $transactionId;
    public float $amount;
}
