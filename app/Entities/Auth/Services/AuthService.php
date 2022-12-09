<?php

namespace App\Entities\Auth\Services;

use App\Base\Services\ServiceBase;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Str;

/**
 * Class AuthService
 * @package App\Entities\Auth\Services
 */
class AuthService extends ServiceBase
{

    public function login(
        string $email,
        string $password,
        string $deviceName = null,
    ): array {

        $credentials = ['email' => $email, 'password' => $password];

        if (!Auth::once($credentials)) {
            throw new Exception('Вы не можете войти с этими учетными данными', 401);
        }

        $user = Auth::user();
        if (in_array($deviceName, $user->tokens->pluck('name')->toArray())) {
            $user->tokens()->where('name', $deviceName)->delete();
        }

        $token = $user->createToken($deviceName);

        return ['token' => $token->plainTextToken];
        //$token = $user->createToken('Token Name')->accessToken;
        //$token = $user->createToken($deviceName);
        //$token->expires_at = Carbon::now()->addYear();

        //$token->save();

//        return [
//            'token_type' => 'Bearer',
//            'token' => $token->accessToken,
//            'expires_at' => Carbon::parse($token->token->expires_at)->timestamp
//        ];
    }

    public function logout(mixed $token)
    {
        $user = Auth::user();
        $tokenId = Str::before($token, '|');
        $user->tokens()->where('id', $tokenId )->delete();
    }

}
