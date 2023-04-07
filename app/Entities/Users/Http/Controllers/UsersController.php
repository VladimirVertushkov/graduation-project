<?php

namespace App\Entities\Users\Http\Controllers;

use App\Entities\Users\Services\UsersService;
use App\Http\Controllers\Api\ControllerBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class UsersController extends ControllerBase
{

    /**
     * @param UsersService $userService
     */
    public function __construct(protected UsersService $userService)
    {
        parent::__construct();

    }

    /**
     * @param Request $request
     * @param string|null $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function save(Request $request, string $id = null)
    {
        $response = DB::transaction(function () use ($request, $id) {
            return $this->userService->save($request->all(), $id);
        }, 2);

        return $this->response([
            'status' => 'ok',
            'data' => [
                'id' => $response['id'],
                'token' => $response['token'],
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function get(Request $request)
    {
        $response = $this->userService->get($request->all());

        return $this->response(['status' => 'ok', 'data' => $response]);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function show(Request $request, string $id)
    {
        $response = $this->userService->show($id);
        return $this->response(['status' => 'ok', 'data' => $response]);
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function delete(string $id)
    {
        $this->userService->delete($id);
        return $this->response(['status' => 'ok']);
    }

    public function joinToGroup(Request $request)
    {
        $this->userService->joinToGroup($request->all());
        return $this->response(['status' => 'ok']);
    }

    public function leaveToGroup(Request $request)
    {
        $this->userService->leaveToGroup($request->all());
        return $this->response(['status' => 'ok']);
    }

    public function getForGroup(Request $request)
    {
        $response = $this->userService->getForGroup($request->all());

        return $this->response(['status' => 'ok', 'data' => $response]);
    }
}
