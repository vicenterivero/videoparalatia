<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->integerIncrements('id_solicitud');
            $table->string('llave',100);
            $table->smallInteger('id_tramite');
            $table->string('no_solicitud',20);
            $table->date('fecha_solicitud');
            $table->time('hora_solicitud');
            $table->string('no_solicitud_api',10);
            $table->date('fecha_solicitud_api');
            $table->time('hora_solicitud_api');
            $table->tinyInteger('id_estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
