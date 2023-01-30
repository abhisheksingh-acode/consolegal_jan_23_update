<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;

use App\Models\agents_model;
use App\Models\Lead;
use App\Models\services;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Traits\EmailTrait;

class agents extends Controller
{
   function login(Request $req)
   {
      if ($req->session()->has('user')) {
         return redirect("/users/dashboard");
      }
      // session(['url.intended' => url()->previous()]);

      return view("agents.agentslogin");
   }



   function login_post(Request $req)
   {

      $validate = $req->validate([
         'password' => 'required | min:6',
         'email' => 'required | email | exists:agents,email'
      ]);

      $users = agents_model::where('email', "$req->email")->first();

      if ($req->password == $users->password) {

         $req->session()->put('agents', $users);
         $req->session()->forget('user');
         $req->session()->forget('frans');
         $req->session()->forget('admin');

         return redirect()->route('agent.dashboard');
      } else {
         return redirect()->back()->with('error', 'incorrect password');
      }
   }

   function leads_all(Request $req)
   {
      $id = $req->session()->get("agents")->id;
      $data = Lead::where("from", "agents")->orderBy("id","DESC")->where("agent_id", $id)->simplePaginate(5);
      $service = services::all();


      return view("agents.all_leads", ["leads" => $data, "service" => $service]);
   }

   function leads_get()
   {
      $lead = Lead::simplePaginate(10);

      $services = services::all();


      return view("agents.add_leads", ['leads' => $lead, 'services' => $services]);
   }

   function agent_all(Request $req)
   {

      $key = $req->key ?? '';
      $users = agents_model::where("id", "LIKE", '%' . $key . '%')
         ->orWhere("name", "LIKE", '%' . $key . '%')
         ->orWhere("email", "LIKE", '%' . $key . '%')
         ->orWhere("phone", "LIKE", '%' . $key . '%')
         ->simplePaginate(10);

      return view("all_agents", ["data" => $users]);
   }

   function agent_get()
   {
      return view("add_agents");
   }


   function agent_add(Request $req)
   {
      $agent = new agents_model;

      $agent->name = $req->name;

      if ($agent->phone == $req->phone || $agent->phone == $req->phone) {
         return redirect()->back()->withError("Email && Phone already exist, Try diffrent! ");
      }
      $agent->email = $req->email;
      $agent->phone = $req->phone;
      $agent->company = $req->company;
      $agent->password = $req->password;

      $agent->save();

      if (!$agent) {
         return redirect()->back()->withError("Failed to add Agent!");
      }

      if ($agent) {
         $user = $agent;
         $body = "Dear $user->name, Welcome to the Consolegal family. You may get a call from Consolegal Team within 24hrs.
         ";
         EmailTrait::confirm($user->email, $body, "Profile update", $user->name, $user->phone);
      }
      return redirect()->back()->withSuccess("New Agent added successfuly!");
   }



   function update(Request $req)
   {
      try {

         if ($req->id) {
            $agents = agents_model::find($req->id);
            // $req->session()->put("user", $users);
         } else {
            $agents = agents_model::find($req->session()->get("agents")->id);
         }

         if ($agents) {
            if ($req->name) {
               $agents->name = $req->name;
            }
            if ($req->email) {
               $agents->email = $req->email;
            }
            if ($req->phone) {
               $agents->phone = $req->phone;
            }
            if ($req->company) {
               $agents->company_name = $req->company;
            }
            if ($req->gst) {
               $agents->gst = $req->gst;
            }
            if ($req->password) {
               $agents->password = Hash::make($req->password);
            }

            $agents->save();

            if ($agents) {
               $body = "Dear $agents->name, Your profile has been updated. By Consolegal";
               EmailTrait::confirm($agents->email, $body, "Profile update", $agents->name);
               return ["status" => "success"];
            }
            // $req->session()->put("frans", $frans);
            return back();
         }
         // return ["status" => "failed"];
      } catch (\Throwable $th) {
         throw $th;
      }
   }
}
