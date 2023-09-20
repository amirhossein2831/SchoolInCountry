<?php

namespace App\Http\Requests\V1\State;

use App\Http\Requests\Request;
use App\Rules\isCountryAvailable;

class StoreStateRequest extends Request

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
            'name'=>'required|string|unique:states',
            'capital'=>'required|string',
            'governor' => 'required|string',
            'position' => 'required|in:center,west,east,south,north',
            'code' => 'required|numeric',
            'countryId' => ['required',new isCountryAvailable()]
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge(
            [
                'country_id' => $this->countryId
            ]
        );
    }
}
