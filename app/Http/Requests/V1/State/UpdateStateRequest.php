<?php

namespace App\Http\Requests\V1\State;

use App\Http\Requests\Request;
use App\Rules\isCountryAvailable;
use Illuminate\Validation\Rule;

class UpdateStateRequest extends Request
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
        if($this->method() === 'PUT')
            return [
                'name'=>['required','string',Rule::unique('states')->ignore($this->route('state'))],
                'capital'=>'required|string',
                'governor' => 'required|string',
                'position' => 'required|in:center,west,east,south,north',
                'code' => 'required|numeric',
                'countryId' => ['required',new isCountryAvailable()]
            ];
        else
            return [
                'name'=>['sometimes','required','string',Rule::unique('states')->ignore($this->route('state'))],
                'capital'=>'sometimes|required|string',
                'governor' => 'sometimes|required|string',
                'position' => 'sometimes|required|in:center,west,east,south,north',
                'code' => 'sometimes|required|numeric',
                'countryId' => ['sometimes','required',new isCountryAvailable()]
            ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->countryId) {
            $this->merge(['currency_name'=>$this->countryId]);
        }
    }
}
