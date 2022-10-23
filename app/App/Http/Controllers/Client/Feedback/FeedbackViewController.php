<?php

namespace App\Http\Controllers\Client\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class FeedbackViewController extends Controller
{
    public function __invoke(): View
    {
        return view('client.feedback.view');
    }
}
