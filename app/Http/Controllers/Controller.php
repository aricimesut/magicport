<?php

namespace App\Http\Controllers;

use App\Services\Web\WebService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected WebService $service;

    /**
     * @param $message
     * @param int $code
     * @param $redirect
     * @return JsonResponse
     */
    public function response($message, int $code = 200, $redirect = null): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'redirect' => $redirect,
            'code' => $code,
        ], $code);
    }

}
