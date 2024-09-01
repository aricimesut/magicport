<?php

namespace App\Repository;

use App\Http\Resources\Api\TaskDetailResources;
use App\Http\Resources\Api\TaskResources;
use App\Models\Task;

class TaskRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Task();
        $this->resource = TaskResources::class;
        $this->searchable = [
            'name',
            'description'
        ];
    }

    public function show(int $id): array
    {
        $record = $this->model->find($id);

        if (!$record) {
            return [
                'message' => 'Record not found',
                'status' => 404,
                'data' => null
            ];
        }

        return [
            'message' => 'Record found',
            'status' => 200,
            'data' => json_encode(new TaskDetailResources($record))
        ];
    }

    public function getDetail($id)
    {
        return $this->model->find($id);
    }
}
