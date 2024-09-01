<?php

namespace App\Services\Api;

use App\Repository\BaseRepository;
use Illuminate\Support\Facades\Validator;

class ApiService
{

    protected BaseRepository $repository;

    protected array $rules = [];

    protected array $niceNames = [];

    public function store($request) : array
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);
        if ($validator->fails()) {
            $errors = implode(' ', $validator->errors()->all());
            return [
                'message' => $errors,
                'status' => 422,
                'data' => []
            ];
        }
        return $this->repository->store($request->all());
    }

    public function update($request, $id) : array
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);
        if ($validator->fails()) {
            $errors = implode(' ', $validator->errors()->all());
            return [
                'message' => $errors,
                'status' => 422,
                'data' => []
            ];
        }
        return $this->repository->update($id, $request->all());
    }

    public function index($request) : array
    {
        return $this->repository->index($request->all());
    }

    public function show($id) : array
    {
        return $this->repository->show($id);
    }

    public function destroy($id): bool
    {
        return $this->repository->destroy($id);
    }

}
