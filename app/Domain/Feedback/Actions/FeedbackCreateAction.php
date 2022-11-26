<?php

namespace Domain\Feedback\Actions;

use Domain\Feedback\Data\FeedbackCreateData;
use Domain\Feedback\Jobs\NotificationSendJob;
use Domain\Feedback\Models\Feedback;
use Illuminate\Support\Facades\Mail;

class FeedbackCreateAction
{
    public function handle(FeedbackCreateData $data): void
    {
        $feedback = Feedback::query()->create($data->all());

        $this->sendNotification($feedback);
    }

    private function sendNotification(Feedback $feedback): void
    {
        dispatch(new NotificationSendJob($feedback));
    }
}
