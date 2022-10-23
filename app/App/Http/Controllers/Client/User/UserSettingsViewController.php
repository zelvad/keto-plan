<?php

namespace App\Http\Controllers\Client\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserSettingsViewController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('client.user.settings');
    }
}
