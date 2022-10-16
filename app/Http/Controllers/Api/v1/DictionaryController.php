<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\DictionarySearchRequest;
use App\Models\Dictionary;

class DictionaryController extends Controller
{

    public function searchRegister(DictionarySearchRequest $request, Dictionary $dictionary){

        $dataSimilary = $dictionary->searchRegisterSimilary($request);

        if($dataSimilary == []){
            return response()->json([
                'data' => $dataSimilary,
                'message' => 'Exito sin resultado'
            ], 202);
        }

        if($dataSimilary != []){
            return response()->json([
                'data' => $dataSimilary,
                'message' => 'Exito con resultado',
                'uuid' => $dataSimilary[0]['uuid']
            ], 202);
        }

        if($dataSimilary['error'] != []){
            return response()->json([
                'message' => 'Error de sistema'
            ], 500);
        }
    }
}
