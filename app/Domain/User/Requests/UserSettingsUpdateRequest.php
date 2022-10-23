<?php

namespace Domain\User\Requests;

use Domain\User\Data\UserSettingsUpdateData;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UserSettingsUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
                    ->ignore(auth()->user()->email, 'email')
            ],
            'password' => 'nullable|confirmed|min:8|max:100',
        ];
    }

    /**
     * @throws UnknownProperties
     */
    public function getData(): UserSettingsUpdateData
    {
        return new UserSettingsUpdateData([
            'name' => $this->get('name'),
            'email' => $this->get('email'),
            'password' => $this->get('password'),
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }
}
