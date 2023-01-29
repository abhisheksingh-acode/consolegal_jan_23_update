<?php

namespace App\Imports;

use App\Models\lead;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withHeadingRow;

class LeadImport implements ToModel,withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lead([
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'service_id' => $row['service_id'],
            'from' => $row['from'],
            'status' => $row['status']
        ]);
    }
}
