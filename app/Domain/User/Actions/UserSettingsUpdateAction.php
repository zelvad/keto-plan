<?php

namespace Domain\User\Actions;

use Domain\User\Data\UserSettingsUpdateData;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSettingsUpdateAction
{
    public function handle(User $user, UserSettingsUpdateData $data): void
    {
        $data = $data->all();

        if (! $data['password']) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
    }
}
