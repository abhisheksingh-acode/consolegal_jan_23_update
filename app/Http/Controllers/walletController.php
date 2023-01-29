<?php

namespace App\Http\Controllers;

use App\Models\Frans;
use Illuminate\Http\Request;

use App\Models\wallet_history;
use App\Models\User;
use App\Models\Wallet;

class walletController extends Controller
{
    //

    function wallet_all()
    {
        $wallet  = Wallet::orderBy("updated_at", "DESC")->simplePaginate(30);
        $user = User::all();
        $fran = Frans::all();


        $available = Wallet::sum("amount");

        $redeem = wallet_history::where("entry", "debit")->sum('amount');
        $total = wallet_history::where("entry", "credit")->sum('amount');

        return view(
            "wallet",
            [
                'avail' => $available,
                'total' => $total,
                'redeem' => $redeem,
                'wallet' => $wallet,
                'users' => $user,
                'fran' => $fran
            ]
        );
    }


    function wallet_profile(Request $req)
    {
        $wallet = Wallet::where("user_id", $req->id)->first();

        $wallets_history = wallet_history::where("user_id", $req->id)->orderBy("id", "desc")->get();

        $total = wallet_history::where("entry", "credit")->sum("amount");

        $redeem = wallet_history::where("entry", "debit")->sum("amount");

        $user = User::find($req->id);

        return view("walletProfile", ['data' => $wallet, 'users' => $user, 'history' => $wallets_history, 'total' => $total, 'redeem' => $redeem]);
        // return view("wallet");
    }

    function wallet_profile_fran(Request $req)
    {
        $wallet = Wallet::where("fran_id", $req->id)->first();

        $wallets_history = wallet_history::where("fran_id", $req->id)->orderBy("id", "desc")->get();

        $total = wallet_history::where("entry", "credit")->sum("amount");

        $redeem = wallet_history::where("entry", "debit")->sum("amount");

        $user = Frans::find($req->id);

        return view("walletProfile", ['data' => $wallet, 'users' => $user, 'history' => $wallets_history, 'total' => $total, 'redeem' => $redeem]);
        // return view("wallet");
    }




    function user_wallet(Request $req)
    {

        if ($req->session()->has("user")) {

            $user_info = $req->session()->get('user');

            $id = $user_info->id;

            $wallets = wallet::where("user_id", "$id")->get();

            $wallets_history = wallet_history::where("user_id", "$id")->get();

            $data = array("wallet" => $wallets, "history" => $wallets_history);
            return $data;
        }
    }




    function wallet_update(Request $req)
    {

        if ($req->amount && $req->user_id && $req->wallet_id) {

            $wallet_update = new wallet_history;


            $wallet_update->amount = $req->amount;

            if ($req->amount_type) {
                $wallet_update->amount_type = $req->amount_type;
            }
            $wallet_update->user_id = $req->user_id;
            $wallet_update->wallet_id = $req->wallet_id;
            $wallet_update->entry = $req->entry;


            $wallet_update->save();

            // update wallet amount 
            $wallets = wallet::where("user_id", "$req->user_id")->first();

            if ($req->entry == "debit") {
                $wallets->amount = $wallets->amount - $req->amount;
            } else {
                $wallets->amount = $wallets->amount + $req->amount;
            }

            $wallets->save();

            return $wallet_update;
        }
    }
}
