<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\CursorPaginator;
use App\Models\admins;
use App\Models\services;
use App\Models\services_sub_head;
use App\Models\form_name;
use App\Models\form_content;
use App\Models\Coupon;
use App\Models\Working_status;
use App\Models\royalty_points;
use App\Models\assigned;
use App\Models\Lead;
use App\Models\Blogs;
use App\Models\form_submit;
use App\Models\Frans;
use App\Models\Order;
use App\Models\tabs_content;
use App\Models\User;
use App\Models\service_done;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Barryvdh\DomPDF\Facade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App;
use PDF;

use Illuminate\Support\Facades\Storage;

use App\Http\Traits\EmailTrait;
use App\Http\Traits\SmsTrait;
use App\Models\Wallet;
use App\Models\wallet_history;

// use DB;



//-----------------notes------------------------

//dont forget to remove * from csrf token exception in App\Http\Middleware\VerifyCsrfToken 


//------------------notes_over-------------------



class admin extends Controller
{
   function login_get(Request $req)
   {
      if ($req->session()->has('admin')) {
         return redirect("/admin/dashboard");
      }
      return view('login');
   }


   // ---------------------- login 

   function login_post(Request $req)
   {
      try {
         $users = admins::where('email', "$req->email")->first();
         //user emaill check if exist
         if ($users) {
            //pswd check of correct or not
            if (Hash::check($req->password, $users->password)) {
               //session creation
               $req->session()->put('admin', $users);
               $req->session()->forget('user');
               $req->session()->forget('frans');
               $req->session()->forget('agents');

               // return $request->session()->get('admin');

               $data = Lead::all();

               return ["status" => "success", "data" => $data];
            } else {
               return "wrong cred.1";
            }
         } else {
            return "wrong cred.2";
         }
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   // update admin details 
   function admin_update(Request $req)
   {
      try {
         if ($req->id) {
            $admin = admins::find($req->id)->first();
            if ($admin) {
               if ($req->name) {
                  $admin->name = $req->name;
               }
               if ($req->email) {
                  $admin->email = $req->email;
               }
               if ($req->phone) {
                  $admin->phone = $req->phone;
               }
               if ($req->company) {
                  $admin->company = $req->company;
               }
               if ($req->password) {
                  $admin->password = Hash::make($req->password);
               }

               $admin->save();
               // confirmation after account update 
               if ($admin) {
                  $body = "Dear $admin->name, Your profile has been updated. By Consolegal";
                  EmailTrait::confirm($admin->email, $body, "Profile update", $admin->name);
               }

               return $admin;
            }
         }
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   // admin update franchise

   function franchise_update(Request $req)
   {
      try {

         if ($req->id) {
            $users = Frans::find($req->id);
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
               $users->company_name = $req->company;
            }
            if ($req->password) {
               $users->password = Hash::make($req->password);
            }

            $users->save();
            // confirmation after account update 
            if ($users) {
               $body = "Dear $users->name, Your profile has been updated. By Consolegal";
               EmailTrait::confirm($users->email, $body, "Profile update", $users->name);
            }

            return back()->with("success", "Franchise Updated Successfuly!!");
         }
      } catch (\Throwable $th) {
         return back()->with("error", "Franchise failed to Update!");
      }
   }
   // admin update user

   function franchise_allocate(Request $req)
   {

      if ($req->amount && $req->id) {

         $id = $req->id;

         $wallet_id = Wallet::where("fran_id", $id)->first()->id;

         $wallet_update = new wallet_history;


         $wallet_update->amount = $req->amount;
         $wallet_update->amount_type = "allocate";

         $wallet_update->fran_id = $id;
         $wallet_update->wallet_id = $wallet_id;
         $wallet_update->entry = "credit";


         $wallet_update->save();

         // update wallet amount 
         $wallets = Wallet::where("fran_id", $id)->first();

         $wallets->amount = $wallets->amount + $req->amount;

         $wallets->save();

         return ["msg" => "Wallet credited successfuly."];
      }
   }


   function user_update(Request $req)
   {
      try {

         if ($req->id) {
            $users = User::find($req->id);
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
            if ($req->password) {
               $users->password = Hash::make($req->password);
            }

            $users->save();

            // confirmation after account update 
            if ($users) {
               $body = "Dear $users->name, Your profile has been updated. By Consolegal";
               EmailTrait::confirm($users->email, $body, "Profile update", $users->name);
            }

            return back()->with("success", "User Updated Successfuly!!");
         }
      } catch (\Throwable $th) {
         return back()->with("error", "User Failed To Update!!");;
      }
   }

   function user_create(Request $req)
   {
   }


   function agent_profile(Request $req)
   {
      $user = DB::table('agents')->find($req->id);

      return view("user_profile", ['data' => $user, 'type' => 'agent']);
   }

   function agent_delete($id)
   {

      try {
         $stat = DB::table('agents')->where('id', $id)->delete();

         return redirect(route('agent.all'))->with("success", "Agent Deleted Successfuly!!");
      } catch (\Throwable $th) {
         return back()->with("error", "Agent Failed To Delete!!");
      }
   }


   function agent_update(Request $req)
   {
      try {


         $users = DB::table('agents')->where("id", $req->id)->update($req->only([
            'name', 'email', 'phone', 'company'
         ]));

         $users = DB::table('agents')->where("id", $req->id)->update(['password' => Hash::make($req->password)]);


         // confirmation after account update 
         if ($users = DB::table('agents')->find($req->id)) {
            $body = "Dear $users->name, Your profile has been updated. By Consolegal";
            EmailTrait::confirm($users->email, $body, "Profile update", $users->name);
         }
         return back()->with("success", "Agent Updated Successfuly!!");
      } catch (\Throwable $th) {
         //  throw $th;
         return back()->with("error", "Agent Failed To Update!");
      }
   }


   // register new admin 
   public function admin_add(Request $req)
   {
      try {
         if ($req->name && $req->email && $req->phone && $req->password) {

            $admin = new admins;

            $admin->name = $req->name;
            $admin->email = $req->email;
            $admin->phone = $req->phone;
            $admin->password = Hash::make($req->password);

            $admin->save();

            return $admin;
         } else {
            return ["error" => 'failed to register'];
         }
      } catch (\Throwable $th) {
         throw $th;
      }
   }



   // -------------------signout 

   function signout(Request $req)
   {
      try {
         if ($req->session()->has('admin')) {

            $req->session()->forget('admin');
         }
         return redirect('/admin');
      } catch (\Throwable $th) {
         return $th;
      }
   }


   // --------------------------------delete admin 

   function admin_delete(Request $req)
   {

      if ($req->id) {
         $admin = admins::find($req->id)->delete();

         return $admin;
      }
      return redirect('/admin/dashboard');
   }



   //   dashboard if session admin 
   function dashboard(Request $req)
   {
      try {

         $leads = Lead::orWhere('name', 'like', '%' . $req->query('search') . '%')->orderBy("id", "desc")
            ->simplePaginate(30);

         // $data = collect();
         // foreach ($leads as $lead) {

         //    if ($lead->from == 'agents') {
         //       $lead['lead_email'] = DB::table('agents')->find($lead->fran_id)->email ?? 'not exist';
         //       $data->push($lead);
         //    } else if ($lead->from == 'user') {


         //       $lead['lead_email'] = DB::table('frans')->find($lead->fran_id)->email ?? 'not exist';


         //       $data->push($lead);
         //    } else {
         //       $data->push($lead);
         //    }
         // }



         // $data = $this->paginate($data, 10);
         // //  return $data;

         $services = services::all();

         return view("dashboard", ["data" => $leads, 'service' => $services]);
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   public function paginate($items, $perPage = 5, $page = null, $options = [])
   {
      $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
      $items = $items instanceof Collection ? $items : Collection::make($items);
      return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
   }


   //-----------------services----------------
   function services()
   {
      try {

         $data = services_sub_head::all();
         $tabs = tabs_content::all();
         // return $data;

         return view("add_service", ['data' => $data, 'tabs' => $tabs]);
         // return "lazy developers in services also";
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   function services_manage()
   {
      $data = services::simplePaginate(10);
      return view("manage_service", ['data' => $data]);
   }

   function services_post(Request $req)
   {
      try {

         $data = "";
         if ($req->id > 0) {
            $service = services::where("id", $req->id)->first();

            foreach ($req->input() as $key => $val) {
               $service->$key = $val;
            }
            // return $service;

            $service->save();

            $data = $service;
         } else {
            $service = new services;
            foreach ($req->input() as $key => $val) {
               $service->$key = $val;
            }
            // return $service;
            $service->status = 1;

            $service->save();

            $data = $service;
         }




         if ($data) {
            return ['data' => $data, 'status' => 'success'];
         }
         return ['status' => 'exist'];
      } catch (\Throwable $th) {
         // throw $th;
      }
   }


   function services_edit(Request $req, $id)
   {
      $service_id = services::find($id);
      $sub_heads  = services_sub_head::where("service_id", $id)->get();
      $tabs = tabs_content::where("service_id", $id)->get();
      // return $data;

      return view("add_service", ['service_id' => $service_id, 'sub_heads' => $sub_heads, 'tabs' => $tabs]);

      // return $id;
   }


   // update status of service 
   function services_put(Request $req)
   {
      try {
         $service = services::where("id", $req->id)->first();

         foreach ($req->input() as $key => $val) {
            $service->$key = $val;
         }
         $service->save();

         // if ($req->status) {
         //     $service->status = "1";
         // }
         // $service->save();

         return ["success" => $service];
         // return redirect("/admin/service/manage");
      } catch (\Throwable $th) {
         throw $th;
      }
   }
   // delete service 
   function services_delete(Request $req)
   {
      try {
         $service = services::where("id", $req->id)->delete();

         return $service;
      } catch (\Throwable $th) {
         throw $th;
      }
   }
   //---------------end services----------------

   // tabs content service page 

   function tabs_content_post(Request $req)
   {


      $tabArr = array("overview", "details", "requ", "listicles", "regs", "others", "guide", "faq");

      $service_id = $req->service_id;

      foreach ($tabArr as $list) {

         if ($data = tabs_content::where("name", "$list")->where("service_id", $service_id)->first()) {

            if ($req->$list !== "") {
               $data->name = $list;
               $data->description = $req->$list;
            }
            // $data->description = get_object_vars($req->$list);

            $data->save();
         } else {

            $new = new tabs_content;

            $new->name = $list;

            $new->service_id = $service_id;

            $new->description = $req->$list;

            $new->save();
         }
      }

      return $data;
   }

   //---------------services_sub_head----------------
   function sub_services(Request $req, $service_id)
   {
      try {
         $data = services_sub_head::where('service_id', "$service_id")->orderBy('s_no')->get();

         return $data;
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   //  add sub services 

   function sub_services_post(Request $req)
   {
      try {

         $nos = 0;

         $service_id = $req->service_id;

         foreach ($req->input() as  $key => $list) {

            if ($key != "service_id") {
               $nos++;

               // update if exist 
               if ($sub_heads = services_sub_head::where("sr_no", $nos)->where("service_id", $service_id)->first()) {

                  if ($list == '') {
                     $delete = services_sub_head::where("sr_no", $nos)->delete();
                  }

                  if ($key != "service_id" && $key != "description") {
                     $sub_heads->sub_head = $list;
                  }

                  if ($key == "service_id") {
                     $sub_heads->service_id = $list;
                  }
                  $sub_heads->save();
               }
               // insert if new data
               else {

                  $data = new services_sub_head;

                  if ($list == '') {
                     return "empty field";
                  } else {

                     if ($key != "service_id" && $key != "description") {
                        $data->sub_head = $list;

                        // return $key . $list;
                     }

                     if ($key == "description") {
                        $data->description = $list;
                     }

                     $data->service_id = $service_id;

                     $data->sr_no = $nos;

                     $data->status = 1;

                     $data->save();
                  }
               }
            }
         }

         return ['data' => $req->input()];
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   // update sub services 
   function sub_services_put(Request $req)
   {
      try {

         if ($req->id) {
            $sub_services = services_sub_head::where("id", "$req->id")->first();

            if ($req->sub_head) {
               $sub_services->sub_head = $req->sub_head;
            }
            if ($req->description) {
               $sub_services->description = $req->description;
            }
            if ($req->s_no) {
               $sub_services->s_no = $req->s_no;
            }
            if ($req->service_id) {
               $sub_services->service_id = $req->service_id;
            }
            if ($req->status != null) {
               $sub_services->status = $req->status;
            }
            $sub_services->save();
            return $sub_services;
         }
      } catch (\Throwable $th) {
         throw $th;
      }
   }


   // delete sub services
   function sub_services_delete(Request $req)
   {
      try {
         if ($req->id) {
            $sub_services = services_sub_head::where("id", "$req->id")->delete();
            return $sub_services;
         }
      } catch (\Throwable $th) {
         throw $th;
      }
   }
   //---------------------end services_sub_head------------------

   //---------------------form-----------------------
   function form_name(Request $req)
   {
      $data = form_name::orderBy('id', 'desc');

      if ($req->query('service')) {
         $data = $data->where("service_id", '=', $req->query('service'));
      }
      if ($req->query('search')) {
         $data = $data->where('name', 'like', '%' . $req->query('search') . '%');
      }

      $data = $data->get();

      $services = services::all();

      $assign = assigned::all();

      // return ['forms' => $data, 'services' => $services];
      return view("all_forms", ['forms' => $data, 'services' => $services, 'assign' => $assign]);
   }

   function form_add_get(Request $req)
   {
      $data = services::all();

      $forms = form_name::orderBy("id", "desc")->where('name', 'like', '%' . $req->query('search') . '%');


      if ($req->query('service')) {
         $forms = $forms->where("service_id", '=', $req->query('service'));
      }

      $forms = $forms->get();

      $forms_content = form_content::all();

      return view("add_form", ['services' => $data, 'forms' => $forms, 'form_content' => $forms_content]);
   }

   function form_name_post(Request $req)
   {
      try {
         $data = DB::statement("insert into
            form_names(name,service_id) 
            VALUES(
                '$req->name',
                '$req->service_id'            
            )");
         return $data;
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   function form_name_edit(Request $req)
   {
      try {
         $form_names = form_name::where("id", "$req->id")->first();

         $services = services::where("id", "$req->service_id")->first();

         return ['form' => $form_names, 'service' => $services];
      } catch (\Throwable $th) {
         //throw $th;
      }
   }


   function form_name_put(Request $req)
   {
      try {

         $form_names = form_name::where("id", "$req->id")->first();

         $form_names->name = $req->name;

         $form_names->service_id = $req->service_id;

         $form_names->save();

         return redirect('/admin/services/forms/all');
      } catch (\Throwable $th) {
         throw $th;
      }
   }


   function form_name_delete(Request $req)
   {
      try {

         $forms = form_name::find($req->id)->delete();

         if ($forms) {
            return ['status' => 'success'];
         } else {
            return ['status' => 'failed'];
         }
      } catch (\Throwable $th) {
         //throw $th;
      }
   }


   function form_content(Request $req)
   {
      try {
         $data = DB::select("select * from form_contents 
        where form_name_id = $req->form_id");
         return $data;
         // return $req->form_id;
      } catch (\Throwable $th) {
         //throw $th;
      }
   }


   function form_content_post(Request $req)
   {
      try {
         $data = DB::statement("insert into
            form_contents(form_name_id,form_content,required,type,status) 
            VALUES(
                '$req->form_id',
                '$req->content',            
                '$req->required',           
                '$req->type',           
                '$req->status'            
                )");

         // return $data;
         return redirect("/admin/services/forms/add");

         // return redirect("/admin/services/form/$req->id/$req->form_id");
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   function assigned_list()
   {
      $data = assigned::orderBy("id", "desc")->get();
      $forms = form_name::all();
      $users = User::all();

      return view("assigned", ['data' => $data, 'users' => $users, 'forms' => $forms]);

      // return ['data' => $data, 'users' => $users, 'forms' => $forms];
   }


   function assign(Request $req)
   {
      $assign = new assigned;

      $assign->form_name_id = $req->form_id;

      // get order detail user or franchise 
      if ($req->user_id) {
         $assign->user_id = $req->user_id;
         $user = User::find($req->user_id);
      }
      if ($req->fran_id) {
         $assign->fran_id = $req->fran_id;
         $user = Frans::find($req->fran_id);
      }

      $assign->order_id = $req->id;

      $assign->form_name_id = $req->form_id;

      $assign->submitted = "0";
      $assign->status = "1";
      $assign->save();


      Order::find($assign->order_id)->update(["form_submitted" => 0]);


      if ($assign) {
         $body = "Dear $user->name, Your form has been assigned to order id $req->id. Kindly fill up your details. By Consolegal";
         EmailTrait::confirm($user->email, $body, "Profile update", $user->name);

         SmsTrait::assign($user->phone, $req->id, $user->name);
      }

      return $assign;
   }



   function form_submit(Request $req)
   {
      try {

         // SELECT column_name(s)
         // FROM table1
         // INNER JOIN table2
         // ON table1.column_name = table2.column_name;

         // $data =DB::select("select * from form_contents 
         // where form_name_id = $req->form_id");
         $data = DB::select("SELECT form_contents.* ,form_submits.*
        FROM form_contents
        INNER JOIN form_submits
        ON form_contents.id = form_submits.form_content_id;");
         return $data;
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   function order_view(Request $req, $id)
   {
      $order = Order::where("id", $id)->first();
      $payment = DB::table('payments')->get();
      $service = services::get();

      $user_type = ($order->user_id) ? "user_id" : "fran_id";

      if ($user_type == "user_id") {
         $user = User::where("id", $order->$user_type)->first();
      } else {
         $user = Frans::where("id", $order->$user_type)->first();
      }

      return view(
         "order_detail_page",
         [
            "order"   => $order,
            "payment" => $payment,
            "service" => $service,
            "user"    => $user,
            "type"    => $user_type
         ]
      );
   }

   function orders_detail(Request $req)
   {
      $customer = form_submit::where("assigned_id", $req->id)->get();

      $form_id = assigned::find($req->id);
      $user = User::find($form_id->user_id);

      if (!$user) {
         $user = Frans::find($form_id->fran_id);
      }

      $service = form_name::where("name", $form_id->name)->get();
      // $service_id = $service->id;

      $input = form_submit::where("content_type", "text")->where("assigned_id", $req->id)->orderBy("id", "desc")->get()->unique('content_label');

      $file = form_submit::where("content_type", "file")->where("assigned_id", $req->id)->orderBy("id", "desc")->get()->unique('content_label');

      $order = Order::where('id', $form_id->order_id)->first();

      $payment = DB::table('payments')->where("r_payment_id", $order->payment_id)->first();

      $service_name = services::all();

      $docs = service_done::where("order_id", $form_id->order_id)
         ->orderBy("id", "DESC")
         ->get();

      return view("edit_order", [
         'detail'       => $customer,
         'user'         => $user,
         'order'        => $order,
         'payment'      => $payment,
         'assign'       => $form_id,
         'input'        => $input,
         'file'         => $file,
         'service_name' => $service_name,
         'docs'         => $docs
      ]);

      // return [
      //    'details' => $customer, 'order' => $order, 'assign' => $form_id, 'form' => $service, 'user' => $user, 'service_name' => $service_name, 'input' => $input, 'file' => $file
      // ];
   }


   function order_approve(Request $req)
   {
      try {
         $order =  Order::where("id", $req->id)->first();

         $order->form_submitted = $req->status;

         if ($req->status == 3) {

            $assign = assigned::where("id", $req->assign_id)->first();

            $assign->submitted = 0;

            $assign->save();
         }

         $order->save();

         if ($order) {

            if ($order->user_id != null) {
               $user = User::find($order->user_id);
            } else {
               $user = User::find($order->fran_id);
            }

            switch ($req->status) {
               case '1':
                  $body = "Dear $user->name, Your Order id $order->id has been in pending. By Consolegal";
                  break;
               case '2':
                  $body = "Dear $user->name, Your Order id $order->id has been in process. By Consolegal";
                  break;
               case '3':
                  $body = "Dear $user->name, Some of your details are not clear, So fill the details out in the Re-Assigned Form. By Consolegal
                  ";
                  SmsTrait::reassign($user->phone, $user->name);
                  break;
               case '4':
                  $body = "Dear $user->name, Your Order id $order->id has been completed. Kindly find the documents from your account. By Consolegal";
                  SmsTrait::order_complete($user->phone, $order->id, $user->name);
                  break;
            }
            EmailTrait::confirm($user->email, $body, "Profile update", $user->name, $user->phone);

            return $order;
         }
      } catch (\Throwable $th) {
         throw $th;
      }
   }


   function customer_upload(Request $req)
   {
      $upload = array();
      if ($req->hasfile('filename')) {
         foreach ($req->file('filename') as $file) {

            $data = new service_done;

            $name = time() . '.' . $file->extension();

            // return asset('public/storage');
            // $path = $file->storeAs('public', $name);
            $path = $file->move(public_path('storage'), $name);

            $upload[] = $name;

            $data->service_name = $req->service_name;
            $data->order_id = $req->order_id;

            $data->field_name = $req->name;
            $data->field_type = "file";
            $data->status = "1";

            $data->field_content = $name;

            $data->save();
         }
      }

      // $data->content = json_encode($upload);



      return back();
   }








   //-------------------1 usefull code for file move----------------------
   // function image(Request $req)
   // {
   //     if($req->file('image')){
   //         $req->validate([
   //             'image'=>'max:5120'
   //         ]);
   //         $file_name = time()."-".$req->file('image')->getClientOriginalName();
   //         $file_move = $req->image->move(public_path("Clients_files"),$file_name);
   //         dd($file_move);
   //         // dd($req->file('image')->getClientOriginalName());
   //     }
   //     else {
   //         return "jsdjjsfkj";
   //     }
   //     // dd($req->image);
   //     // return $req->image['type'];
   // }
   //--------------------1 end------------------------------------------------
   //---------------------form_end-------------------




   function coupons_get(Request $req)
   {

      try {
         $data = coupon::all();
         $services = services::all();

         return view('coupons', ['data' => $data, 'services' => $services]);
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   function coupons_post(Request $req)
   {
      try {

         if ($req->name && $req->code && $req->type && $req->method && $req->amount &&  $req->service_id && $req->status) {

            $data = new coupon;

            $data->name = $req->name;
            $data->code = $req->code;
            $data->type = $req->type;
            $data->method = $req->method;
            $data->expired_at = $req->expired_at;
            $data->amount = $req->amount;
            $data->redeem_count = "0";

            $data->service_id = implode(",", $req->service_id);;
            $data->status = $req->status;

            $data->save();
            return redirect("/admin/coupons");
         }
         return "not all param rec";
      } catch (\Throwable $th) {
         throw $th;
      }
   }


   function coupons_put(Request $req)
   {
      try {
         $data = coupon::where("id", "$req->id")->first();

         if ($req->name) {
            $data->name = $req->name;
         }
         if ($req->code) {
            $data->code = $req->code;
         }
         if ($req->type) {
            $data->type = $req->type;
         }
         if ($req->method) {
            $data->method = $req->method;
         }
         if ($req->amount) {
            $data->amount = $req->amount;
         }
         if ($req->redeem_count) {
            $data->redeem_count = $req->redeem_count;
         }
         if ($req->expired_at) {
            $data->expired_at = $req->expired_at;
         }
         if ($req->service_id) {
            $data->service_id = $req->service_id;
         }
         if ($req->status) {
            $data->status = $req->status;
         }

         $data->save();
         return $data;
      } catch (\Throwable $th) {
         throw $th;
      }
   }
   function coupons_delete(Request $req)
   {
      try {
         $data = coupon::where("id", "$req->id")->delete();

         return redirect()->back()->with("delete", "Deleted successfuly");
      } catch (\Throwable $th) {
         throw $th;
      }
   }



   // working status 
   function working_status_get()
   {
      $data = working_status::all();

      return $data;
   }


   function working_status_post(Request $req)
   {

      try {
         $data = new working_status;

         $data->name = $req->name;
         $data->sno = $req->sno;
         $data->service_id = $req->service_id;
         $data->status = $req->status;

         $data->save();

         return $data;
      } catch (\Throwable $th) {
         throw $th;
      }
   }



   // royalty points  
   function royalty_points_get()
   {
      $data = royalty_points::all();

      return $data;
   }


   function royalty_points_post(Request $req)
   {

      try {
         $data = new royalty_points;
         $data->service_id = $req->service_id;
         $data->points = $req->points;
         $data->status = $req->status;
         $data->save();

         return $data;
      } catch (\Throwable $th) {
         throw $th;
      }
   }



   // get assigned form to users 
   function assigned_get(Request $req)
   {

      if ($req->user) {
         $data = assigned::where("user_id", "$req->user")->get();

         return $data;
      } else {
         $data = assigned::all();

         return $data;
      }
   }



   //-------------------------blogs

   function blogs_get()
   {
      $data = Blogs::all();
      return view("view_blog", ['data' => $data]);
   }

   function blogs_add(Request $req)
   {
      if ($req->id == null) {
         return view("blog_post");
      } else {
         $data = Blogs::find($req->id);
         return view("blog_post", ['data' => $data]);
      }
   }

   function blogs_post(Request $req)
   {

      $blogs = new Blogs;

      $blogs->title = $req->title;
      $blogs->author = "Admin";
      $blogs->description = $req->description;
      $blogs->tags = $req->tags;
      $blogs->highlight1 = $req->highlightone;
      $blogs->highlight2 = $req->highlighttwo;

      // upload image file 

      if ($req->file) {

         $image_file = time() . '.' . $req->file('file')->extension();

         // $data = $req->file('file')->storeAs('/', $image_file);
         $data = $req->file('file')->move(public_path('storage'), $image_file);

         $blogs->image = $image_file;
      }


      $blogs->save();



      return redirect("/blogs/add");
   }


   function blogs_put(Request $req)
   {
      $blogs = Blogs::find($req->id);

      if (!$blogs) {
         return redirect("/blogs");
      }

      $blogs->title = $req->title;
      $blogs->author = "Admin";
      $blogs->description = $req->description;

      $blogs->highlight1 = $req->highlightone;
      $blogs->highlight2 = $req->highlighttwo;

      // upload image file 

      if (strlen($req->file) > 3) {

         $image_file = time() . '.' . $req->file('file')->extension();

         // $data = $req->file('file')->storeAs('/', $image_file);
         $data = $req->file('file')->move(public_path('storage'), $image_file);

         $blogs->image = $image_file;
      }

      $blogs->save();


      return redirect("/blogs");
   }

   function blogs_delete($id)
   {

      Blogs::find($id)->delete();

      return redirect()->back();
   }
}
