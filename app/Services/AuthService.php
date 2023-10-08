<?php

namespace App\Services;

use App\Enums\ResponseTypeEnum;
use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Authenticate user
     *
     * @param  string  $username
     * @param  string  $password
     * @param  array<RoleEnum>  $role
     */
    public static function authenticate(?string $username, ?string $password, array $roles, ResponseTypeEnum $responseType = ResponseTypeEnum::WEB)
    {
        $user = User::with('role')->where('username', $username)->whereHas('role', function ($query) use ($roles) {
            $query->whereIn('name', $roles);
        })->first();

        if (! $user || ! Hash::check($password, $user?->password)) {
            return false;
        }

        $auth = auth();

        if ($responseType == ResponseTypeEnum::API) {
            $auth = $auth->guard('api');
        }

        return $auth->login($user);
    }
}
