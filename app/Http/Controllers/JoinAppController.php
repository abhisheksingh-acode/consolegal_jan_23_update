<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinApp;

class JoinAppController extends Controller
{
    public function post(Request $req)
    {

        if (JoinApp::where("phone", $req->phone)->first()) {
            return response()->json(["msg" => "You're already joined waiting list."]);
        }

        $data = JoinApp::create(["phone" => $req->phone]);

        if (!$data) {
            return response()->json(["msg" => "Failed to enroll with this number."]);
        }

        return response()->json(["msg" => "Thank you for showing interest."]);
    }


    public function index()
    {

        $data = JoinApp::simplePaginate(20);

        return ["data" => $data];
    }
}
