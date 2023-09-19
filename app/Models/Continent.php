<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use LaravelIdea\Helper\App\Models\_IH_Continent_QB;
use Throwable;

class Continent extends Model
{
    use HasFactory;

    public $guarded = [];

    public function contries()
    {
        $this->hasMany('');
    }
    public function edit($value): JsonResponse
    {
        try {
            $this->updateOrFail($value);
        } catch (Throwable) {
            return response()->json(['error'=>'something went wrong'], 400);
        }
        return response()->json(['success'=>'Updated successfully'], 201);
    }

    public function remove(): JsonResponse
    {
        try {
            $this->deleteOrFail();
        } catch (Throwable ) {
            return response()->json(['error'=>'something went wrong'], 400);
        }
        return response()->json(['success'=>'Deleted successfully']);
    }
}
