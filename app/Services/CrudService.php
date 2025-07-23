<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class CrudService
{
    protected $model;

    public function setModel($modelClass)
    {
        $this->model = new $modelClass;
    }

    public function getAll($with = [])
    {
        return $this->model->with($with)->get();
    }

    public function getById($id, $with = [])
    {
        return $this->model->with($with)->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $instance = $this->model->findOrFail($id);
        $instance->update($data);
        return $instance;
    }

    public function delete($id)
    {
        $instance = $this->model->findOrFail($id);
        return $instance->delete();
    }
} 