<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function requestorLogin(Request $request)
    {
        $token = AuthService::authenticate($request->username, $request->password, [RoleEnum::STUDENT]);

        if(!$token) {
            return response()->json(['message' => 'Unable to login, invalid credentials provided.'], Response::HTTP_UNAUTHORIZED);
        }

        $user = auth()->guard('api')->user()->load(['role','student']);

        return response()->json(['token' => $token, 'user' => $user]);
    }
}
