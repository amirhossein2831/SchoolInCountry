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

    public function create($data)
    {
       return $this->getClass()::create($data);
    }

    public function update(Model $continent, $data): JsonResponse
    {
        try {
            $continent->updateOrFail($data);
        } catch (Throwable) {
            return response()->json(['error'=>'something went wrong'], 400);
        }
        return response()->json(['success'=>'Updated successfully'], 201);
    }

    public function delete(Model $entity): JsonResponse
    {
        try {
            $entity->deleteOrFail();
        } catch (Throwable) {
            return response()->json(['error'=>'something went wrong'], 400);
        }
        return response()->json(['success'=>'Deleted successfully']);
    }
}
