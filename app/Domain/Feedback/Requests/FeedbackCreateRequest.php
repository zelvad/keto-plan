<?php

namespace Domain\Feedback\Requests;

use Domain\Feedback\Data\FeedbackCreateData;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class FeedbackCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required',
        ];
    }

    protected function prepareForValidation(): void
    {
        // TODO: refactor
        session()->put('lastForm', 'feedback');
    }

    /**
     * @throws UnknownProperties
     */
    public function getData(): FeedbackCreateData
    {
        return new FeedbackCreateData([
            'name' => $this->get('name'),
            'email' => $this->get('email'),
            'phone' => $this->get('phone'),
            'message' => $this->get('message'),
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }
}
