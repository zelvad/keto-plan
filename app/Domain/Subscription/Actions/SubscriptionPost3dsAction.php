<?php

namespace Domain\Subscription\Actions;

use Domain\Subscription\Data\SubscriptionPost3dsData;
use Domain\Subscription\SubscriptionRepository;

class SubscriptionPost3dsAction
{
    public function handle(SubscriptionPost3dsData $data): array
    {
        return app(SubscriptionRepository::class)
            ->post3ds($data->transactionId, $data->paRes);
    }
}
