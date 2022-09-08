<?php

namespace App\Helper;

class ResponseHelper
{
    public static function success($message = null): array
    {
        return [
            'status' => true,
            'message' => $message ?? __('Success')
        ];
    }

    public static function failed($message = null): array
    {
        return [
            'status' => false,
            'message' => $message ?? __('Failed')
        ];
    }
}
