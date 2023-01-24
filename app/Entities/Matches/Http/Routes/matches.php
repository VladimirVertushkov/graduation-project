<?php

use App\Entities\Matches\Http\Controllers\MatchesController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/', [MatchesController::class, 'get']);
});
