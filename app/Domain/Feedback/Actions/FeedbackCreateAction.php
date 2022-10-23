<?php

namespace Domain\Feedback\Actions;

use Domain\Feedback\Data\FeedbackCreateData;
use Domain\Feedback\Models\Feedback;

class FeedbackCreateAction
{
    public function handle(FeedbackCreateData $data): void
    {
        Feedback::query()->create($data->all());
    }
}
