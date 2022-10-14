<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\DictionaryController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth:api']], function () {
    Route::post('v1/searchRegister', [DictionaryController::class, 'searchRegister']);
});

Route::controller(AuthController::class)->group(function () {
    Route::post('v1/login', 'login');
    Route::post('v1/register', 'register');
    Route::post('v1/logout', 'logout');
    Route::post('v1/refresh', 'refresh');
});
