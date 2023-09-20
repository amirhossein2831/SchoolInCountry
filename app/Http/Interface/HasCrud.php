<?php

namespace App\Http\Interface;

use Illuminate\Database\Eloquent\Model;

interface HasCrud
{
    public function getAll($builder);
    public function getEntity(Model $entity);
    public function create(array $data);
    public function update(Model $entity, array $data);
    public function delete(Model $entity);
}
