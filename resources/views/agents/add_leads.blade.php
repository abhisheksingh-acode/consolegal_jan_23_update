@extends('layouts.master')

@section("title","add leads")


@section("content")

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
   <div class="sidebar-wrapper sidebar-theme">

      <nav id="sidebar">
         <ul class="list-unstyled menu-categories ps ps--active-y" id="accordionExample">
            <li class="menu">
               <a href="#leads" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  <div class="">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                     </svg>
                     <span>Lead Manager</span>
                  </div>
                  <div>
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                     </svg>
                  </div>
               </a>
               <ul class="collapse submenu list-unstyled" id="leads" data-parent="#accordionExample">
                  <li>
                     <a href="{{route('agent.leads')}}">All Leads</a>
                  </li>
                  <li>
                     <a href="{{route('agent.dashboard')}}">Add Leads </a>
                  </li>
               </ul>
            </li>

         </ul>

      </nav>

   </div>
   <!--  END SIDEBAR  -->

   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">
      <div class="addform-page addorder">
         <h2 class="text-danger text-center">{{Session::get('leadError')}}</h2>
         <h2 class="text-success text-center">{{Session::get('leadSuccess')}}</h2>
         <h2>Add Leads</h2>
         <form action="/agents/leads" method="post">
            @csrf
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
               <label for="status">Status<span class="text-danger">*</span></label>
               <select name="status" class="form-control" id="status" required>
                  <option value="1" selected>Active</option>
                  <option value="0">Inactive</option>
               </select>
            </div>



            <div class="form-group">
               <label for="services">Select Service<span class="text-danger">*</span></label>
               <select name="service_id" id="cars" required>
                  <option value="volvo">Select</option>
                  @foreach ($services as $list)
                  <option value="{{ $list->id}}">{{$list->name}}</option>
                  @endforeach
               </select>
            </div>



            <div class="form-group"><input type="submit" value="Add"></div>
         </form>


      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>


@endsection