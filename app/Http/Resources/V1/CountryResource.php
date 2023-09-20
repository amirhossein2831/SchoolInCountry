<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'capital'=>$this->capital,
            'language' => $this->language,
            'currencyName'=>$this->currency_name,
            'states'=>  StateResource::collection($this->whenLoaded('states'))
        ];
    }
}
