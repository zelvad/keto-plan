<?php

namespace Domain\Feedback\Mail;

use Domain\Feedback\Models\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    private Feedback $feedback;

    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    public function build(): self
    {
        return $this->view('emails.notification', [
            'feedback' => $this->feedback,
        ]);
    }
}
