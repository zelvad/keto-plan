<?php

namespace App\Http\Controllers\Api\Subscription;

use App\Http\Controllers\Controller;
use Domain\Subscription\Actions\SubscriptionPost3dsAction;
use Domain\Subscription\Data\SubscriptionPost3dsData;
use Domain\User\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class SubscriptionPost3dsController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function __invoke(Request $request, SubscriptionPost3dsAction $action): RedirectResponse
    {
        $action->handle(
            $this->getData($request)
        );

        sleep(2);

        return redirect()->route('auth-cookie');
    }

    /**
     * @throws UnknownProperties
     */
    private function getData(Request $request): SubscriptionPost3dsData
    {
        return new SubscriptionPost3dsData([
            'transactionId' => $request->get('MD'),
            'paRes' => $request->get('PaRes'),
        ]);
    }
}
