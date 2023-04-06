<?php

use App\Entities\Groups\Http\Controllers\GroupsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/{id}', [GroupsController::class, 'show']);
    Route::get('/', [GroupsController::class, 'get']);
    Route::post('/{id}', [GroupsController::class, 'save']);
    Route::delete('/{id}', [GroupsController::class, 'delete']);
    Route::post('/', [GroupsController::class, 'create']);
});
