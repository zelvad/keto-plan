<?php

namespace App\Http\Controllers\Client\User;

use App\Http\Controllers\Controller;
use Domain\Post\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserDashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('client.user.dashboard');
    }
}
