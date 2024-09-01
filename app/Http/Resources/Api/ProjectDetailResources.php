<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectDetailResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'tasks' => array_map(function ($task) {
                return [
                    'id' => $task["id"],
                    'name' => $task["name"],
                    'description' => $task["description"],
                    'status' => $task["status"],
                    'status_label' => __('status_' . $task["status"]),
                ];
            }, $this->tasks->toArray()),
        ];
    }
}
