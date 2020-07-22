<?php

namespace Sashalenz\NovaPoshtaApi\Rules;

use Illuminate\Contracts\Validation\Rule;

class CargoTypeRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, [
            'Cargo',
            'Documents',
            'TiresWheels',
            'Pallet',
            'Parcel'
        ]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Выбранное значение для :attribute ошибочно.';
    }
}
