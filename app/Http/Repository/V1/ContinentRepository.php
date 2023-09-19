<?php

namespace App\Http\Repository\V1;

use App\Http\Repository\Repository;
use App\Models\Continent;

class ContinentRepository extends Repository
{

    protected function getClass(): Continent
    {
        return new Continent();
    }
}
