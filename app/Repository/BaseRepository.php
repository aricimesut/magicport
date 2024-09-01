<?php

namespace App\Repository;

use App\Http\Resources\Api\PaginateCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class BaseRepository
{
    protected Model $model;

    protected string $resource;

    protected array $searchable = [];

    public function store(array $data): array
    {
        $record = $this->model->create($data);

        return [
            'message' => 'Record created successfully',
            'status' => 200,
            'data' => json_encode(new $this->resource($record))
        ];
    }

    public function index(array $data): array
    {
        $search = $data['search'] ?? null;

        $records = $this->model
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    foreach ($this->searchable as $field) {
                        $query->orWhere($field, 'like', "%$search%");
                    }
                });
            })
            ->paginate($data['per_page'] ?? 10);

        return [
            'message' => 'Records found',
            'status' => 200,
            'data' => json_encode(new PaginateCollection($records, $this->resource))
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
            'data' => json_encode(new $this->resource($record))
        ];
    }

    public function update(int $id, array $data): array
    {
        $model = $this->model->find($id);

        if (!$model) {
            return [
                'message' => 'Record not found',
                'status' => 404,
                'data' => null
            ];
        }

        $model->update($data);

        return [
            'message' => 'Record updated successfully',
            'status' => 200,
            'data' => json_encode(new $this->resource($model))
        ];
    }

    public function destroy(int $id): bool
    {
        return $this->model->destroy($id);
    }
}
