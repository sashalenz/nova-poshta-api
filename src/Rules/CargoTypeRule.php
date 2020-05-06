<?php

namespace A20\Services\NovaPoshta\Rules;

use Illuminate\Contracts\Validation\Rule;

final class CargoTypeRule implements Rule
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
