<?php

namespace App\Exports;

use App\Models\payment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PaymentExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = payment::all();
        return view('export.payment',compact('data'));
    }
}
