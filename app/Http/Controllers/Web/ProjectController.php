<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\Web\ProjectService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->service = new ProjectService();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function datatable(Request $request): JsonResponse
    {
        return $this->service->datatable();
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function show($id)
    {
        $project = $this->service->getProjectDetail($id);

        if (!$project) {
            return view('errors/404');
        }

        $with = [
            'title' => $project->name,
            'description' => $project->description,
            'project' => $project
        ];

        return view('web/project/show', $with);
    }
}
