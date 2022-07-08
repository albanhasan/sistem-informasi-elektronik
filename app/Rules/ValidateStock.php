<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateStock implements Rule
{
    public $stock;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($stock)
    {
        $this->stock = $stock;
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
        if($value > $this->stock) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Stok tidak cukup';
    }
}
