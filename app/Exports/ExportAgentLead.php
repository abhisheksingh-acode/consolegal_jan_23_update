<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAgentLead implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $agents = request()->session()->get("agents");
        $agents_id = $agents->id;
        return Lead::where(["agent_id" => $agents_id])->get();
    }

    public function headings(): array
    {
        return ["id", "name", "email", "phone number", "message", "service_id", "from", "fran_id", "status", "created_at", "updated_at"];
    }
}
