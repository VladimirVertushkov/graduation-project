<?php

namespace App\Entities\Groups\Http\Controllers;

use App\Entities\Groups\Services\GroupsService;
use App\Http\Controllers\Api\ControllerBase;
use Illuminate\Http\Request;

class GroupsController extends ControllerBase
{
    public function __construct(protected GroupsService $groupsService)
    {
        parent::__construct();
    }

    public function get(Request $request)
    {
        $response = $this->groupsService->get($request->all());
        return $this->response(['status' => 'ok', 'data' => $response]);
    }

    public function show(Request $request, string $id)
    {
        $response = $this->groupsService->show($id);
        return $this->response(['status' => 'ok', 'data' => $response]);
    }

}
