<?php

namespace Domain\Subscription\Requests;

use Domain\Subscription\Data\SubscriptionCreateData;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class SubscriptionCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'url' => 'nullable|url',
            'clickid' => 'nullable',
            'iduser' => 'nullable',
            'payaction' => 'nullable',
        ];
    }

    /**
     * @throws UnknownProperties
     */
    public function getData(): SubscriptionCreateData
    {
        return new SubscriptionCreateData([
            'token' => $this->get('token'),
            'email' => $this->get('email'),
            'clickId' => $this->get('clickid'),
            'url' => $this->get('url'),
            'idUser' => $this->get('iduser'),
            'payAction' => $this->get('payaction'),
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }
}
