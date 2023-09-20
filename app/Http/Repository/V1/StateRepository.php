<?php

namespace App\Http\Repository\V1;

use App\Http\Repository\Repository;
use App\Models\State;
use Illuminate\Database\Eloquent\Model;

class StateRepository extends Repository
{

    protected function getClass(): Model
    {
        return new State();
    }
}
