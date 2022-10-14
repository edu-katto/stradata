<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\DictionarySearchRequest;

class DictionaryController extends Controller
{

    public function searchRegister(DictionarySearchRequest $request) : array{
        return $request->all();
    }
}
