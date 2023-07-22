<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => ['bail', 'required', 'min:1', 'max:60'],
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['bail', 'required', 'regex:/^(0)\d+$/', 'min:10', 'max:14'],
            'address' => ['bail', 'required', 'min:1', 'max:60']
        ];

        return $rules;
    }

    public function update()
    {
        $rules = [

        ];

        return $rules;
    }

    public function messages()
    {
        $message = [
            'name.required' => __("The field is required", ['field' => __("Customer name")]),
            'name.min' => __("The field must be at least characters", ['field' => __("Customer name"), 'number' => 1]),
            'name.max' => __("The field must be at greater characters", ['field' => __("Customer name"), 'number' => 60]),
            'email.required' =>  __('The field is required', ['field' => 'Email']),
            'email.email' =>  __('The email address is not valid'),
            'phone.required' =>  __("The field is required", ['field' => __("Phone")]),
            'phone.regex' => __("The field is not valid", ['field' => __("Phone")]),
            'phone.min' => __("The field must be at least characters", ['field' => __("Phone"), 'number' => 10]),
            'phone.max' => __("The field must be at least characters", ['field' => __("Phone"), 'number' => 14]),
            'address.required' => __("The field is required", ['field' => __("Address")]),
            'address.min' => __("The field must be at least characters", ['field' => __("Address"), 'number' => 1]),
            'address.max' => __("The field must be at greater characters", ['field' => __("Address"), 'number' => 60]),
        ];

        return $message;
    }
}
