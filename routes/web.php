<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\admin;
use App\Http\Controllers\emailController;
use App\Http\Controllers\users;
use App\Http\Controllers\NotFound;
use App\Http\Controllers\leads;
use App\Http\Controllers\orders;
use App\Http\Controllers\walletController;
use App\Http\Controllers\franchise;
use App\Http\Controllers\agents;
use App\Http\Controllers\CareerCategoryController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\webController;

use App\Http\Controllers\PayController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\JoinAppController;
use App\Http\Controllers\KycController;
use Barryvdh\DomPDF\Facade;

use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\ReferController;
use App\Http\Controllers\RoyaltyController;
use App\Models\admins;
use App\Models\email;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// web route for all visitors

Route::get('/', [webController::class, "index"])->name("home");

Route::view("/about", "web.about")->name("about");


Route::view("/privacy", "web.privacy")->name("privacy");
Route::view("/refund", "web.refund")->name("refund");
Route::view("/tnc", "web.tnc")->name("tnc");

Route::get("/pay-now", [PayController::class, 'index'])->name('paynow');
Route::post("/pay-now", [PayController::class, 'store'])->name('paynow');
Route::post("order/validate", [orders::class, "valid"])->name("order.validate");

Route::get('/career', [CareerController::class, 'index'])->name('career');
Route::post('/career', [CareerController::class, 'store'])->name('career.store');

Route::get("/services", [webController::class, "service"])->name("services");

Route::get("/services/{name}/{id}", [webController::class, "service"])->name("service.show");

Route::post("/live-search", [webController::class, "liveSearch"]);


Route::get("/blogpage", [webController::class, 'blogs'])->name("blogs");

Route::get("/blogpage/{id}", [webController::class, 'blog_view'])->name('blog.show');

Route::post("blogpage/category", [webController::class, "blogs_category"])->name("blog.category");


Route::view("/contact", "web.contact")->name("contact");

Route::view("/thankyou", "web.thankyou")->name("thanks");



// loan 
Route::view("/loan/car", "web.carloan")->name("loan.car");
Route::view("/loan/home", "web.homeloan")->name("loan.home");
Route::view("/loan/personal", "web.personal-loan")->name("loan.personal");
Route::view("/loan/business", "web.businessloan")->name("loan.business");

// insurance 
Route::view("/insurance/motor", "web.motorinsurance")->name("insurance.motor");
Route::view("/insurance/travel", "web.travelinsurance")->name("insurance.travel");
Route::view("/insurance/health", "web.healthinsurance")->name("insurance.health");
Route::view("/insurance/life", "web.lifeinsurance")->name("insurance.life");

Route::post("/email/subscribe", [webController::class, "email_subscribe"])->name("subscribe.post");

// download file 
Route::get("/download/{id}", [webController::class, "download"]);

Route::get("/download/invoice/{id}", [webController::class, "download_invoice"])->name("user.download.invoice");
Route::get("/download/customer/{id}", [webController::class, "download_customer"]);

// text file pdf
Route::get("/text/{id}", [webController::class, "textpdf"]);
Route::get("/reciept/{id}", [webController::class, "download_reciept"]);

// end web route for all visitors here 
Route::get('/not_found', [NotFound::class, 'index']);


// email and sms
Route::post('/email', [emailController::class, "index"]);
Route::post("/otp", [webController::class, 'send_otp']);


Route::get("/join-app", [JoinAppController::class, 'index'])->name("join");
Route::post("/join-app", [JoinAppController::class, 'post'])->name("join.post");


/* Route::get("check", function () {
 -----------------------  WORK  ----------------------
 Developed By Abhishek Singh [ FullStack Developer @ AWARNO]
 DATE ->  May, 2022 
 ----------------------- STAMP ------------------------

    $mobile = "8587899030";
   $respose = Http::get("http://nimbusit.info/api/pushsms.php?user=105331&key=010jBy10g4Xk7oeexNEj&sender=CONSLE&mobile={$mobile}&text=Dear {#var#}, Your Order {#var#} has been confirmed. By Consolegal&entityid=1701163635722697581&templateid=1707164069183856982");

   return $respose;
});
*/

//----------------admin------------------------------
Route::get("/admin", [admin::class, 'login_get']);
Route::post("/admin", [admin::class, 'login_post']);

Route::get("admin/signout", [admin::class, 'signout']);

Route::get("/agent/leads/export", [ExportController::class, 'agent_lead'])->name('export.agent.lead');
Route::get("/fran/leads/export", [ExportController::class, 'fran_lead'])->name('export.fran.lead');

Route::group(['middleware' => 'admin_auth'], function () {

   Route::get("/admin/dashboard", [admin::class, 'dashboard'])->name('admin.dashboard.index');

   Route::post("/admin/add", [admin::class, 'admin_add']);  // add new admin

   Route::post("admin/update", [admin::class, 'admin_update']);
   Route::post("admin/delete", [admin::class, 'admin_delete']);


   // admin order function 
   Route::get("/admin/orders", [orders::class, "orders_get"]);
   Route::get("/admin/orders/add", [orders::class, "orders_add"]);
   Route::get("/admin/orders/add/{id}", [orders::class, "lead_add_order"])->name("admint.lead.order");

   Route::get("/admin/orders/export", [ExportController::class, 'order'])->name('export.orders');

   Route::post("/admin/order/post", [orders::class, "order_post_admin"])->name('admin.order.create');
   Route::get("/admin/orders/detail", [admin::class, "orders_detail"]);
   Route::get("/admin/orders/view/{id}", [admin::class, "order_view"]);

   Route::post("/admin/order/approve", [admin::class, "order_approve"]);

   Route::post("/admin/customer/upload", [admin::class, "customer_upload"]);



   // Career and Categories 

   Route::get('/admin/career-category', [CareerCategoryController::class, 'index'])->name('career.category');
   Route::get('/admin/career-category/create', [CareerCategoryController::class, 'create'])->name('career.category.create');
   Route::post('/admin/career-category', [CareerCategoryController::class, 'store'])->name('career.category.store');
   Route::get('/admin/career-category/{id}', [CareerCategoryController::class, 'edit'])->name('career.category.edit');
   Route::post('/admin/career-category/{id}', [CareerCategoryController::class, 'update'])->name('career.category.update');
   Route::get('/admin/career-category/{id}/delete', [CareerCategoryController::class, 'destroy'])->name('career.category.delete');


   Route::get('/admin/careers', [CareerCategoryController::class, 'careers'])->name('career.index');
   Route::get('/admin/careers/{id}/resume', [CareerController::class, 'resume'])->name('career.resume');



   // services 
   Route::get("/admin/services", [admin::class, 'services']);
   Route::post("/admin/services", [admin::class, 'services_post']);
   Route::get("/admin/services/edit/{id}", [admin::class, 'services_edit']);
   Route::post("/admin/services/put", [admin::class, 'services_post']);
   Route::post("/admin/services/remove", [admin::class, 'services_delete']);

   Route::get("/admin/service/manage", [admin::class, "services_manage"]);

   // sub head service 
   Route::get("/admin/services/sub", [admin::class, 'sub_services']);
   Route::post("/admin/services/sub", [admin::class, 'sub_services_post']);
   Route::post("/admin/services/update", [admin::class, 'sub_services_put']);
   Route::post("/admin/services/delete", [admin::class, 'sub_services_delete']);


   // tabs content service page 

   Route::post("/admin/services/tabs", [admin::class, "tabs_content_post"]);

   // form admin control 

   Route::get("/admin/services/forms/all", [admin::class, 'form_name'])->name("admin.forms.index");

   Route::get("/admin/services/forms/add", [admin::class, 'form_add_get'])->name("admin.forms.add");

   Route::post("/admin/services/forms/post", [admin::class, 'form_name_post']);

   Route::post("/admin/services/forms/edit", [admin::class, 'form_name_edit']);

   Route::post("/admin/services/forms/update", [admin::class, 'form_name_put']);

   Route::post("/admin/services/forms/delete", [admin::class, 'form_name_delete']);

   Route::get("/admin/services/forms/content", [admin::class, 'form_content']);

   Route::post("/admin/services/forms/content", [admin::class, 'form_content_post']);

   Route::get("/admin/form_submit", [admin::class, 'form_submit']);

   Route::get("/admin/assigned", [admin::class, "assigned_list"]);

   Route::post("/admin/assign", [admin::class, 'assign']);

   Route::get("/admin/working_status", [admin::class, 'working_status_get']);
   Route::post("/admin/working_status", [admin::class, 'working_status_post']);


   Route::get("/admin/royalty_points", [admin::class, 'royalty_points_get']);
   Route::post("/admin/royalty_points", [admin::class, 'royalty_points_post']);


   Route::get("/admin/wallet", [walletController::class, "wallet_all"]);

   Route::get("/admin/wallet/user/{id?}", [walletController::class, "wallet_profile"]);
   Route::get("/admin/wallet/fran/{id?}", [walletController::class, "wallet_profile_fran"]);

   // Route::get("/wallet", [walletController::class, "wallet_get"]);
   Route::post("/wallet", [walletController::class, "wallet_update"]);
   Route::get("/admin/payments", [ExportController::class, "payment"])->name('export.payment');


   Route::get("/admin/coupons", [admin::class, 'coupons_get']);
   Route::post("/admin/coupons", [admin::class, 'coupons_post']);
   Route::post("/admin/coupons/update", [admin::class, 'coupons_put']);
   Route::get("/admin/coupons/delete", [admin::class, 'coupons_delete']);



   Route::get("/leads", [leads::class, 'leads_get']);
   Route::post("/leads", [leads::class, 'leads_post']);
   Route::get("/leads/export", [leads::class, 'export'])->name('export.leads');
   Route::post("/leads/import", [leads::class, 'lead_import'])->name('import.lead');

   Route::get("/leads/filter", [leads::class, 'lead_search'])->name('lead.search');



   Route::get("/blogs", [admin::class, 'blogs_get']);
   Route::get("/blogs/add/{id?}", [admin::class, 'blogs_add']);

   Route::post("blogs/post", [admin::class, "blogs_post"]);

   Route::post("blogs/put", [admin::class, "blogs_put"]);
   Route::get("blogs/delete/{id}", [admin::class, "blogs_delete"])->name('blog.delete');


   Route::get("/admin/users/all", [users::class, "users_get"])->name('user.all');
   Route::get("/admin/users/profile/{id?}", [users::class, "users_profile"]);

   Route::view("/admin/user/create", "add_user");
   Route::post("admin/user/create", [users::class, 'create'])->name('admin.user.create');
   Route::post("admin/user/update", [admin::class, 'user_update']);      // update 
   Route::get("/users/export", [ExportController::class, 'user'])->name('export.users');


   Route::view("/admin/franchise/create", "add_franchise");
   Route::post("/admin/franchise/create", [franchise::class, "post"]);
   Route::get("/admin/franchise/all", [franchise::class, "franchise_get"])->name('franchise.all');
   Route::get("/admin/franchise/profile/{id?}", [franchise::class, "franchise_profile"])->name('fran.profile');
   Route::post("admin/franchise/update", [admin::class, 'franchise_update']);      // update 
   Route::get("admin/franchise/delete/{id}", [franchise::class, 'franchise_delete']);      // update 
   Route::get("/frans/export", [ExportController::class, 'frans'])->name('export.frans');

   Route::post("admin/franchise/allocate", [admin::class, 'franchise_allocate'])->name('admin.franchise.allocate');      // update 


   // refer controller 
   Route::get('/admin/refer', [ReferController::class, 'index'])->name('refer');
   Route::post('/admin/refer', [ReferController::class, 'store'])->name('refer.store');
   Route::get('/admin/refer/{id}', [ReferController::class, 'edit'])->name('refer.edit');
   Route::post('/admin/refer/{id}', [ReferController::class, 'update'])->name('refer.update');



   Route::get("/admin/agents/all", [agents::class, "agent_all"])->name('agent.all');
   Route::get("/admin/agents/create", [agents::class, "agent_get"]);

   Route::get("/admin/agents/edit/{id}", [admin::class, "agent_profile"]);
   Route::post("/admin/agents/edit/{id}", [admin::class, "agent_update"]);

   Route::get("/admin/agents/delete/{id}", [admin::class, "agent_delete"]);

   Route::post("/admin/agents/create", [agents::class, "agent_add"]);
   Route::get("/agents/export", [ExportController::class, 'agent'])->name('export.agents');


   // add franchise page 

   Route::post('/franchise/signup', [franchise::class, 'post']);  //signup


   // admin permitted to delete user 
   Route::get("/users/delete/{id}", [users::class, 'user_delete'])->name('user.delete');
});




//-----------------------users---------------------

Route::get(("/users/login"), [users::class, 'login'])->name('user.login');
Route::post(("/users/login"), [users::class, 'login_post'])->name('user.login');

Route::post("/reset/password", [users::class, 'user_update'])->name('reset.password');


Route::get("/users/signup/{refer?}", [users::class, 'signup_get'])->name('user.create');
Route::post("/users/signup", [users::class, 'signup_post'])->name('user.create');

Route::get("/users/signout", [users::class, 'signout']);

Route::post("/leads/web", [leads::class, 'leads_post']);

Route::view("/order/success", "user.thanku");  //send request for buy service


Route::group(['middleware' => 'users_m'], function () {
   Route::get(("/users/dashboard"), [users::class, 'dashboard'])->name("user.dashboard");
   Route::get(("/users/orders"), [users::class, 'orders'])->name("user.dashboard.orders");
   Route::get(("/users/wallet"), [users::class, 'wallet'])->name("user.dashboard.wallet");
   Route::get(("/users/payment"), [users::class, 'payment'])->name("user.dashboard.payment");
   Route::get(("/users/refer-earn"), [users::class, 'refer_earn'])->name("user.dashboard.refer_earn");

   Route::get(("/users/kyc"), [users::class, 'kyc'])->name("user.kyc.create");
   Route::post(("/users/kyc/create"), [KycController::class, 'create'])->name("user.kyc.upload");
   Route::post(("/users/kyc/update/{id}"), [KycController::class, 'update'])->name("user.kyc.update");



   Route::get(("/users/services"), [users::class, 'services']);

   Route::post("users/update", [users::class, 'user_update'])->name('user.profile.update');

   // wallet 
   Route::post("users/wallet", [walletController::class, 'user_wallet']);

   Route::post("/users/form_submits", [users::class, 'submit_form'])->name("user.form.submit");


   // order place 

   // Route::get('/razorpay-payment', [RazorpayPaymentController::class, 'index']);
   // Route::post('/razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
});
//---------------------end users-----------------------------------


//-----------------------Order---------------------
Route::group(["middleware" =>  "OrderAuth"], function () {

   Route::post("/order", [orders::class, 'order_post']);  //send request for buy service


   Route::post("/coupon/check", [RazorpayPaymentController::class, 'apply_coupon'])->name('coupon.check');


   Route::get('/razorpay-payment', [RazorpayPaymentController::class, 'index']);

   Route::post('/razorpay-payment', [RazorpayPaymentController::class, 'store']);

   // form assigned 
   Route::post("/form/content", [users::class, "forms_content"]);
});



//-----------------------franchise---------------------


Route::get("/franchise", [franchise::class, "login_page"])->name('fran.login');
Route::post('/franchise', [franchise::class, 'login'])->name('fran.login');         //login

Route::post("/franchise/update", [franchise::class, 'frans_update']); // update 

Route::group(["middleware" => "frans_auth"], function () {

   Route::get("/franchise/dashboard", [franchise::class, 'dashboard'])->name('franchise.dashboard');  //dashboard redirectz

   Route::get("/franchise/signout", [franchise::class, 'signout'])->name('franchise.signout');      // signout 

   Route::get(("/franchise/orders"), [franchise::class, 'orders'])->name("franchise.dashboard.orders");
   Route::get(("/franchise/wallet"), [franchise::class, 'wallet'])->name("franchise.dashboard.wallet");
   Route::get(("/franchise/payment"), [franchise::class, 'payment'])->name("franchise.dashboard.payment");
   Route::get("/franchise/leads", [franchise::class, 'leads'])->name("franchise.dashboard.leads");
   Route::get("/franchise/leads/create", [franchise::class, 'lead_create'])->name("franchise.dashboard.leads.create");
   Route::post("/franchise/leads/create", [leads::class, 'leads_post'])->name("franchise.dashboard.leads.create");


   Route::get(("/franchise/kyc"), [franchise::class, 'kyc'])->name("franchise.kyc.create");
   Route::post(("/franchise/kyc/create"), [KycController::class, 'create'])->name("franchise.kyc.upload");
   Route::post(("/franchise/kyc/update/{id}"), [KycController::class, 'update'])->name("franchise.kyc.update");



   Route::post("/franchise/form_submit", [franchise::class, 'submit_form']);

   Route::post("franchise/wallet", [walletController::class, 'user_wallet']);
});



//-----------------------end franchise---------------------










// ----------------------agents----------------------------
Route::get(("/agents"), [agents::class, 'login']);
Route::post(("/agents/login"), [agents::class, 'login_post'])->name('agent.login');
Route::post("/agents/update", [agents::class, 'update']);

Route::group(["middleware" => "agents_auth"], function () {

   Route::get("/agents/dashboard", [agents::class, 'leads_get'])->name('agent.dashboard');  //dashboard redirectz
   Route::get("/agents/leads/all", [agents::class, 'leads_all'])->name("agent.leads");
   Route::post("/agents/leads", [leads::class, 'leads_post']);  //dashboard redirectz

   Route::get(("/agents/kyc"), [KycController::class, 'index'])->name("agents.kyc.upload");
   Route::post(("/agents/kyc"), [KycController::class, 'create'])->name("agents.kyc.upload");
});



// ----------------------end agents----------------------------





Route::post("/hello", [admin::class, 'image']);
