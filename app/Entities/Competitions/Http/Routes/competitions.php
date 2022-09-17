<?php

use App\Entities\Competitions\Http\Controllers\CompetitionsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/{id}', [CompetitionsController::class, 'show']);
    Route::get('/', [CompetitionsController::class, 'get']);
});
