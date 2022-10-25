<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Domain\User\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCookieController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        if ($email = $request->get('email')) {
            return $this->authUser($email);
        }

        return redirect()->route('dashboard');
    }

    private function authUser(string $email): RedirectResponse
    {
        /** @var User $user */
        $user = User::query()
            ->where('email', $email)
            ->first();

        if ($user) {
            Auth::login($user);
        }

        return redirect()->route('dashboard');
    }
}
