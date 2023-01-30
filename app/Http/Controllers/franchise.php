<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Order;
use App\Models\User;
use App\Models\assigned;
use App\Models\form_content;
use App\Models\form_name;
use App\Models\form_submit;
use App\Models\services;
use App\Models\Frans;
use App\Models\Wallet;
use App\Models\wallet_history;
use App\Models\service_done;




use App\Http\Traits\EmailTrait;
use App\Http\Traits\WalletTrait;
use App\Models\Lead;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;


class franchise extends Controller
{
   //
   function dashboard(Request $req)
   {
      try {

         $frans = $req->session()->get("frans");

         $frans_id = $frans->id;

         $pending = Order::where("fran_id", $frans_id)->where("form_submitted", '!=', 4)->orderBy("id", "desc")->simplePaginate(10);

         $complete = Order::where("fran_id", $frans_id)->where("form_submitted", 4)->orderBy("id", "desc")->simplePaginate(10);

         $wallet = Wallet::where("fran_id", $frans_id)->first();

         $history = wallet_history::where("fran_id", $frans_id)->orderBy("id", "desc")->simplePaginate(10);

         $pay_history = DB::table('payments')->where('fran_id', $frans_id)->orderBy("id", "desc")->simplePaginate(10);

         $total = wallet_history::where("fran_id", $frans_id)->where("entry", "credit")->sum("amount");

         $redeem = wallet_history::where("fran_id", $frans_id)->where("entry", "debit")->sum("amount");

         $documents = service_done::all();

         $assign = assigned::where("fran_id", $frans_id)->where("submitted", "0")->orderBy("created_at", "desc")->get();

         $service = services::all();

         $forms = form_name::orderBy("id","desc")->get();

         $form_content = form_content::where("id", $frans_id)->get();



         return view(
            "frans.profile",
            [
               'frans'        => $frans,
               'pending'      => $pending,
               'complete'     => $complete,
               'wallet'       => $wallet,
               'history'      => $history,
               'pay_history'  => $pay_history,
               'total'        => $total,
               'redeem'       => $redeem,
               'assigns'      => $assign,
               'form'         => $forms,
               'form_content' => $form_content,
               'services'     => $service,
               'documents'    => $documents
            ]
         );

         // return [
         //    // 'frans' => $frans, 'pending' => $pending,
         //    // 'complete' => $complete, 'wallet' => $frans_id,
         //    // 'history' => $history, 'total' => $total, 'redeem' => $redeem,
         //    // 'assigns' => $assign, 'form' => $forms, 'form_content' => $form_content,
         //    // 'services' => $service, 'documents' => $documents
         // ];

         // return [$assign, $forms];
      } catch (\Throwable $th) {
         throw $th;
      }
   }


   function orders(Request $req)
   {
      $frans = $req->session()->get("frans");
      $frans_id = $frans->id;

      $pending = Order::where("fran_id", $frans_id)->where("form_submitted", '!=', 4)->simplePaginate(10);

      $complete = Order::where("fran_id", $frans_id)->where("form_submitted", 4)->simplePaginate(10);
      $assign = assigned::where("fran_id", $frans_id)->where("submitted", "0")->get();
      $service = services::all();
      $forms = form_name::all();
      $form_content = form_content::where("id", $frans_id)->get();

      return view(
         "frans.orders",
         [
            'frans'         => $frans,
            'pending'      => $pending,
            'complete'     => $complete,
            'assigns'      => $assign,
            'form'         => $forms,
            'form_content' => $form_content,
            'services'     => $service,
         ]
      );
   }


   function wallet(Request $req)
   {
      $frans = $req->session()->get("frans");
      $frans_id = $frans->id;

      $wallet = Wallet::where("fran_id", $frans_id)->first();
      $history = wallet_history::where("fran_id", $frans_id)->orderBy("id", "desc")->simplePaginate(10);
      $total = wallet_history::where("fran_id", $frans_id)->where("entry", "credit")->sum("amount");
      $redeem = wallet_history::where("fran_id", $frans_id)->where("entry", "debit")->sum("amount");


      return view(
         "frans.wallet",
         [
            'frans'        => $frans,
            'wallet'       => $wallet,
            'history'      => $history,
            'total'        => $total,
            'redeem'       => $redeem
         ]
      );
   }


   function payment(Request $req)
   {
      $frans = $req->session()->get("frans");
      $frans_id = $frans->id;
      $pay_history = DB::table('payments')->where('fran_id', $frans_id)->orderBy("id", "desc")->simplePaginate(10);

      return view(
         "frans.payment",
         [
            'frans'        => $frans,
            'pay_history'  => $pay_history
         ]
      );
   }


   function leads(Request $req)
   {
      $frans = $req->session()->get("frans");
      $frans_id = $frans->id;
      $service = services::all();

      $leads = Lead::where(["fran_id" => $frans_id])->orderBy("id","DESC")->simplePaginate(40);

      return View("frans.leads", compact('leads', 'frans','service'));
   }

   function lead_create(Request $req)
   {
      $frans = $req->session()->get("frans");
      $frans_id = $frans->id;
      $services = services::all();

      $data = Lead::where(["fran_id" => $frans_id])->simplePaginate(40);

      return View("frans.lead", compact('data', 'frans','services'));
   }

   function kyc(Request $req)
   {
      $frans = $req->session()->get("frans");
      $frans_id = $frans->id;
   }

   function franchise_get(Request $req)
   {

      $key = $req->key ?? '';
      $data = Frans::where("id", "LIKE", '%' . $key . '%')
         ->orWhere("name", "LIKE", '%' . $key . '%')
         ->orWhere("email", "LIKE", '%' . $key . '%')
         ->orWhere("phone", "LIKE", '%' . $key . '%')
         ->orderBy("id","DESC")
         ->simplePaginate(10);


      return view("all_franchise", ['user' => $data]);
      // return $data;
   }

   function franchise_profile(Request $req)
   {

      $user = Frans::find($req->id);

      if (request()->ajax()) {
         return ["user" => $user];
      }

      return view("user_profile", ['data' => $user, 'type' => 'franchise']);
   }


   function login_page(Request $req)
   {
      if ($req->session()->has('frans')) {
         return redirect("/franchise/dashboard");
      }

      return view("frans.login");
   }

   // add new 
   function post(Request $req)
   {

      try {
         if ($req->name && $req->email && $req->phone && $req->company_name && $req->password) {

            // save if not exist 
            $franchise = new Frans;


            if ($franchise->email == $req->email) {
               return redirect()->back()->with("error", "Email already used, Try with diffrent email");
            } else {
               if ($franchise->phone == $req->phone) {
                  return redirect()->back()->with("error", "Number already used, Try with diffrent number");
               } else {
                  $franchise->name = $req->name;
                  $franchise->email = $req->email;
                  $franchise->phone = $req->phone;
                  $franchise->company_name = $req->company_name;
                  $franchise->password = Hash::make($req->password);
                  $franchise->status = "1";

                  $franchise->save();

                  // create wallet for user 

                  $wallets = new Wallet;

                  $wallets->fran_id = $franchise->id;
                  $wallets->amount = 0;
                  $wallets->status = 1;
                  $wallets->save();


                  if ($franchise) {
                     $user = $franchise;
                     $body = "Dear $user->name, Welcome to the Consolegal family. You may get a call from Consolegal Team within 24hrs.
                     ";
                     EmailTrait::confirm($user->email, $body, "Profile update", $user->name, $user->phone);
                  }
               }
            }


            // return inserted data 
            if ($franchise) {
               return redirect()->back()->with("success", "Franchise added successfuly!!");
            } else {
               return redirect()->back()->with("error", "Franchise failed to add!");
            }
         } else {
            return redirect()->back()->with("error", "Please submit with all required fields!");
         }
      } catch (\Throwable $th) {
         return $th;
      }
   }
   //------------------- add new ends here 



   // login franchise auth 

   function login(Request $req)
   {
      $req->validate([
         "email" => "required | email | exists:frans,email",
         "password" => "required"
      ]);

      $check = Frans::where("email", "$req->email")->first();
      if ($check) {
         $check_key = Hash::check($req->password, $check->password);

         if ($check_key) {

            $req->session()->put("frans", $check);
            $req->session()->forget('user');
            $req->session()->forget('admin');
            $req->session()->forget('agents');

            return redirect()->back();
         } else {
            return redirect()->back('error', 'incorrect login details');
         }
      }
   }


   function frans_update(Request $req)
   {
      try {

         if ($req->id) {
            $frans = Frans::find($req->id);
            // $req->session()->put("user", $users);
         } else {
            $frans = Frans::find($req->session()->get("frans")->id);
         }

         if ($frans) {
            if ($req->name) {
               $frans->name = $req->name;
            }
            if ($req->email) {
               $frans->email = $req->email;
            }
            if ($req->phone) {
               $frans->phone = $req->phone;
            }
            if ($req->company) {
               $frans->company_name = $req->company;
            }
            if ($req->gst) {
               $frans->gst = $req->gst;
            }
            if ($req->password) {
               $frans->password = Hash::make($req->password);
            }

            $frans->save();

            if ($frans) {
               $body = "Dear $frans->name, Your profile has been updated. By Consolegal";
               EmailTrait::confirm($frans->email, $body, "Profile update", $frans->name);
               $req->session()->put("frans", $frans);

               return back();
            }
         }
         return ["status" => "failed"];
      } catch (\Throwable $th) {
         throw $th;
      }
   }


   function franchise_delete($id)
   {

      try {
         if (isset($id)) {
            Frans::find($id)->delete();
         }
         return redirect(route('franchise.all'))->with("success", "Franchise Deleted Successfuly!!");
      } catch (\Throwable $th) {
         return back()->with("error", "Franchise Failed To Delete!");
      }
   }


   function submit_form(Request $req)
   {
      $data = array();


      foreach ($req->input() as $key => $value) {
         $forms = new form_submit;

         if ($req->assign_id) {
            $forms->assigned_id = $req->assign_id;
         }


         if ($req->order_id) {
            $forms->order_id = $req->order_id;
         }

         if ($req->session()->has('frans')) {
            $forms->fran_id = $req->session()->get('frans')->id;
         }
         if ($req->form_id) {
            $forms->form_content_id = $req->form_id;
         }
         $forms->content_type = "text";
         if ($key != 'assign_id' && $key != 'fran_id' &&  $key != 'order_id' && $key != 'form_id' && $key != 'assign_id') {

            if ($value != '') {
               $forms->content = $value;

               $forms->content_label = $key;

               $forms->save();

               array_push($data, $forms);
            }
         }
      }


      foreach ($req->file() as $key => $value) {
         $forms = new form_submit;

         if ($req->assign_id) {
            $forms->assigned_id = $req->assign_id;
         }
         if ($req->order_id) {
            $forms->order_id = $req->order_id;
         }
         if ($req->session()->has('frans')) {
            $forms->fran_id = $req->session()->get('frans')->id;
         }
         if ($req->form_id) {
            $forms->form_content_id = $req->form_id;
         }
         $forms->content_type = "file";
         if ($key != 'assign_id' && $key != 'fran_id' && $key != 'form_id' && $key != 'assign_id') {

            if ($value != '') {

               $filename = time() . '.' . $value->extension();


               $data = $value->move(public_path('storage'), $filename);

               $forms->content = $filename;
               $forms->content_label = $key;

               $forms->save();

               // array_push($data, $forms);
            }
         }
      }

      $assign = assigned::find($req->assign_id);

      $assign->submitted = "1";
      $assign->save();


      // update order to pending 
      $order = Order::find($req->order_id);

      $order->form_submitted = "1";

      $order->save();

      if ($order) {

         if ($order->user_id != null) {
            $user = User::find($order->user_id);
         } else {
            $user = Frans::find($order->fran_id);
         }
         $body = "Dear $user->name, Your order has been pending after successful form submission. By Consolegal";
         EmailTrait::confirm($user->email, $body, "Profile update", $user->name, $user->phone);
      }

      return redirect("/franchise/dashboard");
   }


   // signout session 

   function signout(Request $req)
   {
      if ($req->session()->has("frans")) {

         $req->session()->forget("frans");
         return redirect("/franchise");
      } else {
         return redirect("/franchise");
      }
   }
}
