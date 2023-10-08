<?php

namespace App\Http\Controllers\Api;

use App\Enums\ResponseTypeEnum;
use App\Enums\RoleEnum;
use App\Http\Controllers\ApiController;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequestorAuthApiController extends ApiController
{
    public function login(Request $request)
    {
        $token = AuthService::authenticate($request->username, $request->password, [RoleEnum::STUDENT], ResponseTypeEnum::API);

        if (! $token) {
            return $this->makeResponse(Response::HTTP_UNAUTHORIZED, [
                'message' => 'Unable to login, invalid credentials provided.',
            ]);
        }

        return $this->makeResponse(Response::HTTP_OK, [
            'token' => $token,
            'user' => auth('api')->user()
        ]);
    }
}
