<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\DictionaryController;

Route::post('v1/searchRegister', [DictionaryController::class, 'searchRegister']);
