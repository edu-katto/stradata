<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\DictionarySearchRequest;
use App\Http\Requests\Api\v1\SearchLogRequest;
use App\Models\Dictionary;
use App\Models\LogSearch;

class DictionaryController extends Controller
{

    public function searchRegister(DictionarySearchRequest $request, Dictionary $dictionary) : object{

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

        return response()->json([], 500);
    }

    public function searchLog(SearchLogRequest $request, LogSearch $logSearch) : object{

        $searchUuid = $logSearch->searchLog($request);

        if(count($searchUuid) == 0){
            return response()->json([
                'message' => 'Exito sin resultado',
                'uuid' => $request->uuid,
                'data' => $searchUuid
            ], 202);
        }

        if($searchUuid != []){
            return response()->json([
                'message' => 'Exito con resultado',
                'uuid' => $request->uuid,
                'data' => $searchUuid
            ], 202);
        }

        if($searchUuid['error'] != []){
            return response()->json([
                'message' => 'Error de sistema'
            ], 500);
        }

        return response()->json([], 500);
    }
}
