<?php

namespace App\Http\Controllers\Client\User;

use App\Http\Controllers\Controller;
use Domain\User\Actions\UserSettingsUpdateAction;
use Domain\User\Requests\UserSettingsUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserSettingsUpdateController extends Controller
{
    public function __invoke(UserSettingsUpdateRequest $request, UserSettingsUpdateAction $action): RedirectResponse
    {
        $action->handle($request->user(), $request->getData());

        return redirect()
            ->back()
            ->with('success', 'Profile success updated!');
    }
}
