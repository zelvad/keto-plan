<?php

namespace App\Http\Controllers\Client\Feedback;

use App\Http\Controllers\Controller;
use Domain\Feedback\Actions\FeedbackCreateAction;
use Domain\Feedback\Requests\FeedbackCreateRequest;

class FeedbackCreateController extends Controller
{
    public function __invoke(FeedbackCreateRequest $request, FeedbackCreateAction $action)
    {
        $action->handle($request->getData());

        return redirect()
            ->back()
            ->with('success', 'Ваш вопрос отправлен! Ожидайте пока с вами свяжется менеджер.');
    }
}
