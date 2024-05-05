<?php

namespace App\Http\Responses;

use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ResponseApiHelper
{
    public static function success($data = null, $status = ResponseAlias::HTTP_OK)
    {
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], $status);
    }

    public static function error($message = '', $status = ResponseAlias::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $status);
    }

    public static function created($data = null)
    {
        return self::success($data, ResponseAlias::HTTP_CREATED);
    }

    public static function notFound($message = '')
    {
        return self::error($message, ResponseAlias::HTTP_NOT_FOUND);
    }

    public static function errorField($message = '', $errors = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ], ResponseAlias::HTTP_UNPROCESSABLE_ENTITY);
    }
}
