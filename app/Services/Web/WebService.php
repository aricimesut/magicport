<?php

namespace App\Services\Web;

use App\Repository\BaseRepository;
use Illuminate\Support\Facades\Validator;

class WebService
{
    protected BaseRepository $repository;

    protected array $rules = [];

    protected array $niceNames = [];

    /**
     * @param $request
     * @return array
     */
    public function store($request): array
    {
        $validator = Validator::make($request->all(), $this->rules, [], $this->niceNames);

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

    /**
     * @param $request
     * @param $id
     * @return array
     */
    public function update($request, $id): array
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

    /**
     * @param $request
     * @return array
     */
    public function index($request): array
    {
        return $this->repository->index($request->all());
    }

    /**
     * @param $id
     * @return array
     */
    public function show($id): array
    {
        return $this->repository->show($id);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id): bool
    {
        return $this->repository->destroy($id);
    }


}
