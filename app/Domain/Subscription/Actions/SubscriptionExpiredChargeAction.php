<?php

namespace Domain\Subscription\Actions;

use Domain\Subscription\Models\Concerns\SubscriptionStatus;
use Domain\Subscription\Models\Subscription;
use Domain\Subscription\SubscriptionRepository;
use Illuminate\Support\Collection;

class SubscriptionExpiredChargeAction
{
    private SubscriptionRepository $repository;

    public function __construct(SubscriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(Subscription $subscription): void
    {
        if ($subscription->split_amount > 2) {
            $this->splitPayment($subscription);
        } else {
            $response = $this->repository->tokenCharge(
                settings('payment_sum_success'),
                config('services.cloudpayments.currency'),
                $subscription->account_id,
                $subscription->token,
            );

            if ($this->isSuccessPayment($response)) {
                $this->updateSuccessSubscription($subscription);
            } else {
                $this->updateErrorSplitSubscription($subscription, 0);
            }
        }
    }

    private function isSuccessPayment(array $data): bool
    {
        return isset($data['Success']) and $data['Success'] == true;
    }

    private function updateSuccessSubscription(Subscription $subscription): void
    {
        $subscription->increment('success_payment_count');

        $subscription->update([
            'next_payment_date' => now()->addDays(
                settings('payment_counts_success_range')
            ),
            'failed_payments_count' => 0,
            'status' => SubscriptionStatus::ACTIVE,
            'split_amount' => 0,
        ]);
    }

    private function splitPayment(Subscription $subscription): void
    {
        $paymentCount = $subscription->split_amount / $this->calcSplitPaymentSubscriptionAmount();

        for ($i = 0; $i < $paymentCount; $i++) {
            $response = $this->repository->tokenCharge(
                $this->calcSplitPaymentSubscriptionAmount(),
                config('services.cloudpayments.currency'),
                $subscription->account_id,
                $subscription->token,
            );

            if (! $this->isSuccessPayment($response)) {
                $this->updateErrorSplitSubscription($subscription, $i);

                return;
            }

            sleep(config('services.cloudpayments.split_timeout'));
        }

        $this->updateSuccessSubscription($subscription);
    }

    private function calcSplitPaymentSubscriptionAmount(): float | int
    {
        return settings('payment_sum_success') / settings('payment_sum_error_range');
    }

    private function updateErrorSplitSubscription(Subscription $subscription, int $successCount = null): void
    {
        $subscription->increment('failed_payments_count');

        if ($subscription->failed_payments_count == 6) {
            $subscription->update([
                'next_payment_date' => now()->addDays(settings('payment_counts_success_range')),
                'status' => SubscriptionStatus::ACTIVE,
                'split_amount' => 0,
            ]);
        } else {
            $subscription->update([
                'next_payment_date' => now()->addDay(),
                'status' => SubscriptionStatus::ACTIVE,
                'split_amount' => settings('payment_sum_success') - $this->calcSplitPaymentSubscriptionAmount() * $successCount,
            ]);
        }
    }
}
