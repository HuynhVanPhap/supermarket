<?php

namespace App\Http\Requests;

use App\Rules\Extension;
use App\Rules\Money;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => ['bail', 'required', 'min:5', 'max:100'],
            'category_id' => ['bail', 'required', 'numeric', 'exists:categories,id,deleted_at,NULL'],
            'price' => ['bail', 'required', new Money()],
            'discount_percent' => ['bail', 'numeric', 'min:0', 'max:100'],
            'stock' => ['bail', 'required', 'numeric', 'min:1'],
            'image' => [
                'bail',
                'image',
                'mimes:jpeg,png,jpg',
                'mimetypes:image/jpeg,image/png,image/jpg',
                new Extension(['jpeg', 'png', 'jpg']),
                'file',
                'max:2048', // 2MB
                'dimensions:max_width=1100,max_height=1100'
            ],
        ];

        return $rules;
    }

    /**
     * Get the messages that apply to the rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        $messages = [
            'name.required' => __("The field is required", ['field' => __("Product's name")]),
            'name.min' => __("The field must be at least characters", ['field' => __("Product's name"), 'number' => 5]),
            'name.max' => __("The field must be at greater characters", ['field' => __("Product's name"), 'number' => 100]),
            'category_id.required' => __("The field is required", ['field' => __("Product")]),
            'category_id.numeric' => __("Data is invalid"),
            'category_id.exists' => __("Data does not exist"),
            'price.required' => __("The field is required", ['field' => __("Price")]),
            'discount_percent.numeric' => __("Data is invalid"),
            'discount_percent.min' => __("The field must be at least characters", ['field' => __("Product's name"), 'number' => 0]),
            'discount_percent.max' => __("The field must be at greater characters", ['field' => __("Product's name"), 'number' => 100]),
            'stock.required' => __("The field is required", ['field' => __("Stock")]),
            'stock.numeric' => __("Data is invalid"),
            'stock.min' => __("The field must be at least characters", ['field' => __("Stock"), 'number' => 1]),
            'image.image' => __('Image not valid'),
            'image.mimes' => __('Image not valid'),
            'image.mimetypes' => __('Image not valid'),
            'image.file' => __('Uploaded image not success'),
            'image.max' => __('Uploaded image exceed the allowed size'),
            'image.dimensions' => __("Uploaded image exceed the allowed 'px'")
        ];

        return $messages;
    }
}
