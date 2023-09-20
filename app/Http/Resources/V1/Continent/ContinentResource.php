<?php

namespace App\Http\Resources\V1\Continent;

use App\Http\Resources\V1\Country\CountryResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ContinentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id'=>$this->id,
            'name' => $this->name,
            'countries'=> CountryResource::collection($this->whenLoaded('countries'))
        ];
    }
}
