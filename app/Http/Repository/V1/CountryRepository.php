<?php

namespace App\Http\Repository\V1;

use App\Http\Repository\Repository;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class CountryRepository extends Repository
{

    protected function getClass(): Model
    {
        return new Country();
    }
}
