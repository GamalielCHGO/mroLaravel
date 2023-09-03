<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = 'tb_solicitudes';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
       'tipo',
       'usuario',
       'fecha_creacion',
       'estado',
       'fecha_entrega',
       'usuario_entrega',
       'fecha_reporte',
       'departamento',
       'detalles',
   ];
}
