<?php

namespace Domain\User\Models\Concerns;

trait HasRoles
{
    public static function roles(): array
    {
        return [
            UserRole::ADMINISTRATOR,
            UserRole::WRITER,
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMINISTRATOR;
    }

    public function isWriter(): bool
    {
        return $this->role === UserRole::WRITER;
    }
}
