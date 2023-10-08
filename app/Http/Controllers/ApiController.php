<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiController extends Controller
{
    protected function makeResponse(
        int $status,
        array|JsonResource $data,
        array $headers = []
    ) {
        return response()->json($data, $status, $headers);
    }
}
