<?php

namespace App\Exports;

use App\Models\agents_model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AgentsExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return array_keys(agents_model::first()->toArray());
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return agents_model::all();
        return collect(agents_model::all());
    }
}
