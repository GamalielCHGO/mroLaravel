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
        Schema::create('tb_articulos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_parte');
            $table->string('numero_parte_old');
            $table->string('tipo');
            $table->string('descripcion');
            $table->string('ruta');
            $table->string('rutaResize');
            $table->string('ubicacion');
            $table->string('categoria');
            $table->string('estado')->default('E');
            $table->string('autorizacion')->default('N');
            $table->float('precio',8,2);
            $table->integer('inventario');
            $table->string('critico')->default('N');
            $table->string('obsoleto')->default('N');
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
        Schema::dropIfExists('tb_articulos');
    }
};
