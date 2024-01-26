<?php

namespace App\Exports;

use App\Models\Solicitud;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SolicitudExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $ids=[];

    public function __construct($ids)
    {

        $this->ids=$ids;
    }

    public function collection()
    {
        return DB::table('solicitudesreporte')->whereIn('id',$this->ids)->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'numero_parte',
            'descripcion',
            'categoria',
            'critico',
            'obsoleto',
            'comentarios',
            'cc',
            'estacion',
            'usuariosolicitante',
            'tipo',
            'fecha_creacion',
            'fecha_entrega',
            'departamento',
            'detalles',
            'fecha_reporte',
            'usuario_entrega'
        ];
    }
    

}
