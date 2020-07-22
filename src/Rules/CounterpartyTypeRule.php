<?php

namespace Sashalenz\NovaPoshta\Rules;

use Illuminate\Contracts\Validation\Rule;

class CounterpartyTypeRule implements Rule
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
            'PrivatePerson',
            'Organization'
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
