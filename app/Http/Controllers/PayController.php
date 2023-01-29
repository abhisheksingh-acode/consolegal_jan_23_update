<?php

namespace App\Http\Controllers;

use App\Models\Frans;
use App\Models\Order;
use App\Models\payment;
use App\Models\services;
use App\Models\User;
use Illuminate\Http\Req;
use Illuminate\Http\Request;
use Razorpay\Api\Api;


class PayController extends Controller
{
    public function index()
    {

        return view("web.paynow");
    }

    public function store(Request $req)
    {

        $validate = $req->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'amount' => 'required'
        ]);
        $input = $req->all();

        $user  = ["type" => "user", "user" => User::where(["email" => $req->email, "phone" => $req->phone])->first()];

        if (!$user) {
            $user = ["type" => "frans", "user" => Frans::where(["email" => $req->email, "phone" => $req->phone])->first()];
        }

        if (!$user) {
            $user  = ["type" => "user", "user" => User::create($validate)];
        }



        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

                $payments = new payment;

                $payments->r_payment_id = $req->razorpay_payment_id;
                $payments->amount = $payment['amount'] / 100;


                if ($user["type"] = "frans") {
                    $payments->fran_id = $user["user"]->id;
                    $payments->user_id = null;
                } elseif ($user["type"] = "user") {
                    $payments->fran_id = null;
                    $payments->user_id = $user["user"]->id;
                }
                if ($req->order_id) {
                    $payments->product_id = Order::find($req->order_id)->service_id;
                }

                $payments->save();
            } catch (\Exception $e) {
                // send failed sms 
                //    SmsTrait::order_cancel($user["user"]->phone, $req->service_id, $user["user"]->name);

                //    return  $e->getMessage();
                //    Session::put('error', $e->getMessage());
                //    return redirect()->back();
            }
        }


        if (isset($req->order_id)) {
            $order = Order::find($req->order_id);

            if ($req->razorpay_payment_id) {
                $order->payment_id = $req->razorpay_payment_id;
            }
            $order->status = "1";
            $order->save();
        }
        $req->session()->flash('success', 'Payment successful');
        return ["data" => "success"];
    }

    public function get($id)
    {
        return "payment details";
    }
}
