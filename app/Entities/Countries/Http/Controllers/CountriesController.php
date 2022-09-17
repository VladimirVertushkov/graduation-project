<?php

namespace App\Entities\Countries\Http\Controllers;

use App\Entities\Countries\Services\CountriesService;
use App\Http\Controllers\Api\ControllerBase;
use Illuminate\Http\Request;

class CountriesController extends ControllerBase
{

    public function __construct(protected CountriesService $countriesService)
    {
        parent::__construct();
    }

    public function get(Request $request)
    {
        $response = $this->countriesService->get($request->all());
        return $this->response(['status' => 'ok', 'data' => $response]);
    }

    public function show(Request $request, string $id)
    {
        $response = $this->countriesService->show($id);
        return $this->response(['status' => 'ok', 'data' => $response]);
    }
}
