<?php

namespace Domain\Subscription\Jobs;

use Domain\Subscription\Actions\SubscriptionExpiredChargeAction;
use Domain\Subscription\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SubscriptionChargeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Subscription $subscription;

    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    public function handle(): void
    {
        app(SubscriptionExpiredChargeAction::class)
            ->handle($this->subscription);
    }
}
