<?php

namespace App\Exports;

use App\Models\producto;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return producto::all();
    }
}
