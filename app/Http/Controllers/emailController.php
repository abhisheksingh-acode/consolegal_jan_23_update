<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\email;

use App\Http\Traits\EmailTrait;

class emailController extends Controller
{
    //

    function index(Request $req)
    {

        // if request for email 
        if ($req->email && $req->body) {
            $email  = $req->email;
            $body   = $req->body;
            $status[] =  EmailTrait::confirm($email, $body, "Order Update");
        } else {
            $status[] = ["email" => "no email request"];
        }

        // if request for sms 
        if ($req->phone && $req->body) {
            $email  = $req->email;
            $body   = $req->body;
            $status[] = ["phone" => "sms request found"];
        } else {
            $status[] = ["phone" => "no sms request"];
        }
        return $status;
    }
}
