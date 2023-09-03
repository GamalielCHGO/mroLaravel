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
        Schema::create('tb_solicitud_aprobaciones', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('idSolicitud');
            $table->string('idUsuario');
            $table->string('idAprobador');
            $table->string('estado')->default('P');
            $table->timestamp('fechaAprobacion')->default(now());
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
        Schema::dropIfExists('tb_aprobaciones');
    }
};