<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_search', function (Blueprint $table) {
            $table->id();
            $table->string('departamento');
            $table->string('localidad');
            $table->string('municipio');
            $table->string('nombre');
            $table->integer('ano_activo');
            $table->string('tipo_persona');
            $table->string('tipo_cargo');
            $table->string('porcentaje');
            $table->string('uuid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_search');
    }
};
