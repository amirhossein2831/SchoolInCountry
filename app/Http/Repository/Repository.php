<?php

namespace App\Http\Repository;

use App\Models\Continent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Throwable;

abstract class Repository
{
    protected abstract function getClass():Model;

    public function index(): Builder
    {
        return $this->getClass()::query();
    }

    public function create($value)
    {
       return $this->getClass()::create($value);
    }

    public function update(Model $continent,$value): JsonResponse
    {
        try {
            $continent->updateOrFail($value);
        } catch (Throwable) {
            return response()->json(['error'=>'something went wrong'], 400);
        }
        return response()->json(['success'=>'Updated successfully'], 201);
    }

    public function delete(Model $continent): JsonResponse
    {
        try {
            $continent->deleteOrFail();
        } catch (Throwable) {
            return response()->json(['error'=>'something went wrong'], 400);
        }
        return response()->json(['success'=>'Deleted successfully']);
    }
}
