<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\Frans;


trait SmsTrait
{
   static function otp($otp, $phone, $name = null)
   {
      try {

         $response = Http::get("http://nimbusit.info/api/pushsms.php?user=105331&key=010jBy10g4Xk7oeexNEj&sender=CONSLE&mobile={$mobile}&text=Your OTP Code is 100012 Valid for 20 minutes. By CONSOLEGAL&entityid=1701163635722697581&templateid=1707164069183856982");

         return $response;
      } catch (\Throwable $th) {
         // throw $th;
         return ["status" => "issue with phone"];
      }
   }


   static function lead($phone, $name = null)
   {
      try {
         $response = Http::get("http://nimbusit.info/api/pushsms.php?user=105331&key=010jBy10g4Xk7oeexNEj&sender=CONSLE&mobile={$phone}&text=Dear {$name}, Welcome to the Consolegal family. You may get a call from Consolegal Team within 24hrs.&entityid=1701163635722697581&templateid=1707164069305221082");

         return $response;
      } catch (\Throwable $th) {
         // throw $th;
         return ["status" => "issue with phone"];
      }
   }


   static function order_complete($phone, $order, $name = null)
   {
      try {
         $response = Http::get("http://nimbusit.info/api/pushsms.php?user=105331&key=010jBy10g4Xk7oeexNEj&sender=CONSLE&mobile={$phone}&text=Dear {$name}, Your Order {$order} has been completed. Kindly find the documents from your account. By Consolegal&entityid=1701163635722697581&templateid=1707164069313578245");

         return $response;
      } catch (\Throwable $th) {
         // throw $th;
         return ["status" => "issue with phone"];
      }
   }


   static function reassign($phone, $name = null)
   {
      try {
         $response = Http::get("http://nimbusit.info/api/pushsms.php?user=105331&key=010jBy10g4Xk7oeexNEj&sender=CONSLE&mobile={$phone}&text=Dear {$name}, Some of your details are not clear, So fill the details out in the Re-Assigned Form. By Consolegal&entityid=1701163635722697581&templateid=1707164069324632128");

         return $response;
      } catch (\Throwable $th) {
         // throw $th;
         return ["status" => "issue with phone"];
      }
   }


   static function order_confirm($phone, $order, $name = null)
   {
      try {
         $response = Http::get("http://nimbusit.info/api/pushsms.php?user=105331&key=010jBy10g4Xk7oeexNEj&sender=CONSLE&mobile={$phone}&text=Dear {$name}, Your Order {$order} has been confirmed. By Consolegal&entityid=1701163635722697581&templateid=1707164069330295360");

         return $response;
      } catch (\Throwable $th) {
         // throw $th;
         return ["status" => "issue with phone"];
      }
   }


   static function assign($phone, $order, $name = null)
   {
      try {
         $response = Http::get("http://nimbusit.info/api/pushsms.php?user=105331&key=010jBy10g4Xk7oeexNEj&sender=CONSLE&mobile={$phone}&text=Dear {$name}, Your form has been assigned to {$order}. Kindly fill up your details. By Consolegal&entityid=1701163635722697581&templateid=1707164069336902674");

         return $response;
      } catch (\Throwable $th) {
         // throw $th;
         return ["status" => "issue with phone"];
      }
   }


   static function order_cancel($phone, $order, $name = null)
   {
      try {
         $response = Http::get("http://nimbusit.info/api/pushsms.php?user=105331&key=010jBy10g4Xk7oeexNEj&sender=CONSLE&mobile={$phone}&text=Dear {$name}, Your Order {$order} has been canceled. To find more details, contact the Support Team. By Consolegal&entityid=1701163635722697581&templateid=1707164069341507718");

         return $response;
      } catch (\Throwable $th) {
         // throw $th;
         return ["status" => "issue with phone"];
      }
   }

   static function refund($phone, $name = null)
   {
      try {
         $response = Http::get("http://nimbusit.info/api/pushsms.php?user=105331&key=010jBy10g4Xk7oeexNEj&sender=CONSLE&mobile={$phone}&text=Dear {$name}, Welcome to the Consolegal family. You may get a call from Consolegal Team within 24hrs.&entityid=1701163635722697581&templateid=1707164069305221082");

         return $response;
      } catch (\Throwable $th) {
         // throw $th;
         return ["status" => "issue with phone"];
      }
   }
}
