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
        Schema::create('tb_elementos_solicitudes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_solicitud');
            $table->string('id_articulo');
            $table->integer('cantidad');
            $table->string('estado')->default('P');
            $table->string('cc');
            $table->string('estacion');
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
        Schema::dropIfExists('tb_elementos_solicitudes');
    }
};
