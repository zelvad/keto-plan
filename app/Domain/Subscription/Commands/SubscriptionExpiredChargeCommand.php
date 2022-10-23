<?php

namespace Domain\Subscription\Commands;

use Domain\Subscription\Jobs\SubscriptionChargeJob;
use Domain\Subscription\Models\Subscription;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class SubscriptionExpiredChargeCommand extends Command
{
    protected $signature = 'subscriptions:charge';

    protected $description = 'Charge expired subscriptions';

    public function handle(): int
    {
        $subscriptions = $this->loadExpiredSubscriptions();

        $subscriptions->each(function (Subscription $subscription): void {
            SubscriptionChargeJob::dispatch($subscription)
                ->onQueue(
                    $subscription->split_amount > 2 ? 'subscriptions_split' : 'subscriptions',
                );
        });

        return self::SUCCESS;
    }

    private function loadExpiredSubscriptions(): Collection
    {
        return Subscription::query()
            ->where('next_payment_date', '<=', now())
            ->get();
    }
}
