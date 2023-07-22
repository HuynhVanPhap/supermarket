<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRootCategoryRequest extends FormRequest
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
            'name' => ['bail', 'required', 'min:1', 'max:60'],
        ];

        return $rules;
    }

    /**
     * Get the messages for rules
     *
     * @return array<string>
     */
    public function messages()
    {
        $messages = [
            'name.required' => __("The field is required", ['field' => __("Category's name")]),
            'name.min' => __("The field must be at least characters", ['field' => __("Category's name"), 'number' => 1]),
            'name.max' => __("The field must be at greater characters", ['field' => __("Category's name"), 'number' => 60])
        ];

        return $messages;
    }
}
