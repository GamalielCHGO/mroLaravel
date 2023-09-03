<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionArt extends Model
{
    use HasFactory;
    protected $table = 'tb_asignacion_art';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
       'idArticulo',
       'estacion',
       'cc',
       'tipo'
   ];
}
