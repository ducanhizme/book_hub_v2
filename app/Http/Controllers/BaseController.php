<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BaseController extends Controller
{
    protected function successResponse(  $data, string $message="This is messages", int $code= ResponseAlias::HTTP_OK):JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
        ], $code);
    }

    protected function errorResponse (string $message, int $code):JsonResponse
    {
        return response()->json([
            'error' => $message,
        ], $code);
    }
}
