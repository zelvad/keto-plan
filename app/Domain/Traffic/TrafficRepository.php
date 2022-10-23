<?php

namespace Domain\Traffic;

use Domain\Traffic\Models\Traffic;
use Exception;
use Illuminate\Support\Facades\Http;

class TrafficRepository
{
    public static function create(string $accountId, string $clickId, string $idUser, string $payAction, string $url = null): Traffic
    {
        /** @var Traffic $traffic */
        $traffic = Traffic::query()->create([
            'click_id' => $clickId,
            'account_id' => $accountId,
            'url' => $url,
            'id_user' => $idUser,
            'pay_action' => $payAction,
        ]);

        return $traffic;
    }

    public static function find(string $accountId): ?Traffic
    {
        /** @var Traffic $traffic */
        $traffic = Traffic::query()
            ->where('account_id', $accountId)
            ->first();

        return $traffic;
    }

    public static function send(int $amount, Traffic $traffic): void
    {
        try {
            if ($amount < 3) {
                $url = sprintf(
                    config('services.binom.subscribe_url'),
                    $traffic->click_id,
                    $traffic->id_user,
                    $traffic->pay_action,
                );
            } else {
                $url = sprintf(
                    config('services.binom.pay_url'),
                    $traffic->click_id,
                    $traffic->id_user,
                    $traffic->pay_action,
                    $amount,
                );
            }

            file_get_contents($url, false, stream_context_create([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ],
            ]));
        } catch (Exception) {
            return;
        }
    }
}
