<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Api\RequestListApiRequest;
use App\Http\Resources\RequestResource;
use App\Services\RequestService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequestApiController extends ApiController
{
    public function __construct(
        private RequestService $requestService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(RequestListApiRequest $request)
    {
        $requests = $this->requestService->list($request->student_id, true, $request->count);

        return $this->makeResponse(
            Response::HTTP_OK,
            RequestResource::collection($requests),
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
