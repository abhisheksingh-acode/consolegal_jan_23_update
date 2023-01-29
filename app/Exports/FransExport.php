<?php

namespace App\Exports;

use App\Models\Frans;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FransExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return array_keys(Frans::first()->toArray());
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Frans::all();
        return collect(Frans::all());
    }
}
