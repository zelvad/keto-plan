<?php

namespace Domain\Subscription\Actions;

use Domain\Subscription\Data\SubscriptionRefundData;
use Domain\Subscription\SubscriptionRepository;

class SubscriptionRefundAction
{
    public function handle(SubscriptionRefundData $data): array
    {
        return app(SubscriptionRepository::class)
            ->refund($data->transactionId, $data->amount);
    }
}
