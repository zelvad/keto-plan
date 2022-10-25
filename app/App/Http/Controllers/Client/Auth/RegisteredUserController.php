<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Domain\User\Jobs\UserSendPasswordJob;
use Domain\User\Mails\UserCreatedMail;
use Domain\User\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Vinkla\Hashids\Facades\Hashids;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('client.auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        if (! $password = $request->get('password')) {
            $password = Hashids::encode(rand(100, 1000));

            $request->merge([
                'password' => $password,
                'password_confirmation' => $password,
            ]);
        }

        // TODO: refactor
        session()->put('lastForm', 'register');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:1'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        UserSendPasswordJob::dispatch($user, $password);

        Auth::login($user);

        session()->put('password', $password);

        return redirect()
            ->route('subscribe.create');
    }
}
