<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use App\Http\Traits\EmailTrait;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\assigned;
use App\Models\form_content;
use App\Models\form_name;
use App\Models\form_submit;
use App\Models\services;
use App\Models\Wallet;
use App\Models\wallet_history;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
// use DB;

use App\Http\Traits\WalletTrait;
use App\Models\payment;
use App\Models\Refer;
use App\Models\service_done;
use PDO;

class users extends Controller
{


   // function index(){
   //     return "jdslksdfj";
   // }


   function users_get(Request $req)
   {
      $key = $req->key ?? '';
      $data = User::where("id", "LIKE", '%' . $key . '%')
         ->orWhere("name", "LIKE", '%' . $key . '%')
         ->orWhere("email", "LIKE", '%' . $key . '%')
         ->orWhere("phone", "LIKE", '%' . $key . '%')
         ->orderBy("id","DESC")
         ->simplePaginate(10);

      return view("all_user", ['user' => $data]);
      // return $data;
   }

   function users_profile(Request $req)
   {
      $user = User::find($req->id);

      return view("user_profile", ['data' => $user, 'type' => 'user']);
   }


   // -----------------------login function--------------------x
   function login(Request $req)
   {
      if ($req->session()->has('user')) {
         return redirect("/users/dashboard");
      }
      // session(['url.intended' => url()->previous()]);

      return view("user.userlogin");
   }

   function login_post(Request $req)
   {
      try {
         $users = User::where('email', "$req->email")->first();

         // ----------------------user emaill check if exist
         if ($users) {

            //-----------------pswd check of correct or not
            if (Hash::check($req->password, $users->password)) {

               // -----------session creation------------
               $req->session()->put('user', $users);
               $req->session()->forget('frans');
               $req->session()->forget('agents');
               $req->session()->forget('admin');

               // return redirect("/users/dashboard");
               return ["status" => "success"];
            } else {
               if (session()->has('url.intended')) {
                  $redirectTo = session()->get('url.intended');
                  session()->forget('url.intended');
               }

               $req->session()->regenerate();

               // if ($redirectTo) {
               //     return redirect($redirectTo);
               // }
               return ["status" => "password_err"];
            }
         } else {
            return ["status" => "email_err"];
         }
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   // --------------------------------login end---------------------------


   // --------------------------------signup---------------------------

   function signup_get(Request $req, $refer = null)
   {
      if ($refer != null) {
         return view("user.sign-up", ['refer_id' => $refer]);
      }
      return view("user.sign-up");
   }


   function signup_post(Request $req)
   {

      $validate = $req->validate([
         'name' => 'required',
         'password' => 'required | min:6',
         'phone' => 'required | min:10 | unique:users,phone',
         'email' => 'required | email | unique:users,email'
      ]);

      $users = new user;

      $users->name = $req->name;
      $users->email = $req->email;
      $users->phone = $req->phone;
      $users->company = $req->company ? $req->company : '';
      $users->gst = $req->gst ? $req->gst : '';

      if ($req->ref_id) {
         $users->ref_id = $req->ref_id;

         // credit reffer bonus to reffered by 
      }
      $users->password = Hash::make($req->password);

      $users->save();

      if ($req->ref_id && $users) {
         $refer_amount = Refer::first()->amount;

         //split user id from refer code recieved
         $refer_code = str_replace('UM-CL-00', '', $req->ref_id);

         // credit reffer bonus to reffered by 
         $update_wallet = WalletTrait::referCredit($refer_amount, "flat", "credit", $refer_code);
      }


      // create wallet for user 

      $wallets = new Wallet;

      $wallets->user_id = $users->id;
      $wallets->amount = 0;
      $wallets->status = 1;
      $wallets->save();

      // return user data 

      // confirmation email 
      if ($users) {
         $user = $users;
         $body = "Dear $user->name, Welcome to the Consolegal family. You may get a call from Consolegal Team within 24hrs.
            ";
         EmailTrait::confirm($user->email, $body, "Account signed up", $user->name, $user->phone);
      }

      return redirect()->route('user.login')->with('success', 'Account created successfuly.');
   }


   function create(Request $req)
   {
      if ($req->name && $req->email && $req->phone && $req->password) {

         $users = new user;

         $users->name = $req->name;
         $users->email = $req->email;
         $users->phone = $req->phone;
         $users->company = $req->company ? $req->company : '';
         $users->gst = $req->gst ? $req->gst : '';

         if ($req->ref_id) {
            $users->ref_id = $req->ref_id;

            // credit reffer bonus to reffered by 
         }
         $users->password = Hash::make($req->password);

         $users->save();

         if ($req->ref_id && $users) {
            $refer_amount = Refer::first()->amount;
            // credit reffer bonus to reffered by 
            $update_wallet = WalletTrait::walletUpdate($refer_amount, "flat", "credit", $req->ref_id);
         }


         // create wallet for user 

         $wallets = new Wallet;

         $wallets->user_id = $users->id;
         $wallets->amount = 0;
         $wallets->status = 1;
         $wallets->save();

         // return user data 

         // confirmation email 
         if ($users) {
            $user = $users;
            $body = "Dear $user->name, Welcome to the Consolegal family. You may get a call from Consolegal Team within 24hrs.
            ";
            EmailTrait::confirm($user->email, $body, "Account signed up", $user->name, $user->phone);
         }

         return redirect()->back()->with('success', 'User added successfuly!!');
      } else {
         return redirect('/not_found');
      }
   }
   // --------------------------------signup end---------------------------



   // --------------------------------sign out---------------------------


   function signout(Request $req)
   {
      if ($req->session()->has('user')) {
         $req->session()->forget('user');
      }
      // session(['url.intended' => url()->previous()]);


      return redirect(url()->previous());
   }

   // --------------------------------sign out end---------------------------


   // --------------------------------update profile---------------------------


   function user_update(Request $req)
   {
      try {

         if ($req->id) {
            $users = User::find($req->id);
            // $req->session()->put("user", $users);
         } else {
            $users = User::find($req->session()->get("user")->id);
         }

         if ($users) {
            if ($req->name) {
               $users->name = $req->name;
            }
            if ($req->email) {
               $users->email = $req->email;
            }
            if ($req->phone) {
               $users->phone = $req->phone;
            }
            if ($req->company) {
               $users->company = $req->company;
            }
            if ($req->gst) {
               $users->gst = $req->gst;
            }
            if ($req->password) {
               $users->password = Hash::make($req->password);
            }

            $users->save();

            $req->session()->put('user', $users);

            // $req->session()->put("user", $users);

            // confirmation after account update 
            if ($users) {
               $body = "Dear $users->name, Your profile has been updated. By Consolegal";
               EmailTrait::confirm($users->email, $body, "Profile update", $users->name);
            }


            return redirect()->back()->with("success", "User Updated Successfuly!!");
         }
      } catch (\Throwable $th) {
         return back()->with("error", "User Failed To Update!!");
      }
   }


   // --------------------------------update user profile---------------------------

   // --------------------------------delete user 

   function user_delete(Request $req)
   {

      try {
         if ($req->id) {
            $users = User::find($req->id)->delete();
         }
         return redirect(route('user.all'))->with("success", "User Deleted Successfuly!!");
      } catch (\Throwable $th) {
         return back()->with("error", "User Failed To Delete!");
      }
   }




   //--------------------------------dashboard----------------------------
   function dashboard(Request $req)
   {
      try {

         $user = $req->session()->get("user");
         $user_id = $req->session()->get("user")->id;
         return view("user.profile", ['user' => $user]);
      } catch (\Throwable $th) {
         throw $th;
      }
   }
   
   function payment(Request $req)
   {
      try {

         $user = $req->session()->get("user");

         $user_id = $req->session()->get("user")->id;

         $pay_history = payment::where('user_id', $user_id)->orderBy("id", "desc")->simplePaginate(10);


         return view(
            "user.transaction",
            [
               'user'         => $user,
               'pay_history'  => $pay_history,
            ]
         );
      } catch (\Throwable $th) {
         throw $th;
      }
   }


   function wallet(Request $req)
   {
      $user = $req->session()->get("user");

      $user_id = $req->session()->get("user")->id;


      $wallet = Wallet::where("user_id", $user_id)->first();

      $history = wallet_history::where("user_id", $user_id)->orderBy("id", "desc")->simplePaginate(10);

      $total = wallet_history::where("user_id", $user_id)->where("entry", "credit")->sum("amount");

      $redeem = wallet_history::where("user_id", $user_id)->where("entry", "debit")->sum("amount");

      return view(
         "user.wallet",
         [
            'user'         => $user,
            'wallet'       => $wallet,
            'history'      => $history,
            'total'        => $total,
            'redeem'       => $redeem,
         ]
      );
   }


   function orders(Request $req)
   {

      $user = $req->session()->get("user");

      $user_id = $req->session()->get("user")->id;

      $pending = Order::where("user_id", $user_id)->where("form_submitted", '!=', 4)->orderBy("id", "desc")->simplePaginate(10);

      $complete = Order::where("user_id", $user_id)->where("form_submitted", 4)->orderBy("id", "desc")->simplePaginate(10);

      $assign = assigned::where("user_id", $user_id)
         ->where("submitted", "0")
         ->orderBy("created_at", "desc")
         ->get();

      $service = services::all();

      $forms = form_name::orderBy("id","desc")->get();

      $form_content = form_content::where("id", $user_id)->get();

      return view(
         "user.orders",
         [
            'user'         => $user,
            'pending'      => $pending,
            'complete'     => $complete,
            'assigns'      => $assign,
            'form'         => $forms,
            'form_content' => $form_content,
            'services'     => $service,
         ]
      );
   }
   function refer_earn(Request $req)
   {
      $user = $req->session()->get("user");
      return view("user.refer", compact('user'));
   }

   function forms_content(Request $req)
   {

      $data = form_content::where("form_name_id", $req->id)->get();

      $form_id = form_name::where("id", $req->id)->first();

      $assign_id = assigned::where(["form_name_id" => $form_id->id, "order_id" => $req->order_id])->where("submitted", "0")->first();


      return ['data' => $data, 'id' => $req->id, 'assign_id' => $assign_id->id];
   }


   function services()
   {
      try {
         $data =  DB::select("select * from services
        where status='1'");
         return $data;
      } catch (\Throwable $th) {
         throw $th;
      }
   }



   // submit form assigned to for service
   function submit_form(Request $req)
   {
      $data = array();

      // return $req->all();

      foreach ($req->input() as $key => $value) {
         $forms = new form_submit;

         if ($req->assign_id) {
            $forms->assigned_id = $req->assign_id;
         }
         if ($req->order_id) {
            $forms->order_id = $req->order_id;
         }
         if ($req->session()->has('user')) {
            $forms->user_id = $req->session()->get('user')->id;
         }
         if ($req->form_id) {
            $forms->form_content_id = $req->form_id;
         }
         $forms->content_type = "text";
         if ($key != 'assign_id' && $key != 'user_id' &&  $key != 'order_id' && $key != 'form_id' && $key != 'assign_id') {

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
         if ($req->session()->has('user')) {
            $forms->user_id = $req->session()->get('user')->id;
         }
         if ($req->form_id) {
            $forms->form_content_id = $req->form_id;
         }
         $forms->content_type = "file";
         if ($key != 'assign_id' && $key != 'user_id' && $key != 'form_id' && $key != 'assign_id') {

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
            $user = User::find($order->fran_id);
         }
         $body = "Dear $user->name, Your order has been pending after successful form submission. By Consolegal";
         EmailTrait::confirm($user->email, $body, "Profile update", $user->name, $user->phone);
      }


      return redirect()->back();
   }
}
