<?php

namespace App\Http\Requests\V1\Country;

use App\Http\Requests\Request;

class UpdateCountryRequest extends Request
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
        if ($this->method() === "PUT") {
            return [
                'name'=>'required|string|unique:countries',
                'capital'=>'required|string',
                'language'=>'required|string',
                'currencyName'=>'required|string',
                'continentId'=>'required|numeric|between:1,7'
            ];
        }else
            return [
                'name'=>'sometimes|required|string|unique:countries',
                'capital'=>'sometimes|required|string',
                'language'=>'sometimes|required|string',
                'currencyName'=>'sometimes|required|string',
                'continentId'=>'sometimes|required|numeric|between:1,7'
            ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->currencyName) {
            $this->merge(['currency_name'=>$this->currencyName,]);
        }
        if ($this->continentId) {
            $this->merge(['continent_id' => $this->continentId]);
        }
    }
}
