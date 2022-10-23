<?php

namespace Domain\Subscription\Queries;

use Domain\Subscription\Models\Concerns\SubscriptionStatus;
use Illuminate\Database\Eloquent\Builder;

class SubscriptionQueryBuilder extends Builder
{
    public function active(): self
    {
        return $this->where('status', SubscriptionStatus::ACTIVE);
    }

    public function error(): self
    {
        return $this->where('status', SubscriptionStatus::ERROR);
    }

    public function status(string $status): self
    {
        return $this->where('status', $status);
    }
}
