<?php

namespace Domain\User\Mails;

use Illuminate\Mail\Mailable;

class UserCreatedMail extends Mailable
{
    private string $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function build(): UserCreatedMail
    {
        return $this->subject('Спасибо за регистрацию на сервисе ' . config('app.name'))
            ->view('emails.user-created', [
                'password' => $this->password,
            ]);
    }
}
