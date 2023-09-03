<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $table = 'tb_articulos';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tipo',
        'nombre',
        'descripcion',
        'ruta',
        'rutaResize',
        'numero_parte',
        'numero_parte_old',
        'ubicacion',
        'precio',
        'inventario',
        'critico'
    ];
}
