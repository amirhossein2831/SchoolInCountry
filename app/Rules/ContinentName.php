<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ContinentName implements Rule
{
    public function __construct(
        private string $countryName
    ){}

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return in_array($this->countryName, [
            'Africa',
            'Antarctica',
            'Asia',
            'Europe',
            'North America',
            'South America',
            'Australia',
        ]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The Country name is not valid';
    }
}
