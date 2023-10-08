<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Api\StudentStoreApiRequest;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentApiController extends ApiController
{
    public function __construct(
        private StudentService $studentService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentStoreApiRequest $request)
    {
        $this->studentService->create($request->validated());

        return $this->makeResponse(Response::HTTP_CREATED, [
            'message' => 'Registration is successful, kindly wait for registrar to validate your information. This will take 2-3 working days.',
        ]);
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
