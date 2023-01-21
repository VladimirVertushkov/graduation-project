<?php

namespace App\Entities\Matches\Http\Controllers;

use App\Entities\Matches\Services\MatchesService;
use App\Http\Controllers\Api\ControllerBase;
use Illuminate\Http\Request;

class MatchesController extends ControllerBase
{
    public function __construct(protected MatchesService $matchesService)
    {
        parent::__construct();
    }

    public function get(Request $request)
    {
        $response = $this->matchesService->get($request->all());
        return $this->response(['status' => 'ok', 'data' => $response]);
    }
}

