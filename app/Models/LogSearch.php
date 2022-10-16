<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSearch extends Model
{
    use HasFactory;
    protected $table = 'log_search';
    protected $fillable = [
        'departamento',
        'localidad',
        'municipio',
        'nombre',
        'ano_activo',
        'tipo_persona',
        'tipo_cargo',
        'porcentaje',
        'uuid',
        'nombre_busqueda',
    ];

    public function saveLog($data){
        $this::create([
            'departamento' => $data->departamento,
            'localidad' => $data->localidad,
            'municipio' => $data->municipio,
            'nombre' => $data->nombre,
            'ano_activo' => $data->ano_activo,
            'tipo_persona' => $data->tipo_persona,
            'tipo_cargo' => $data->tipo_cargo,
            'porcentaje' => $data->porcentaje,
            'uuid' => $data->uuid,
            'nombre_busqueda' => $data->nombre_busqueda,
        ]);
    }
}
