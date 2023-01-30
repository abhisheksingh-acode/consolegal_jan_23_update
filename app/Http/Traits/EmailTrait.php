<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

use App\Http\Traits\SmsTrait;

use App\Models\User;
use App\Models\Frans;
use App\Mail\CashbackCredited;
use App\Mail\OtpRequest;
use App\Mail\NewNotification;


trait EmailTrait
{
   static function Otp_send($otp, $email, $subject = null, $phone = null, $name = null)
   {
      try {
         $detail = [
            'body'  => "Your OTP Code is $otp sent to mobile $phone also. Valid for 20 minutes. By CONSOLEGAL",
            'otp'   => $otp,
            'subject' => $subject,
            'name'   => $name
         ];

         $to = $email;
         // \Mail::to($to)->send(new \App\Mail\email($detail));
         \Mail::to($to)->send(new OtpRequest($detail));

         // sms otp 
         $sms_response = SmsTrait::otp($phone, $name);

         return ["status" => "success"];
      } catch (\Throwable $th) {
         // throw $th;
         return ["status" => "issue with email"];
      }
   }

   static function confirm($email, $body, $subject = null, $name = null, $phone = null)
   {
      try {
         $detail = [
            'subject' => $subject,
            'body'  => $body,
            'name'  => $name
         ];

         $to = $email;
         // \Mail::to($to)->send(new \App\Mail\email($detail));
         Mail::to($to)->send(new NewNotification($detail));

         return $status = ["email" => "email sent to $to"];
      } catch (\Throwable $th) {
         // throw $th;
         return ["status" => "issue with email"];
      }
   }
}
