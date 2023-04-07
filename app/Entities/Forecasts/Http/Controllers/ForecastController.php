<?php

namespace App\Entities\Forecasts\Http\Controllers;

use App\Entities\Forecasts\Services\ForecastsService;
use App\Http\Controllers\Api\ControllerBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForecastController extends ControllerBase
{
    public function __construct(protected ForecastsService $forecastsService)
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
            return $this->forecastsService->save($request->all(), $id);
        }, 2);

        return $this->response([
            'status' => 'ok',
            'id' => $response,
        ]);
    }

    public function get(Request $request)
    {
        $response = $this->forecastsService->get($request->all());
        return $this->response(['status' => 'ok', 'data' => $response]);
    }

    public function show(string $id)
    {
        $response = $this->forecastsService->show($id);
        return $this->response(['status' => 'ok', 'data' => $response]);
    }

    public function create(Request $request)
    {
        $response = $this->forecastsService->create($request->all());
        return $this->response(['status' => 'ok', 'id' => $response]);
    }
}
