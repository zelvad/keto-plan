<?php

namespace Domain\Subscription\Actions;

use Domain\Subscription\Data\SubscriptionCreateData;
use Domain\Subscription\SubscriptionRepository;
use Domain\Traffic\TrafficRepository;

class SubscriptionCreateAction
{
    public function handle(SubscriptionCreateData $data): array
    {
        if ($data->clickId and $data->idUser and $data->payAction) {
            $this->createTraffic($data->email, $data->clickId, $data->idUser, $data->payAction, $data->url);
        }

        return app(SubscriptionRepository::class)
            ->charge(
                config('services.cloudpayments.subscribe_start_amount'),
                $data->token,
                $data->email,
            );
    }

    private function createTraffic(string $email, string $clickId, string $idUser, string $payAction, string $url = null): void
    {
        if (! TrafficRepository::find($email)) {
            TrafficRepository::create($email, $clickId, $idUser, $payAction, $url);
        }
    }
}
