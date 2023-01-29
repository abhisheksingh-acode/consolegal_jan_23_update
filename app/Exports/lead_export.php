<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class lead_export implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lead::all();
    }

    public function headings(): array
    {
        return ["id", "name", "email","phone number","message","service_id","from","fran_id","status","created_at","updated_at"];
    }
}
