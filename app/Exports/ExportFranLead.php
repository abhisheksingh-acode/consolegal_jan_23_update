<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportFranLead implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $frans = request()->session()->get("frans");
        $frans_id = $frans->id;
        return Lead::where(["fran_id" => $frans_id])->get();
    }

    public function headings(): array
    {
        return ["id", "name", "email", "phone number", "message", "service_id", "from", "fran_id", "status", "created_at", "updated_at"];
    }
}
