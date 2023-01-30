<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;
use Exception;


use App\Models\Order;
use App\Models\payment;
use App\Models\Coupon;

use Illuminate\Support\Facades\DB;


use App\Http\Traits\WalletTrait;
use App\Http\Traits\EmailTrait;
use App\Http\Traits\SmsTrait;
use App\Models\Frans;
use App\Models\services;
use App\Models\User;

class RazorpayPaymentController extends Controller
{
   /**
    * Write code on Method
    *
    * @return response()
    */
   public function index(Request $req)
   {
      $active = $req->session()->get("user");

      if (!$active) {
         $active = $req->session()->get("frans");
      }
      return view('razorpayView', ["active" => $active]);
   }

   /**
    * Write code on Method
    *
    * @return response()
    */

   public function apply_coupon(Request $req)
   {

      $coupon = Coupon::where('code', $req->name)->first();


      $valid = false;

      if($coupon){
         $services = explode(",", $coupon->service_id);

         foreach ($services as $val) {
            if ($req->service_id == $val) {
               $valid = true;
            } 
         }
      }

      if(!$valid){
         return ['status' => 'failed', 'msg' => 'coupon code not eligible'];
      }

      if ($coupon) {
         return response()->json(['status' => 'success', 'data' => $coupon], 200);
      }

      return ['status' => 'failed', 'msg' => 'coupon code not valid'];
   }


   public function store_offline(Request $request)
   {

      $user = $request->session()->get('user');
      $frans = $request->session()->get('frans');

      if ($request->session()->has("user")) {
         $user_id = $user->id;
         $user = User::find($user_id);
      } elseif ($request->session()->has("frans")) {
         $user_id = $frans->id;
         $user = Frans::find($user_id);
      }

      $input = $request->all();

      
      $orders = new Order;

      if ($request->session()->has("frans")) {
         $orders->fran_id = $user_id;
      } elseif ($request->session()->has("user")) {
         $orders->user_id = $user_id;
      }
      $orders->working_status = 1;
      $orders->form_submitted = 0;
      $orders->service_id = $request->service_id;

      // if ($request->razorpay_payment_id) {
         $orders->payment_mode = "wallet";
         $orders->payment_id = "null";
      // }
      $orders->status = "1";

      $orders->save();

      if ($request->coupon > 0) {
         $coupon = Coupon::where("id", $request->coupon)->first();
         $coupon->redeem_count += 1;
         $coupon->save();
      }

      // for user 
      if ($request->wallet > 0) {
         $wallet = WalletTrait::walletUpdate($request->wallet, "redeem", "debit", $user_id);
      }

      // credit royalty points
      if ($request->session()->has('user') || $request->session()->has('frans')) {
         if ($request->service_points > 0 || $request->service_points != null) {
            $credit_royalty_points = WalletTrait::walletUpdate($request->service_points, "royalty", "credit", $user_id);

            // if points credited 
            $body = "Dear $user->email, Your Order id $orders->id has been confirmed and $request->service_points points credited to your wallet. By Consolegal";
            EmailTrait::confirm($user->email, $body, "Profile update", $user->name);
         } else {
            $body = "Dear $user->email, Your Order id $orders->id has been confirmed. By Consolegal";
            EmailTrait::confirm($user->email, $body, "Profile update", $user->name);
         }

         SmsTrait::order_confirm($user->phone, $orders->id, $user->name);
      }

      $request->session()->flash('success', 'Payment successful');
      return ["data" => "success"];
   }


   public function store(Request $request)
   {

      $user = $request->session()->get('user');
      $frans = $request->session()->get('frans');

      if ($request->session()->has("user")) {
         $user_id = $user->id;
         $user = User::find($user_id);
      } elseif ($request->session()->has("frans")) {
         $user_id = $frans->id;
         $user = Frans::find($user_id);
      }

      $input = $request->all();

      $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

      $payment = $api->payment->fetch($input['razorpay_payment_id']);

      if (count($input)  && !empty($input['razorpay_payment_id'])) {
         try {
            $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

            $payments = new payment;

            $payments->r_payment_id = $request->razorpay_payment_id;
            $payments->amount = $payment['amount'] / 100;


            if ($request->session()->has("frans")) {
               $payments->fran_id = $user_id;
               $payments->user_id = null;
            } elseif ($request->session()->has("user")) {
               $payments->fran_id = null;
               $payments->user_id = $user_id;
            }
            if ($request->service_id) {
               $payments->product_id = $request->service_id;
            }

            $payments->save();
         } catch (Exception $e) {
            // send failed sms 
            SmsTrait::order_cancel($user->phone, $request->service_id, $user->name);

            return  $e->getMessage();
            Session::put('error', $e->getMessage());
            return redirect()->back();
         }
      }


      // add order after payment 

      // $update_wallet = WalletTrait::walletUpdate($request->wallet, "flat", "debit", $user_id);

      // update order table 
      $orders = new Order;

      if ($request->session()->has("frans")) {
         $orders->fran_id = $user_id;
      } elseif ($request->session()->has("user")) {
         $orders->user_id = $user_id;
      }
      $orders->working_status = 1;
      $orders->form_submitted = 0;
      $orders->service_id = $request->service_id;

      if ($request->razorpay_payment_id) {
         $orders->payment_mode = "razorpay";
         $orders->payment_id = $request->razorpay_payment_id;
      }
      $orders->status = "1";

      $orders->save();

      if ($request->coupon > 0) {
         $coupon = Coupon::where("id", $request->coupon)->first();
         $coupon->redeem_count += 1;
         $coupon->save();
      }

      // for user 
      if ($request->wallet > 0) {
         $wallet = WalletTrait::walletUpdate($request->wallet, "redeem", "debit", $user_id);
      }

      // credit royalty points
      if ($request->session()->has('user') || $request->session()->has('frans')) {
         if ($request->service_points > 0 || $request->service_points != null) {
            $credit_royalty_points = WalletTrait::walletUpdate($request->service_points, "royalty", "credit", $user_id);

            // if points credited 
            $body = "Dear $user->email, Your Order id $orders->id has been confirmed and $request->service_points points credited to your wallet. By Consolegal";
            EmailTrait::confirm($user->email, $body, "Profile update", $user->name);
         } else {
            $body = "Dear $user->email, Your Order id $orders->id has been confirmed. By Consolegal";
            EmailTrait::confirm($user->email, $body, "Profile update", $user->name);
         }

         SmsTrait::order_confirm($user->phone, $orders->id, $user->name);
      }

      $request->session()->flash('success', 'Payment successful');
      return ["data" => "success"];
   }
}
