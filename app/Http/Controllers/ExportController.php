<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\lead_export;
use App\Exports\UserExport;
use App\Exports\FransExport;
use App\Exports\AgentsExport;
use App\Exports\OrderExport;
use App\Exports\PaymentExport;
use App\Exports\ExportAgentLead;
use App\Exports\ExportFranLead;
use App\Models\agents_model;

class ExportController extends Controller
{

    function lead()
    {
        $date = date("Y-m-d");
        return Excel::download(new lead_export, "lead_$date.xlsx");
    }
    function fran_lead()
    {
        $date = date("Y-m-d");
        return Excel::download(new ExportFranLead, "lead_$date.xlsx");
    }
    
    function agent_lead()
    {
        $date = date("Y-m-d");
        return Excel::download(new ExportAgentLead, "lead_$date.xlsx");
    }


    function user()
    {
        $date = date("Y-m-d");
        return Excel::download(new UserExport, "users_$date.xlsx");
    }
    function frans()
    {
        $date = date("Y-m-d");
        return Excel::download(new FransExport, "franchise_$date.xlsx");
    }
    function agent()
    {
        $date = date("Y-m-d");
        return Excel::download(new AgentsExport, "agents_$date.xlsx");
    }

    function order()
    {
        $date = date("Y-m-d");
        return Excel::download(new OrderExport, "orders_$date.xlsx");
    }

    public function payment()
    {
        $date = date("Y-m-d");
        return Excel::download(new PaymentExport, "payments_$date.xlsx");
    }
}
