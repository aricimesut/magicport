<?php

namespace App\Services\Web;

use App\Repository\TaskRepository;

class TaskService extends WebService
{
    public function __construct()
    {
        $this->repository = new TaskRepository();

        $this->rules = [
            'project_id' => 'required|integer|exists:projects,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'status' => 'required|in:todo,in_progress,done',
        ];
        $this->niceNames = [
            'name' => 'Project Name',
            'description' => 'Project Description',
            'status' => 'Project Status',
            'project_id' => 'Project',
        ];
    }

    public function getDetail($id)
    {
        return $this->repository->getDetail($id);
    }

}
