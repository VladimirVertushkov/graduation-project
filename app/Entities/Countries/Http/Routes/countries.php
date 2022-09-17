<?php

use App\Entities\Countries\Http\Controllers\CountriesController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/{id}', [CountriesController::class, 'show']);
    Route::get('/', [CountriesController::class, 'get']);
});
