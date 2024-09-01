<?php

namespace App\Services\Web;

use App\Repository\ProjectRepository;

class ProjectService extends WebService
{
    public function __construct()
    {
        $this->repository = new ProjectRepository();

        $this->rules = [
        ];

        $this->niceNames = [
        ];
    }

    public function datatable()
    {
        return $this->repository->datatable();
    }

    public function getProjectDetail($id)
    {
        return $this->repository->getProjectDetail($id);
    }

}
