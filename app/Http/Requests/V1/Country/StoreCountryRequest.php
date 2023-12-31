<?php

namespace App\Http\Requests\V1\Country;

use App\Http\Requests\Request;

class StoreCountryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|unique:countries',
            'capital'=>'required|string',
            'language'=>'required|string',
            'currencyName'=>'required|string',
            'continentId'=>'required|numeric|between:1,7'
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge(
            [
                'currency_name'=>$this->currencyName,
                'continent_id' => $this->continentId
            ]
        );
    }
}
