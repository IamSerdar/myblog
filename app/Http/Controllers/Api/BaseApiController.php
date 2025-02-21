<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseApiController
{
    protected function success(
        AnonymousResourceCollection|JsonResource|array|null $data = null,
        ?array $pagination = null,
        int $status = 200,
        ?string $message = null
    ): JsonResponse {
        $response = [
            'success' => 1,
            'data' => $data,
        ];

        if ($pagination) {
            $response['pagination'] = $pagination;
        }
        if ($message) {
            $response['message'] = $message;
        }

        return response()->json($response, $status);
    }

    public function error(array $errors, int $status = 422, string $message = null)
    {
        $response = [
            'success' => 0,
            'errors' => $errors,
        ];
        if ($message) {
            $response['message'] = $message;
        }
        return response()->json($response, $status);
    }

    public function singleError(string $errorCode, string $errorMessage = null, int $status = 400, array $meta = [])
    {
        $response = [
            'success' => 0,
            'error' => [
                'code' => $errorCode,
                'message' => $errorMessage,
            ],
        ];
        return response()->json($response, $status);
    }
}
