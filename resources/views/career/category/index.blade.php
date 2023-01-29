@extends('layouts.master')

@section("title","Career Categories")


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
      <div class="form-group">
         <h4 class="text-success text-center">{{Session::get("success")}}</h4>
         <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
      </div>
      <div class="contentl pt-4">
         <h2 class="titl">Career Categories</h2>
      </div>

      <div class="allform-page allorder pt-4">

         <div class="row flex-wrap">
            

            <div class="col-md-3 col-6">
               <form class="form-inline search-full form-inline search" role="search">
                  <label>Search</label><br>
                  <div class="search-bar">
                     <i class="fa fa-search pl-2" aria-hidden="true"></i><input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                  </div>
               </form>
            </div>
            <div class="col-md-1"></div>

            <div class="col-md-2 col-6">
               <div class="dropdown form">
                  <button onclick="myFunction()" class="dropbtn">Filters</button>
               </div>
            </div>

         </div>



         <table class="table table-striped custab">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Location</th>
                  <th>Date</th>
                  <th>Action</th>
               </tr>
            </thead>

            @foreach ($data as $list)
            <tr>
               <td>{{$list->id}}</td>
               <td>{{$list->category_name}}</td>
               <td class="text-capitalize">{{$list->job_type}}</td>
               <td>{{$list->location}}</td>
               <td>{{$list->created_at}}</td>
               <td>
                  <a href="{{route('career.category.edit',['id' => $list->id])}}" class="btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                  <a href="{{route('career.category.delete',['id' => $list->id])}}" class="btn-sm btn-danger">
                     <i class="fas fa-remove"></i>
                  </a>
               </td>
            </tr>
            @endforeach

         </table>
         {{$data->links()}}
      </div>
   </div>




</div>
<!--  END CONTENT AREA  -->

</div>











<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/datetimepicker.js"></script>

<script type="text/javascript">
   $(document).ready(function() {
      $('#picker').dateTimePicker();
      $('#picker-no-time').dateTimePicker({
         showTime: false,
         dateFormat: 'DD/MM/YYYY',
         title: 'Select Date'
      });
   })
</script>

<script type="text/javascript">
   $(document).ready(function() {
      $('#picker1').dateTimePicker();
      $('#picker-no-time').dateTimePicker({
         showTime: false,
         dateFormat: 'DD/MM/YYYY',
         title: 'Select Date'
      });
   })
</script>


<script>
   // $(document).on("click", ".assign-btn", function() {

   //     let userId = $(this).attr("data-user-id");

   //     // $.ajax({
   //     //     url:"",
   //     //     type:"post",
   //     //     data:{id:userId},
   //     //     success:function(data){
   //     //         console.log("success");
   //     //     }
   //     // })


   //     alert(userId);
   // });

   $(".assign-btn").click(function() {

      let user_id = $(this).attr("data-user-id");
      let fran_id = $(this).attr("data-fran-id");
      let order_id = $(this).attr("data-order-id");

      $(this).html("assigned").css("background", "orange");

      let index = $(this).index();
      
      console.log('index', index, 'this',this);

      let formName = $(".form-name-select").eq(index).val();

      $.ajax({
         url: "/admin/assign",
         type: "post",
         data: {
            id: order_id,
            user_id: user_id,
            fran_id: fran_id,
            form_id: formName

         },
         success: function(data) {
            console.log("success");

            $(this).removeClass("assign-btn");
            $(this).html('Assigned');

            location.reload();

         }
      })



   })
</script>


@endsection