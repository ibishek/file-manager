<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFileOwnerRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => ['required', 'string', 'min:4'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string'],
            'street_address_one' => ['required', 'string'],
            'street_address_two' => ['nullable', 'string', 'max:30'],
            'state' => ['nullable', 'string', 'min:2'],
            'country' => ['required', 'string', 'min:2']
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => 'full name',
            'email' => 'email address',
            'phone' => 'phone number',
        ];
    }
}
