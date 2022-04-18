<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Validation\Rules\Unique;

class UserUpdateRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge(["user_id" => $this->route('user_id')]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "user_id" => ["required", "int", new Exists('users', 'id')],
            "firstname" => ["nullable", "string", "max:50"],
            "lastname" => ["nullable", "string", "max:50"],
            "email" => ["nullable", "string", "max:255", new Unique('users', 'email')],
            "phone" => ["nullable", "string", "max:255", new Unique('users', 'phone')],
            "password" => ["nullable", "string", "max:20"],
        ];
    }
}
