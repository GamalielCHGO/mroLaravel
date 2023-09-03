<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('tb_solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('usuario');
            $table->timestamp('fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('estado')->default('O');
            $table->timestamp('fecha_entrega')->nullable();
            $table->string('usuario_entrega')->nullable();
            $table->timestamp('fecha_reporte')->nullable();
            $table->string('detalles')->nullable();
            $table->string('departamento')->nullable();
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
        Schema::dropIfExists('tb_solicitudes');
    }
};
