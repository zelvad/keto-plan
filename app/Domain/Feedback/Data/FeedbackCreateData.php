<?php

namespace Domain\Feedback\Data;

use Spatie\DataTransferObject\DataTransferObject;

class FeedbackCreateData extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $phone;
    public string $message;
}
