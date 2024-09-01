<?php

namespace App\Services\Api;

use App\Repository\ProjectRepository;

class ProjectService extends ApiService
{

    public function __construct()
    {
        $this->repository = new ProjectRepository();

        $this->rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable',
        ];
        $this->niceNames = [
            'name' => 'Project Name',
            'description' => 'Project Description',
        ];
    }

}
