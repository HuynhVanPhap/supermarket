<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImportRequest extends FormRequest
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
            'upload' => ['bail', 'required', 'mimes:csv,txt,xlsx,xls'],
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'upload.required' => __("The field is required", ['field' => __("Upload")]),
            'upload.mimes' => __('Upload not valid'),
        ];

        return $messages;
    }
}
