<?php

namespace App\Http\Controllers\Client\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserSubscriptionDeleteController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $user = $request->user();

        $user->subscription()->delete();

        return redirect()->route('dashboard');
    }
}
