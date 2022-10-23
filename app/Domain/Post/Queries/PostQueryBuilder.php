<?php

namespace Domain\Post\Queries;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class PostQueryBuilder extends Builder
{
    public function isView(): self
    {
        $user = Auth::user();
        $successCount = $user->subscription?->success_payment_count;

        return $this->when($user->isWriter() and $successCount, function (Builder $builder) use ($successCount): Builder {
            return $builder->where('payment_open_count', '>=', $successCount);
        });
    }
}
