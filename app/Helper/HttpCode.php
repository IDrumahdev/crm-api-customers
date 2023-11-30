<?php

namespace App\Helper;

class HttpCode
{
    public static function status($code)
    {
        if ($code == 404) {
            $response = [
                'code'      =>404,
                'error'     =>false,
                'message'   =>'Check Incorrect URL.',
            ];
                return response()->json($response, 404);
        } elseif ($code == 405) {
            $response = [
                'code'      =>405,
                'error'     =>false,
                'message'   =>'Check Incorrect Method',
            ];
                return response()->json($response, 405);
        } elseif ($code == 500) {
            $response = [
                'code'      =>500,
                'error'     =>false,
                'message'   =>'Internal Server Error',
            ];
                return response()->json($response, 500);
        }
    }
}
