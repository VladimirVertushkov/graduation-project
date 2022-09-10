<?php

namespace App\Entities\Users\Http\Controllers;

use App\Entities\Users\Services\UsersService;
use App\Http\Controllers\Api\ControllerBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends ControllerBase
{
    public function __construct(protected UsersService $userService)
    {
        parent::__construct();
    }

    public function save(Request $request, string $id = null)
    {
        $savedId = DB::transaction(function () use ($request, $id) {
            return $this->userService->save($request->all(), $id);
        }, 2);

        return $this->response([
            'status' => 'ok',
            'data' => ['id' => $savedId]
        ]);
    }

}
