<?php

namespace App\Http\Repository\V1;

use App\Http\Repository\Repository;
use App\Http\Resources\V1\ContinentResource;
use App\Models\Continent;

class ContinentRepository extends Repository
{

    protected function getClass(): Continent
    {
        return new Continent();
    }

    protected function getClassResource(): string
    {
        return ContinentResource::class;
    }
}
