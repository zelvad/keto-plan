<?php

namespace Domain\User\Data;

use Spatie\DataTransferObject\DataTransferObject;

class UserSettingsUpdateData extends DataTransferObject
{
    public string $name;
    public string $email;
    public ?string $password = null;
}
