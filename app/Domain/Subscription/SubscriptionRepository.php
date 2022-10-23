<?php

namespace Domain\Subscription;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class SubscriptionRepository
{
    public Http | PendingRequest $http;

    public function __construct(Http $http)
    {
        $this->http = $http;

        $this->setHeaders();
    }

    public function charge(float $amount, string $cryptogramToken, string $email = null): array
    {
        $data = [
            'Amount' => $amount,
            'CardCryptogramPacket' => $cryptogramToken,
            'Email' => $email,
            'AccountId' => $email,
            'Currency' => config('services.cloudpayments.currency'),
        ];

        $response = $this->http->post(
            config('services.cloudpayments.api_url') . 'payments/cards/charge', $data
        );

        return json_decode($response->body(), true) ?? [];
    }

    public function post3ds(string $transactionId, string $paRes): array
    {
        $data = [
            'TransactionId' => $transactionId,
            'PaRes' => $paRes,
        ];

        $response = $this->http->post(
            config('services.cloudpayments.api_url') . 'payments/cards/post3ds', $data
        );

        return json_decode($response->body(), true) ?? [];
    }

    public function refund(string $transactionId, float $amount): array
    {
        $data = [
            'TransactionId' => $transactionId,
            'Amount' => $amount,
        ];

        $response = $this->http->post(
            config('services.cloudpayments.api_url') . 'payments/refund', $data
        );

        return json_decode($response->body(), true) ?? [];
    }

    public function tokenCharge(float $amount, string $currency, string $accountId, string $token): array
    {
        $data = [
            'Currency' => $currency,
            'Amount' => $amount,
            'AccountId' => $accountId,
            'Token' => $token,
        ];

        $response = $this->http->post(
            config('services.cloudpayments.api_url') . 'payments/tokens/charge', $data
        );

        return json_decode($response->body(), true) ?? [];
    }

    private function setHeaders(): void
    {
        $this->http = $this->http::withHeaders([
            'Content-type: application/json',
        ])->withBasicAuth(
            config('services.cloudpayments.public_key'),
            config('services.cloudpayments.private_key'),
        );
    }
}
