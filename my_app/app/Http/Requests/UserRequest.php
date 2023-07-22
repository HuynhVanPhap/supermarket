<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return ($this->isMethod('post')) ? $this->store() : $this->update();
    }

    public function store()
    {
        $rules = [
            'name' => ['bail', 'required', 'min:5', 'max:60'],
            'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
            'phone' => ['bail', 'required', 'regex:/^(0)\d+$/', 'min:10', 'max:14'],
            'address' => ['bail', 'required', 'min:1', 'max:120'],
            'password' => ['required', 'max:100'],
            'retype_password' => ['required', 'max:100', 'same:password']
        ];

        return $rules;
    }

    public function update()
    {
        $rules = [
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['bail', 'required', 'regex:/^(0)\d+$/', 'min:10', 'max:14'],
            'address' => ['bail', 'required', 'min:1', 'max:120']
        ];

        return $rules;
    }

    public function messages()
    {
        $message = [
            'name.required' => __("The field is required", ['field' => __("User name")]),
            'name.min' => __("The field must be at least characters", ['field' => __("User name"), 'number' => 5]),
            'name.max' => __("The field must be at greater characters", ['field' => __("User name"), 'number' => 60]),
            'email.required' =>  __('The field is required', ['field' => 'Email']),
            'email.email' =>  __('The email address is not valid'),
            'email.unique' => __('The field is unique', ['field' => 'Email']),
            'phone.required' =>  __("The field is required", ['field' => __("Phone")]),
            'phone.regex' => __("The field is not valid", ['field' => __("Phone")]),
            'phone.min' => __("The field must be at least characters", ['field' => __("Phone"), 'number' => 10]),
            'phone.max' => __("The field must be at least characters", ['field' => __("Phone"), 'number' => 14]),
            'address.required' => __("The field is required", ['field' => __("Address")]),
            'address.min' => __("The field must be at least characters", ['field' => __("Address"), 'number' => 1]),
            'address.max' => __("The field must be at greater characters", ['field' => __("Address"), 'number' => 120]),
            'password.required' =>  __('The field is required', ['field' => __("Password")]),
            'password.max' => __("The field must be at greater characters", ['field' => __("Password"), 'number' => 100]),
            'retype_password.required' =>  __('The field is required', ['field' => __("Retype password")]),
            'retype_password.max' => __("The field must be at greater characters", ['field' => __("Password"), 'number' => 100]),
            'retype_password.same' => __("The field not same", ['field' => __("Password")]),
        ];

        return $message;
    }
}
