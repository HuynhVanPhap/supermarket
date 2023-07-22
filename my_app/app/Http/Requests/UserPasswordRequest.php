<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordRequest extends FormRequest
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
            'password' => ['required', 'max:100'],
            'retype_password' => ['required', 'max:100', 'same:password']
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'password.required' =>  __('The field is required', ['field' => __("Password")]),
            'password.max' => __("The field must be at greater characters", ['field' => __("Password"), 'number' => 100]),
            'retype_password.required' =>  __('The field is required', ['field' => __("Retype password")]),
            'retype_password.max' => __("The field must be at greater characters", ['field' => __("Retype password"), 'number' => 100]),
            'retype_password.same' => __("The field not same", ['field' => __("Password")]),
        ];

        return $messages;
    }
}
