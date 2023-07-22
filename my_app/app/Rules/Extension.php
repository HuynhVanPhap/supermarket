<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Extension implements Rule
{
    protected $parameters;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(null|array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $extension = strtolower($value->getClientOriginalExtension());

        return ($extension !== '' && in_array($extension, $this->parameters)) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __("Image not valid");
    }
}
