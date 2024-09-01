<?php

namespace App\Repository;

use App\Http\Resources\Api\ProjectDetailResources;
use App\Http\Resources\Api\ProjectResources;
use App\Models\Project;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class ProjectRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Project();
        $this->resource = ProjectResources::class;
        $this->searchable = [
            'name',
            'description'
        ];
    }

    /**
     * @param int $id
     * @return array
     */
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
            'data' => json_encode(new ProjectDetailResources($record))
        ];
    }

    /**
     * @return JsonResponse
     * @throws Exception
     */
    public function datatable(): JsonResponse
    {
        $query = Project::query();;

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('process', function ($value) {
                return '<a class="btn btn-success btn-xs" href="' . route('project.show', ["id" => $value->id]) . '"> <i class="fa fa-search"></i></a>
                <a class="btn btn-danger btn-xs" onclick="Destroy(\'' . route("project.destroy", ["id" => $value->id]) . '\',' . $value->id . ')" > <i class="fa fa-trash"></i></a>
                ';
            })
            ->rawColumns(['process'])
            ->make(true);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        return $this->model->destroy($id);
    }

    public function getProjectDetail($id)
    {
        return $this->model->with("tasks")
            ->find($id);

    }
}
