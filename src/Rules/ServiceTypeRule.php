<?php

namespace Sashalenz\NovaPoshtaApi\Rules;

use Illuminate\Contracts\Validation\Rule;

final class ServiceTypeRule implements Rule
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
            'DoorsDoors',
            'DoorsWarehouse',
            'WarehouseWarehouse',
            'WarehouseDoors'
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
