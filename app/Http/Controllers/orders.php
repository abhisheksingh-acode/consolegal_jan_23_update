<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\services;
use App\Models\services_sub_head;
use App\Models\Wallet;
use App\Models\Working_status;
use App\Models\assigned;
use App\Models\form_name;
use App\Models\User;

use App\Http\Traits\WalletTrait;
use App\Http\Traits\EmailTrait;
use App\Models\Coupon;
use App\Models\Frans;
use App\Models\Lead;
use App\Models\Order;
use App\Models\wallet_history;


class orders extends Controller
{
   // use trait method 
   use WalletTrait;



   // all orders for admin


   function valid(Request $req){

      $find = Order::find($req->order_id);

      if($find){
         return "true";
      }else{
         return "false";
      }
   }

   function orders_get(Request $req)
   {
      $data = Order::orderBy("id", "desc")->simplePaginate();
      $forms = form_name::all();
      $services = services::all();
      $assign = assigned::all();
      $user = User::all();
      $fran = Frans::all();
      

      // return ['data' => $data, 'forms' => $forms, 'services' => $services, 'users' => $users, 'assign' => $assign];

      return view("all_orders_page", ['data' => $data, 'forms' => $forms, 'services' => $services, 'users' => $user, 'frans' => $fran, 'assigned' => $assign]);
   }


   function orders_add()
   {
      $data = services::all();

      return view("add_order_page", ['data' => $data]);
   }
   function lead_add_order($id)
   {
      $services = services::all();
      $user = Lead::find($id);

      return view("convert_lead", compact('services', 'user'));
   }


   function order_post_admin(Request $req)
   {
      // if user exist 

      $req->validate([
            "payment_mode" => 'required'
      ]);

      $exist_user = User::where("phone", "$req->phone")->orWhere("email", "$req->email")->first();

      if ($exist_user) {

         $orders = new Order;
         $orders->user_id = $exist_user->id;
         $orders->fran_id = "null";
         $orders->working_status = 1;
         $orders->form_submitted = 0;
         $orders->service_id = $req->service_id;
         $orders->status = $req->status || 0;
         $orders->payment_mode = $req->payment_mode;
         $orders->payment_id = $req->payment_id??'null';
         $orders->save();


         if ($orders) {
            $user = $exist_user;
            $body = "Dear $user->name, Your Order id $orders->id has been confirmed. By Consolegal";
            EmailTrait::confirm($user->email, $body, "Profile update", $user->name, $user->phone);
         }

         return back()->with("success", "Order placed successfuly");
      } else {

         if (!$req->password) {
            return redirect()->back()->with("password", "Please create password");
         }
         $user = new User;

         $user->name = $req->name;
         $user->email = $req->email;
         $user->phone = $req->phone;
         $user->company = $req->company?$req->company:'';
         $user->gst = $req->gst?$req->gst:'';
         $user->password = Hash::make($req->password);

         $user->save();

         if ($req->ref_id) {
            $user->ref_id = $req->ref_id;
         }

         // create wallet for user 
         $wallets = new wallet;

         $wallets->user_id = $user->id;
         $wallets->amount = 0;
         $wallets->status = 1;
         $wallets->save();


         // add order 
         $orders = new Order;
         $orders->user_id = $user->id;
         $orders->fran_id = "null";
         $orders->working_status = 1;
         $orders->form_submitted = 0;
         $orders->service_id = $req->service_id;
         $orders->payment_mode = $req->payment_mode;
         $orders->payment_id = $req->payment_id;
         $orders->status = $req->status;
         $orders->save();

         if ($orders) {
            $body = "Dear $user->name, Your Order id $orders->id has been confirmed. By Consolegal";
            EmailTrait::confirm($user->email, $body, "Profile update", $user->name, $user->phone);
         }
      }

      return back()->with("success", "Order placed successfuly");
   }

   // send price and service info before payment 
   function order_post(Request $req)
   {
      if ($req->session()->has("user")) {
         $active = "user";
      } elseif ($req->session()->has("frans")) {
         $active = "frans";
      } else {
         redirect("/users/login");
      }

      // return  $active . "print";

      $service_name = services::where("id", "$req->service_id")->first();

      if ($req->session()->has("user")) {
         $cur_user = User::where("id", $req->session()->get($active)->id)->first();

         $price = $service_name->price;
         $points = $service_name->points;
         $wallets = Wallet::where("user_id", $cur_user->id)->get();
      } elseif ($req->session()->has("frans")) {

         $cur_user = Frans::where("id", $req->session()->get($active)->id)->first();
         $price = $service_name->f_price;
         $points = $service_name->f_points;
         $wallets = Wallet::where("fran_id", $cur_user->id)->get();
      }

      $coupon_services = Coupon::all();
      foreach ($coupon_services as $foo) {
         $array_ex = explode(",", $foo->service_id);

         if (in_array($req->service_id, $array_ex)) {

            $coupons = Coupon::where("service_id", $foo->service_id)->get();
         }
      }




      // $sub_services = services_sub_head::where("service_id", "$req->id")->get();


      // return $wallet_active;

      return view(
         "user.order",
         [
            "service" => $service_name,
            'user'    => $cur_user,
            'price'   => $price,
            'points'   => $points,
            'wallet'  => $wallets[0],
            'coupons' => $coupons??array()
         ]
      );
   }


   // function order_subtotal(Request $req){

   //    $original_service_price = $req->service_price;

   //    // apply wallet 
   //    $wallet = $req->wallet_id;


   //    // apply coupon
   //    $coupon = $req->coupon;

   //    return "price";
   // }


   // final payment 
   function order_pay(Request $req)
   {

      $user_id = $req->session()->get('user')->id;  //active user id


      //   make payment for service 
      $user_wallet = wallet::where("id", "$user_id")->first();

      if ($req->wallet > $user_wallet->amount) {
         return "failed because wallet is low";
      } else {
         $final_amount = $req->total - $req->wallet;

         if ($final_amount < 0) {
            $final_amount = 0;
         }
      }

      // update wallet and history 
      $update_wallet = $this->walletUpdate($req->wallet, "flat", "debit", $user_id);

      // update order table 
      $orders = new Order;

      $orders->user_id = $user_id;
      $orders->fran_id = "null";
      $orders->working_status = 1;
      $orders->form_submitted = 0;
      $orders->service_id = $req->service_id;
      $orders->payment_mode = "razorpay";
      $orders->status = $req->status;

      $orders->save();

      // credit royalty points 
      $points = $req->service_points;
      $credit_royalty_points = $this->walletUpdate($points, "royalty", "credit", $user_id);


      // assign form after success order
      // $assign = new assigned;

      // $form_name_table = form_name::where("service_id", "$req->service_id")->first();
      // $assign->form_name = $form_name_table->name;

      // $assign->user_id = $user_id;
      // $assign->fran_id = "null";
      // $assign->submitted = 0;
      // $assign->status = $req->status;

      // $assign->save();



      return "you have payed $req->wallet from wallet and $final_amount with other method for service: your balance left ";
   }
}
