<?php

use App\Entities\Users\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

//Route::middleware(['auth:api'])->group(function () {
//    Route::prefix('/executors')->group(function () {
//        Route::get('/forDropdown', [UsersController::class, 'getExecutors']);
//        Route::get('/forFilter', [UsersController::class, 'executorsForFilter']);
//    });
//
//    Route::get('/forFilter', [UsersController::class, 'forFilter']);
//    Route::get('/engineers/count', [UsersController::class, 'engineersCount']);
//    Route::get('responsible/forFilter', [UsersController::class, 'getResponsibleUserForFilter']);
//    Route::get('/forAdmin', [UsersController::class, 'forAdmin']);
//    Route::get('/forReassign', [UsersController::class, 'forReassign']);
//    Route::get('/forRegularTasks', [UsersController::class, 'forRegularTasks']);
//    Route::get('/', [UsersController::class, 'get']);
//    Route::get('/{id}', [UsersController::class, 'show']);
//    Route::delete('/', [UsersController::class, 'delete']);
//    Route::post('/role', [UsersController::class, 'changeRole']);
//    Route::post('/subdivision', [UsersController::class, 'changeSubdivision']);
//    //Route::post('/{id?}', [UsersController::class, 'save']);
//});

Route::post('/save', [UsersController::class, 'save']);

