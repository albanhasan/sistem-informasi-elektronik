<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateTotalPayment implements Rule
{

    public $totalHarga;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($totalHarga)
    {
        $this->totalHarga = $totalHarga;
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
        if($value < $this->totalHarga) {
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
        return 'Uang anda tidak cukup';
    }
}
