<?php

namespace Domain\Feedback\Jobs;

use Domain\Feedback\Mail\NotificationMail;
use Domain\Feedback\Models\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotificationSendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Feedback $feedback;

    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    public function handle(): void
    {
        Mail::to(config('services.feedback_notifications.email'))
            ->send(new NotificationMail($this->feedback));
    }
}
