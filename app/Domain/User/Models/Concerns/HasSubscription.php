<?php

namespace Domain\User\Models\Concerns;

use Domain\Subscription\Models\Subscription;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Vinkla\Hashids\Facades\Hashids;

trait HasSubscription
{
    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }

    public function getIsSubscribeAttribute(): bool
    {
        return $this->subscription()
            ->active()
            ->exists();
    }

    public function getCodeAttribute(): string
    {
        return Hashids::encode($this->id);
    }
}
