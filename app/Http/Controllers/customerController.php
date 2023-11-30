<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\customers\store;
use App\Http\Requests\customers\update;
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
                'code'      =>201,
                'error'     =>false,
                'message'   =>'Successfully created data user',
            ];
            Log::info("Successfully created data user.");
                return response()->json($resultData,201);
        } catch (\Throwable $th) {
            $resultData = [
                'code'      =>500,
                'error'     =>true,
                'message'   =>'Internal Server Error',
            ];
            Log::info("Internal Server Error - API Create Customers.");
                return response()->json($resultData,500);
        }   
    }

    public function findAll()
    {
        try {
            $result = $this->CustomerResponse->findAll();
            if($result->count() < 1) {
                $this->NotFound($result);
            }
                $resultData = [
                    'code'      =>200,
                    'error'     =>false,
                    'message'   =>'Successfully find data user',
                    'data'      =>$result
                ];
                Log::info("Successfully find data user.");
                    return response()->json($resultData,200);
        } catch (\Throwable $th) {
            $resultData = [
                'code'      =>500,
                'error'     =>true,
                'message'   =>'Internal Server Error',
            ];
            Log::info("Internal Server Error - API Find All Customers.");
                return response()->json($resultData,500);
        }
    }

    public function detail($id)
    {
        try {
            $result = $this->CustomerResponse->first($id);
            if($result->count() < 1) {
                return $this->NotFound($result);
            }
                $resultData = [
                    'code'  =>200,
                    'error'     =>false,
                    'message'   =>'Successfully detail data user',
                    'data'      =>[
                        'result' => $result
                    ]
                ];
                Log::info("Successfully detail data user.");
                    return response()->json($resultData,200);
        } catch (\Throwable $th) {
            $resultData = [
                'code'      =>500,
                'error'     =>true,
                'message'   =>'Internal Server Error',
            ];
            Log::info("Internal Server Error - API Detail Customers.");
                return response()->json($resultData,500);
        }
    }

    public function update(update $request, $id)
    {
        try {
            $result = $this->CustomerResponse->first($id);
            if($result->count() < 1) {
                return $this->NotFound($result);
            }
                $this->CustomerResponse->update($request, $id);
                $resultData = [
                    'code'      =>200,
                    'error'     =>false,
                    'message'   =>'Successfully update data user'
                ];
                Log::info("Successfully update data user.");
                    return response()->json($resultData,200);
        } catch (\Throwable $th) {
            $resultData = [
                'code'      =>500,
                'error'     =>true,
                'message'   =>'Internal Server Error',
            ];
            Log::info("Internal Server Error - API Update Customers.");
                return response()->json($resultData,500);
        }
    }

    public function delete($id)
    {
        try {
            $result = $this->CustomerResponse->first($id);
            if($result->count() < 1) {
                return $this->NotFound($result);
            }
                $this->CustomerResponse->delete($id);
                $resultData = [
                    'code'      =>200,
                    'error'     =>false,
                    'message'   =>'Successfully delete data user'
                ];
                Log::info("Successfully delete data user.");
                    return response()->json($resultData,200);
        } catch (\Throwable $th) {
            $resultData = [
                'code'      =>500,
                'error'     =>true,
                'message'   =>'Internal Server Error',
            ];
            Log::info("Internal Server Error - API Delete Customers.");
                return response()->json($resultData,500);
        }
    }

    private function NotFound($result) {
        $resultData = [
            'code'      =>404,
            'error'     =>false,
            'message'   =>'Data user Not Found',
            'data'      =>[
                'result'    => []
            ]
        ];
        Log::info("Data user Not Found.");
            return response()->json($resultData,404);
    }
}
