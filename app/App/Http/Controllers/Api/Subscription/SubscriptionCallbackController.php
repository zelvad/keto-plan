<?php

namespace App\Http\Controllers\Api\Subscription;

use App\Http\Controllers\Controller;
use Domain\Subscription\Actions\SubscriptionRefundAction;
use Domain\Subscription\Actions\SubscriptionCallbackAction;
use Domain\Subscription\Data\SubscriptionRefundData;
use Domain\Subscription\Data\SubscriptionSaveData;
use Domain\Traffic\Models\Traffic;
use Domain\Traffic\TrafficRepository;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class SubscriptionCallbackController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function __invoke(Request $request, SubscriptionCallbackAction $createdAction, SubscriptionRefundAction $refundAction): JsonResponse
    {
        if (! ($request->get('Email') ?? $request->get('AccountId'))) {
            return response()->json(['code' => 0]);
        }

        $this->sendTraffic(
            $request->get('Email') ?? $request->get('AccountId'), $request->get('Amount'),
        );

        if (! $amount = $request->get('Amount') or ! $this->isRefund($amount)) {
            return response()->json(['code' => 0]);
        }

        $refundAction->handle(
            $this->getSubscriptionRefundData($request)
        );

        $createdAction->handle(
            $this->findUser($request),
            $this->getSubscriptionSaveData($request),
        );

        return response()->json(['code' => 0]);
    }

    private function findUser(Request $request): User
    {
        /** @var User $user */
        try {
            $user = User::query()
                ->where('email', $request->get('Email'))
                ->firstOrFail();
        } catch (ModelNotFoundException) {
            app(SubscriptionRefundAction::class)
                ->handle(
                    $this->getSubscriptionRefundData($request)
                );

            throw new ModelNotFoundException();
        }

        return $user;
    }

    private function isRefund(float $amount): bool
    {
        return $amount == (float) config('services.cloudpayments.subscribe_start_amount');
    }

    /**
     * @throws UnknownProperties
     */
    private function getSubscriptionSaveData(Request $request): SubscriptionSaveData
    {
        return new SubscriptionSaveData([
            'token' => $request->get('Token'),
            'accountId' => $request->get('AccountId'),
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    private function getSubscriptionRefundData(Request $request): SubscriptionRefundData
    {
        return new SubscriptionRefundData([
            'transactionId' => $request->get('TransactionId'),
            'amount' => $request->get('Amount'),
        ]);
    }

    private function sendTraffic(string $email, int $amount): void
    {
        if ($traffic = $this->findTraffic($email)) {
            TrafficRepository::send($amount, $traffic);
        }
    }

    private function findTraffic(string $email): ?Traffic
    {
        return TrafficRepository::find($email);
    }
}
