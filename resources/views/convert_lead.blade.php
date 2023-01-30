@extends('layouts.master')

@section("title","add order page")



@section('content')
<!--  BEGIN NAVBAR  -->
@include("adminheader")
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
   <header class="header navbar navbar-expand-sm">
      <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
         </svg></a>

      <ul class="navbar-nav flex-row">
         <li>
            <div class="page-header">

               <nav class="breadcrumb-one" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                     <!-- <li class="breadcrumb-item active" aria-current="page"><span>Sales</span></li> -->
                  </ol>
               </nav>

            </div>
         </li>
      </ul>
   </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

   <!--  BEGIN SIDEBAR  -->
   @include("adminsidebar")
   <!--  END SIDEBAR  -->

   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">
      <div class="addform-page addorder">
         <h2>Add Orders</h2>
         <form action="{{route('admin.order.create')}}" method="post">
            <div class="form-group">
               <h6 class="text-success">{{Session::get("success")}}</h6>
            </div>
            <div class="form-group">
               <label>Client Name<span class="text-danger">*</span></label>
               <input type="text" value="{{old("name")??$user->name}}" class="form-control" placeholder="Client Name" name="name" required="">
            </div>

            <div class="form-group">
               <label>Mobile Number<span class="text-danger">*</span></label>
               <input type="text" value="{{old("phone")??$user->phone}}" class="form-control" placeholder="Mobile Number" name="phone" required="">
            </div>

            <div class="form-group">
               <label>Email Address<span class="text-danger">*</span></label>
               <input type="email" value="{{old("email")??$user->email}}" class="form-control" placeholder="EmailAddress" name="email" required="">
            </div>

            <div class="form-group">
               <label>Company</label>
               <input type="text" value="{{old("company")??$user->company}}" class="form-control" placeholder="Company" name="company" />
            </div>
            <div class="form-group">
               <label>GSTIN</label>
               <input type="text" value="{{old("gst")??$user->gst}}" class="form-control" placeholder="GSTIN" name="gst" />
            </div>

            <div class="form-group">
               <label for="cars">Select Service<span class="text-danger">*</span></label>
               <select name="service_id" id="service_id" class="form-control" required>
                  @foreach ($services as $list)
                  <option value="{{$list->id}}" {{$list->id == $user->service_id??"selected"}}>{{$list->name}}</option>
                  @endforeach
               </select>
            </div>
            
            <div class="form-group">
               <label for="payment_mode">Payment Mode<span class="text-danger">*</span></label>
               <select name="payment_mode" id="payment_mode" class="form-control" required>
                  <option value="cash">Cash</option>
                  <option value="upi">UPI</option>
                  <option value="other}">Other</option>
               </select>
            </div>

            <div class="form-group">
               <label>Payment Refference ID. (If Not Cash)</label>
               <input type="text" name="payment_id" class="form-control" placeholder="Refference Id">
            </div>

            <div class="form-group">
               <label>Enter Password (If Not Registered)</label>
               <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
               <h6 class="text-danger">{{Session::get("password")}}</h6>
            </div>


            <div class="form-group"><input type="submit" value="Create"></div>
         </form>


      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection