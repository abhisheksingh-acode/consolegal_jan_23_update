@extends('layouts.master')

@section("title","add form page")


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
      <div class="allform-page mangserv">

         <h2>Manage Services</h2>

         <a class="btn btn-info btn-xs" href="/admin/services">
            <span class="glyphicon glyphicon-edit"></span>Add New Services<i class="fa fa-plus pl-3" aria-hidden="true"></i></a>
         </a>

         <table class="table table-striped custab">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Service Name</th>
                  <th>Price</th>
                  <th>Franchise Price</th>
                  <th>points</th>
                  <th class="text-center">Action</th>
               </tr>
            </thead>
            <tbody>
               @php($nos = 0)
               @foreach ($data as $list)
               @php($nos++)
               <tr>
                  <td>{{$nos}}</td>
                  <td>{{$list->name}}</td>
                  <td>{{$list->price}}</td>
                  <td>{{$list->f_price}}</td>
                  <td>{{$list->points}}</td>
                  <td class="text-center">
                     <a href="/admin/services/edit/{{$list->id}}" class="edit-service" aria-hidden="true" data-service-id="{{$list->id}}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                     </a>
                     <a href="#" class="delete-service" data-service-id="{{$list->id}}">
                        <i class="fa fa-trash " aria-hidden="true"></i>
                     </a>
                  </td>

               </tr>
               @endforeach
            </tbody>
         </table>
         {{$data->links()}}
      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>



<div class="modal fade" id="exampleModal" style="z-index: 99999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form class="" id="form-service">
               <!-- @csrf -->

               <input type="hidden" name="id">

               <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Points</label>
                  <input type="text" name="points" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
               </div>
               <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <input type="text" name="status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div> -->


               <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </form>
         </div>
         <div class="modal-footer">
            <button type="submit" form="form-service" class="btn btn-primary">Save</button>
         </div>
      </div>
   </div>
</div>






<script>
   $(document).on("click", ".edit-service", function(e) {
      let formData = $(this).attr("data-service-id");

      $.ajax({
         url: "/admin/services/edit",
         type: "post",
         data: {
            id: formData
         },
         success: function(data) {

            $("[name=id]").attr('value', data.id);

            $("[name=name]").attr('value', data.name);

            $("[name=price]").attr('value', data.price);
            $("[name=points]").attr('value', data.points);
            $("[name=status]").attr('value', data.status);

            console.log(data);

         },
         error: function() {
            console.log("failed to send ");
         }
      })
   });


   $(document).on("click", ".delete-service", function(e) {
      let formId = $(this).attr("data-service-id");

      let stat = confirm("Are you sure want to delete");

      if (stat) {
         $.ajax({
            url: "/admin/services/remove",
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


   $(document).on("submit", "#form-service", function(e) {
      e.preventDefault();

      let formData = $(this).serialize();

      $.ajax({
         url: "/admin/services/put",
         type: "post",
         data: formData,
         success: function(data) {
            console.log("success");
         },
         complete: function() {
            location.reload();
         }
      })
   })
</script>

@endsection