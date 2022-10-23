<?php

namespace App\Http\Controllers\Api\Subscription;

use App\Http\Controllers\Controller;
use Domain\Subscription\Actions\SubscriptionCreateAction;
use Domain\Subscription\Requests\SubscriptionCreateRequest;
use Illuminate\Http\JsonResponse;

class SubscriptionCreateController extends Controller
{
    public function __invoke(SubscriptionCreateRequest $request, SubscriptionCreateAction $action): JsonResponse
    {
        return response()->json(
            $action->handle($request->getData()),
        );
    }
}
