<?php

namespace App\Http\Requests;

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
        $rules = [
            'email' => ['bail', 'required', 'email:rfc,dns', 'max:60'],
            'password' => ['required', 'max:100']
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'email.required' =>  __('The field is required', ['field' => __("Email")]),
            'email.email' =>  __('The email address is not valid'),
            'email.max' => __("The field must be at greater characters", ['field' => __("Email"), 'number' => 60]),
            'password.required' =>  __('The field is required', ['field' => __("Password")]),
            'password.max' => __("The field must be at greater characters", ['field' => __("Password"), 'number' => 100]),
        ];

        return $messages;
    }
}
