<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\TaskService;

class TaskController extends ApiController
{
    public function __construct()
    {
        $this->service = new TaskService();
    }

}
