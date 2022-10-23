<?php

namespace Domain\Feedback\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_resolved' => 'boolean',
    ];
}
