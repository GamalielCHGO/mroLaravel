<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementosSolicitud extends Model
{
    use HasFactory;

    protected $table = 'tb_elementos_solicitudes';

   protected $fillable = [
       'id',
       'id_solicitud',
       'id_articulo',
       'cantidad',
       'estado',
       'cc',
       'estacion',
   ];
}
