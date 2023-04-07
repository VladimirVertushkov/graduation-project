<?php

use App\Entities\Forecasts\Http\Controllers\ForecastController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/{id}', [ForecastController::class, 'show']);
    Route::get('/', [ForecastController::class, 'get']);
    Route::post('/{id}', [ForecastController::class, 'save']);
    Route::post('/', [ForecastController::class, 'create']);
});
