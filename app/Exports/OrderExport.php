<?php

namespace App\Exports;

use App\Models\assigned;
use App\Models\form_name;
use App\Models\Frans;
use App\Models\Order;
use App\Models\services;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {

        $data = Order::orderBy("id", "desc")->get();
        return view("orderExport", ['data' => $data]);
    }
}
