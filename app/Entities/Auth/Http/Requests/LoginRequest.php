<?php

namespace App\Entities\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
            'deviceId' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'A email is required',
            'password.required' => 'A password is required',
            'deviceId.required' => 'A deviceId is required',
        ];
    }
}

