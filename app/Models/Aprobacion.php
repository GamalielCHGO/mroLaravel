<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprobacion extends Model
{
    use HasFactory;
    protected $table = 'tb_solicitud_aprobaciones';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tipo',
        'idSolicitud',
        'idUsuario',
        'iDAprobador',
        'estado',
        'fecha_aprobacion',
    ];
}
