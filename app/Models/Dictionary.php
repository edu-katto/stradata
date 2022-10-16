<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Dictionary extends Model
{
    use HasFactory;
    protected $table = 'dictionary';

    public function searchRegisterSimilary($request): array{

        try {

            $logSearch = new LogSearch();
            $dataDb = Dictionary::all();
            $uuidPetition = Str::uuid();
            $similary = [];

            foreach ($dataDb as $data){

                $similaryPercentage = $request->similary;
                $stringUser = strtolower( $request->name );
                $stringDb = strtolower( $data->nombre );

                similar_text($stringUser, $stringDb, $percentage);

                if (round($percentage) >= $similaryPercentage){
                    $similary[] = Arr::add($data, 'porcentaje', round($percentage));
                    $similary[] = Arr::add($data, 'uuid', $uuidPetition);
                    $similary[] = Arr::add($data, 'nombre_busqueda', $request->name);

                    //insertamos en la base de datos el log
                    $logSearch->saveLog($data);
                }

            }
            return $similary;

        }catch (\Exception $e){

            $similary[] = Arr::add($similary, 'error', 'errorDeSistema');
            return $similary;
        }
    }
}
