<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->service = new TaskService();

    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function store(Request $request)
    {
        $response = $this->service->store($request);

        return $this->response($response["message"], $response["status"], $response["redirect"] ?? null);
    }

    public function edit($id)
    {
        $task = $this->service->getDetail($id);

        if (!$task) {
            return view('errors/404');
        }

        $with = [
            'title' => $task->name,
            'description' => $task->description,
            'task' => $task
        ];

        return view('web/task/edit', $with);
    }

    public function update($id, Request $request)
    {
        $response = $this->service->update($request, $id);

        return $this->response($response["message"], $response["status"], $response["redirect"] ?? null);
    }
}
