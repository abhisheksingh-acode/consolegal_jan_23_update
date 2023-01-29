@extends('layouts.master')

@section("title","add order page")


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
      <!-- <ul class="navbar-nav flex-row ml-auto "> -->
      <!-- <li class="nav-item more-dropdown"> -->
      <!-- <div class="dropdown  custom-dropdown-icon"> -->
      <!-- <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Settings</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a> -->

      <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown"> -->
      <!-- <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Settings</a> -->
      <!-- <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a> -->
      <!-- <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a> -->
      <!-- <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a> -->
      <!-- <a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a> -->
      <!-- </div> -->
      <!-- </div> -->
      <!-- </li> -->
      <!-- </ul> -->
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
         <h2>Add Leads</h2>
         <form action="/leads/import" method="post" enctype="multipart/form-data">
               <div class="custom-file">
                 <input type="file" name="file" class="custom-file-input" id="customFile">
                 <label class="custom-file-label" for="customFile">Choose file</label>
               </div>
            <div class="form-group"><input type="submit" value="Add"></div>

         </form>


         <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
              var fileName = $(this).val().split("\\").pop();
              $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            </script>


         <form action="/leads" method="post">
    <h4 class="text-center text-success">{{Session::get("leadSuccess")}}</h4>
    <h4 class="text-center text-danger">{{Session::get("leadError")}}</h4>
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