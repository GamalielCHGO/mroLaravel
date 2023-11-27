<?php

namespace App\Exports;

use App\Models\Solicitud;
use Maatwebsite\Excel\Concerns\FromCollection;

class SolicitudExport implements FromCollection
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
        return Solicitud::whereIn('id',$this->ids)->get();
    }
}
