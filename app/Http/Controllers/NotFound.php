<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotFound extends Controller
{
    //
    function index()
    {
        return ['error' => 404];
    }
}
