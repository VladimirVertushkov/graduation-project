<?php

namespace App\Entities\Auth\Http\Controllers;

use App\Entities\Auth\Exceptions\AuthException;
use App\Exceptions\ResponseFormatException;
use App\Http\Controllers\Api\ControllerBase;
use App\Entities\Auth\Http\Requests\ForgotRequest;
use App\Mobile\v1\Auth\Services\ResetPasswordService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ResetPasswordController
 *
 * @package App\Mobile\v1\Auth\Http\Controllers
 */
class ResetPasswordController extends ControllerBase
{
    /**
     * @var ResetPasswordService
     */
    private $service;

    /**
     * ResetPasswordController constructor.
     *
     * @param  ResetPasswordService  $resetPasswordService
     */
    public function __construct(ResetPasswordService $resetPasswordService)
    {
        parent::__construct();
        $this->service = $resetPasswordService;
    }

    /**
     * @param  ForgotRequest  $request
     *
     * @return ResponseFactory|Response
     * @throws AuthException
     * @throws ResponseFormatException
     */
    public function forgot(ForgotRequest $request)
    {
        $this->service->sendToken($request->input('email'));
        return $this->response(['status' => 'ok']);
    }
}
