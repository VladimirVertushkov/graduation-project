<?php

namespace App\Entities\Auth\Http\Controllers;

use App\Entities\Auth\Services\AuthService;
use App\Exceptions\ResponseFormatException;
use App\Http\Controllers\Api\ControllerBase;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

/**
 * Class LoginController
 *
 */
class LoginController extends ControllerBase
{

    public function __construct(protected AuthService $authService)
    {
        parent::__construct();
    }

    public function authenticate(Request $request)
    {
        return $this->response([
            'status' => 'ok',
            'data' => $this->authService->login(
                $request->email,
                $request->password,
                $request->deviceName,
            )
        ]);
    }

    public function logout(Request $request)
    {
        dd(11);
    }
}
