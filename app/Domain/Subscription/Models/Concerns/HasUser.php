<?php

namespace Domain\Subscription\Models\Concerns;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasUser
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
