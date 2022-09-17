<?php

namespace App\Entities\Competitions\Http\Controllers;

use App\Entities\Competitions\Services\CompetitionsService;
use App\Http\Controllers\Api\ControllerBase;
use Illuminate\Http\Request;

class CompetitionsController  extends ControllerBase
{
    public function __construct(protected CompetitionsService $competitionsService)
    {
        parent::__construct();
    }

    public function get(Request $request)
    {
        $response = $this->competitionsService->get($request->all());
        return $this->response(['status' => 'ok', 'data' => $response]);
    }

    public function show(Request $request, string $id)
    {
        $response = $this->competitionsService->show($id);
        return $this->response(['status' => 'ok', 'data' => $response]);
    }
}
