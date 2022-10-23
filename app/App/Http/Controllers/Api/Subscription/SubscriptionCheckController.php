<?php

namespace App\Http\Controllers\Api\Subscription;

use App\Http\Controllers\Controller;
use Domain\User\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class SubscriptionCheckController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $code = $request->route('code');
        $userId = $this->getUserId($code);

        if (! $userId) {
            return response()->json([
                'success' => false,
            ]);
        }

        $user = $this->findUser($userId);

        return response()->json([
            'success' => $this->isActiveSubscribe($user),
        ]);
    }

    private function getUserId(string $code): ?int
    {
        return Hashids::decode($code)[0] ?? null;
    }

    private function findUser(int $userId): User
    {
        /** @var User $user */
        $user = User::query()
            ->findOrFail($userId);

        return $user;
    }

    private function isActiveSubscribe(User $user): bool
    {
        return $user->subscription()
            ->active()
            ->exists();
    }
}
