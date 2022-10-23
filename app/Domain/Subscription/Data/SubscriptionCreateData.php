<?php

namespace Domain\Subscription\Data;

use Spatie\DataTransferObject\DataTransferObject;

class SubscriptionCreateData extends DataTransferObject
{
    public string $token;
    public string $email;
    public ?string $clickId;
    public ?string $url;
    public ?string $idUser;
    public ?string $payAction;
}
