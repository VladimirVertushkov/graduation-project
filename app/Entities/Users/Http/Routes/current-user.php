<?php

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/', 'CurrentUserController@get');
});
