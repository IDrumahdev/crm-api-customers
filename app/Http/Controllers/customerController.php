<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\customers\store;
use App\Repository\Customers\CustomerResponse;

class customerController extends Controller
{
    protected $CustomerResponse;
    public function __construct(CustomerResponse $CustomerResponse)
    {
        $this->CustomerResponse = $CustomerResponse;
    }

    public function store(store $request)
    {
        try {
            $this->CustomerResponse->store($request);
            $resultData = [
                'httpcode'  =>201,
                'error'     =>false,
                'message'   =>'Successfully created user data',
            ];
            Log::info("Successfully created user data.");
                return response()->json($resultData,201);
        } catch (\Throwable $th) {
            $resultData = [
                'httpcode'  =>500,
                'error'     =>true,
                'message'   =>'Internal Server Error',
            ];
            Log::info("Internal Server Error - API Create Customers.");
                return response()->json($resultData,500);
        }   
    }
}
