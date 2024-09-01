<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\ApiService;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends BaseController
{
    use ApiResponser;

    protected ApiService $service;

    public function store(Request $request): JsonResponse
    {
        try {
            $response = $this->service->store($request);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
        return $this->response($response['message'], $response['status'], $response['data']);
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $response = $this->service->index($request);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
        return $this->response($response['message'], $response['status'], $response['data']);
    }

    public function show($id): JsonResponse
    {
        try {
            $response = $this->service->show($id);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
        return $this->response($response['message'], $response['status'], $response['data']);
    }

    public function update(Request $request, $id): JsonResponse
    {
        try {
            $response = $this->service->update($request, $id);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
        return $this->response($response['message'], $response['status'], $response['data']);
    }

    public function destroy($id): JsonResponse
    {
        try {
            $response = $this->service->destroy($id);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
        return $this->response(code: $response ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

}
