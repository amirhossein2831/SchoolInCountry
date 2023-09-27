<?php

namespace App\Http\Repository;

use App\Http\Interface\HasCrud;
use DB;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Throwable;

abstract class Repository implements HasCrud
{
    protected abstract function getClass(): Model;

    protected abstract function getClassResource();

    public function getAll($builder)
    {
        return $this->getClassResource()::collection($builder);
    }

    public function getEntity(Model $entity)
    {
        return $this->getClassResource()::make($entity);
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();

            if ($entity = $this->getClass()::create($data)) {
                DB::commit();
                $response = $entity;
            } else {
                DB::rollBack();
                $response = response()->json(['danger' => 'fail to create']);
        }
        } catch (Exception | Throwable) {
            $response = response()->json(['danger' => 'fail to create']);
        }
        return $response;
    }

    public function update(Model $entity, array $data): JsonResponse
    {
        try {
            $entity->updateOrFail($data);
        } catch (Throwable) {
            return response()->json(['error' => 'something went wrong'], 400);
        }
        return response()->json(['success' => 'Updated successfully'], 201);
    }

    public function delete(Model $entity): JsonResponse
    {
        try {
            $entity->deleteOrFail();
        } catch (Throwable) {
            return response()->json(['error' => 'something went wrong'], 400);
        }
        return response()->json(['success' => 'Deleted successfully']);
    }

    public function getQuery(): Builder
    {
        return $this->getClass()::query();
    }

}
