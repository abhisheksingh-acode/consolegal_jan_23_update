<?php

namespace App\Http\Traits;

use App\Models\wallet_history;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Traits\EmailTrait;
use App\Models\User;

trait WalletTrait
{
   static function walletUpdate($amount, $type, $entry, $user_id)
   {

      try {
         $wallet_update = new wallet_history;

         $wallet_update->amount = $amount;

         if ($type) {
            $wallet_update->amount_type = $type;
         }

         if (Session::has("user")) {
            $wallet_update->user_id = $user_id;
         } elseif (Session::has("frans")) {
            $wallet_update->fran_id = $user_id;
         }

         $id = "";

         if (Session::has("frans")) {
            $id = Wallet::where("fran_id", "$user_id")->first();
         } elseif (Session::has("user")) {
            $id = Wallet::where("user_id", "$user_id")->first();
         }

         $wallet_update->wallet_id = $id->id;
         $wallet_update->entry = $entry;

         $wallet_update->save();

         // update wallet amount 
         if (Session::has("user")) {
            $wallets = Wallet::where("user_id", "$user_id")->first();
         } elseif (Session::has("frans")) {
            $wallets = Wallet::where("fran_id", "$user_id")->first();
         }

         if ($entry == "debit") {
            $wallets->amount = $wallets->amount - $amount;

            if ($wallets->amount < 0) {
               $wallets->amount  = 0;
            }
         } else {
            $wallets->amount = $wallets->amount + $amount;

            if ($wallets->amount < 0) {
               $wallets->amount  = 0;
            }
         }

         $wallets->save();
         if (!$wallets) {
            return ["msg" => "error"];
         }

         if (Session::has("user")) {
            $user = Session::get("user");
         } elseif (Session::has("frans")) {
            $user = Session::get("frans");
         }

         if ($user) {
            $body = "Dear $user->name, Your wallet has {$entry}ted ₹$amount . By Consolegal";
            EmailTrait::confirm($user->email, $body, "Profile update", $user->name, $user->phone);
         }
      } catch (\Throwable $th) {
         return ["msg" => "error"];
      }
   }

   static function referCredit($amount, $type, $entry, $user_id)
   {

      try {
         $wallet_update = new wallet_history;

         $wallet_update->amount = $amount;

         if ($type) {
            $wallet_update->amount_type = $type;
         }

         $wallet_update->user_id = $user_id;

         $id = "";

         $id = Wallet::where("user_id", "$user_id")->first();

         $wallet_update->wallet_id = $id->id;
         $wallet_update->entry = $entry;

         $wallet_update->save();

         // update wallet amount 
         $wallets = Wallet::where("user_id", "$user_id")->first();

         if ($entry == "debit") {
            $wallets->amount = $wallets->amount - $amount;

            if ($wallets->amount < 0) {
               $wallets->amount  = 0;
            }
         } else {
            $wallets->amount = $wallets->amount + $amount;

            if ($wallets->amount < 0) {
               $wallets->amount  = 0;
            }
         }

         $wallets->save();
         if (!$wallets) {
            return ["msg" => "error"];
         }

         $user = User::find($user_id);


         if ($user) {
            $body = "Dear $user->name, Your wallet has {$entry}ted ₹$amount . By Consolegal";
            EmailTrait::confirm($user->email, $body, "Profile update", $user->name, $user->phone);
         }
      } catch (\Throwable $th) {
         return ["msg" => "error"];
      }
   }
}
