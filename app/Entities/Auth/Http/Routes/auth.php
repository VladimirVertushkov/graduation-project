<?php

use App\Entities\Auth\Http\Controllers\LoginController;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', 'LoginController@logout');
});
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/forgot', 'ResetPasswordController@forgot');
