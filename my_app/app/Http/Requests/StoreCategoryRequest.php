<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'root_category_id' => ['bail', 'required', 'numeric', 'exists:App\Models\RootCategory,id,deleted_at,NULL']
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
            'name.max' => __("The field must be at greater characters", ['field' => __("Category's name"), 'number' => 60]),
            'root_category_id.required' => __("The field is required", ['field' => __("Category")]),
            'root_category_id.numeric' => __("Data is invalid"),
            'root_category_id.exists' => __("Data does not exist"),
        ];

        return $messages;
    }
}
