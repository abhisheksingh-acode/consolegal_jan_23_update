@extends('layouts.master')

@section("title","add new franchise")



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

<div class="main-container" id="container">

   @include("adminsidebar")
   <div id="content" class="main-content">
      <div class="addform-page addorder">
         <h2>Add Franchise</h2>
         <form action="/admin/franchise/create" method="post">
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
            </div>
            <div class="form-group">
               <label>Name<span class="text-danger">*</span></label>
               <input type="text" class="form-control" placeholder="Client Name" name="name" required="">
            </div>

            <div class="form-group">
               <label>Mobile Number<span class="text-danger">*</span></label>
               <input type="text" class="form-control" placeholder="Mobile Number" name="phone" required="">
            </div>

            <div class="form-group">
               <label>Email Address<span class="text-danger">*</span></label>
               <input type="email" class="form-control" placeholder="EmailAddress" name="email" required="">
            </div>

            <div class="form-group">
               <label>Company</label>
               <input type="text" class="form-control" placeholder="Company" name="company_name" >
            </div>
            <div class="form-group">
               <label>GSTIN</label>
               <input type="text" class="form-control" placeholder="GSTIN" name="gst" >
            </div>

            <div class="form-group">
               <label>Enter Password<span class="text-danger">*</span></label>
               <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>


            <div class="form-group"><input type="submit" value="Create"></div>
         </form>


      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection