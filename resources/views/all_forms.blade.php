@extends('layouts.master')

@section("title","all forms page")


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
      <div class="allform-page">
         <h2>View All Forms</h2>

         <div class="addbtn pb-4">
            <a class="btn btn-info btn-xs" href="/admin/services/forms/add">
               <span class="glyphicon glyphicon-edit"></span> Manage Form<i class="fa fa-plus pl-3" aria-hidden="true"></i></a>
         </div>

         <table class="table table-striped custab">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Form Name</th>
                  <th>Service Name</th>
                  <th>Created Date</th>
                  <th class="text-center">Action</th>
               </tr>
            </thead>

            @php($nos = 1)
            @foreach ($forms as $list)
            @php($nos++)

            <tr>
               <td>{{$nos}}</td>
               <td>{{$list->name}}</td>
               <td>
                  @foreach ($services as $item)
                  @if ($list->service_id == $item->id)
                  {{$item->name}}
                  @endif
                  @endforeach
               </td>
               <td>{{$list->created_at}}</td>
               <td class="text-center"><a class="edit-form" data-form-id="{{$list->id}}">
                     <i class="fa fa-pencil" type="button" data-toggle="modal" data-target="#exampleModal" aria-hidden="true"></i></a>
                  <a href="#" class="delete-form text-danger" data-form-id="{{$list->id}}">
                     <i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
               </td>
            </tr>
            @endforeach

         </table>


      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>


<div class="modal fade" id="exampleModal" style="z-index: 99999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form class="" action="/admin/services/forms/update" method="post" id="form-name">
               @csrf

               <input type="hidden" name="id">

               <div class="form-group">
                  <label for="exampleInputEmail1">Form Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
               </div>

               <div class="form-group">
                  <label for="exampleFormControlSelect1">Select Service</label>
                  <select class="form-control" name="service_id" id="exampleFormControlSelect1">
                     @foreach ($services as $list)
                     <option value="{{$list->id}}">{{$list->name}}</option>
                     @endforeach
                  </select>
               </div>
               <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </form>
         </div>
         <div class="modal-footer">
            <button type="submit" form="form-name" class="btn btn-primary">Save</button>
         </div>
      </div>
   </div>
</div>



<!-- JS FILES -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




<script>
   $(document).on("click", ".edit-form", function(e) {
      let formData = $(this).attr("data-form-id");

      $.ajax({
         url: "/admin/services/forms/edit",
         type: "post",
         data: {
            id: formData
         },
         success: function(data) {

            $("[name=id]").attr('value', data.form.id);

            $("[name=name]").attr('value', data.form.name);

            $("[name=service_id]").attr('value', data.service.id);

            console.log(data);

         }
      })
   });


   $(document).on("click", ".delete-form", function(e) {

      let check = confirm("Are you sure want to delete?");
      let formId = $(this).attr("data-form-id");

      if (check) {
         $.ajax({
            url: "/admin/services/forms/delete",
            type: "post",
            data: {
               id: formId
            },
            success: function(data) {
               location.reload();
            }
         })
      }
   })
</script>
@endsection