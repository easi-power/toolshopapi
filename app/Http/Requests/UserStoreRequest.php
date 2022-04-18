<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class UserStoreRequest extends FormRequest
{
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
            "firstname" => ["required", "string", "max:50"],
            "lastname" => ["required", "string", "max:50"],
            "email" => ["required", "string", "max:255", new Unique('users', 'email')],
            "phone" => ["required", "string", "max:255", new Unique('users', 'phone')],
            "password" => ["required", "string", "max:20"],
        ];
    }
}
