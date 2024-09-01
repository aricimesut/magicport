<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait  ApiResponser
{
    public function response(string $message = 'Success', int $code = 200, array|string $data = null): JsonResponse
    {
        //if data is string, decode it to array
        if (is_string($data)) {
            $data = json_decode($data, true);
        }

        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $code
        ], $code);
    }

}
