<?php

namespace Domain\Subscription\Actions;

use Carbon\Carbon;
use Domain\Subscription\Data\SubscriptionSaveData;
use Domain\Subscription\Models\Subscription;
use Domain\User\Models\User;

class SubscriptionCallbackAction
{
    public function handle(User $user, SubscriptionSaveData $data): Subscription
    {
        $this->removeOldSubscription($user);

        $subscription = new Subscription;
        $subscription->user_id = $user->id;
        $subscription->token = $data->token;
        $subscription->account_id = $data->accountId;
        $subscription->next_payment_date = $this->getNextDatePayment();
        $subscription->status = $data->status;

        $subscription->save();

        return $subscription;
    }

    private function removeOldSubscription(User $user): void
    {
        $user->subscription()->delete();
    }

    private function getNextDatePayment(): string
    {
        return Carbon::now()->addDays(settings('free_days'));
    }
}
