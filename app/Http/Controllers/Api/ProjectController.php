<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\ProjectService;

class ProjectController extends ApiController
{
    public function __construct()
    {
        $this->service = new ProjectService();
    }

}
