<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneNumber;

class StoreFileOwnerRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'min:2'],
            'middlename' => ['nullable', 'string', 'min:2'],
            'lastname' => ['required', 'string', 'min:2'],
            'email' => ['nullable', 'email', 'unique:users'],
            'phone' => ['nullable', 'numeric'],
            'street_address_one' => ['required', 'string'],
            'street_address_two' => ['nullable', 'string', 'max:30'],
            'state' => ['nullable', 'string', 'min:2'],
            'country' => ['required', 'string', 'min:2']
        ];
    }

    public function attributes()
    {
        return [
            'lastname' => 'familyname',
            'email' => 'email address',
            'phone' => 'phone number',
        ];
    }
}
