@extends('layouts.master')

@section("title","all orders page")


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

      <div class="contentl pt-4">
         <h2 class="titl">All Orders</h2>

<div class="row">
   <div class="col-6">
      <a class="btn btn-info btn-xs" href="/admin/orders/add">
         <span class="glyphicon glyphicon-edit"></span>Add New Order<i class="fa fa-plus pl-3" aria-hidden="true"></i></a>
   </div>
   <div class="col-6">
      <div class="text-right">
         <a href="{{route('export.orders')}}" title="export to excel" class="btn btn-info"><i class="fas fa-file-excel"></i></a>
      </div>
   </div>


</div>
      </div>

      <div class="allform-page allorder pt-4">

         <div class="row flex-wrap">
            <div class="col-md-2 col-6">
               <div class="dropdown form">
                  <button onclick="myFunction()" class="dropbtn">Filters</button>
               </div>
            </div>


            <div class="col-md-6 col-6">
               <div class="datefrom">
                  <form action="/action_page.php">
                     <label for="from">From</label><br>
                     <input type="datetime-local" id="birthdaytime" name="birthdaytime">

                  </form>
               </div>

               <div class="dateto">
                     <form action="/action_page.php">
                        <label for="to">To</label><br>
                        <input type="datetime-local" id="birthdaytime" name="birthdaytime">

                     </form>
               </div>

            </div>


            <div class="col-md-3 col-6">
               <form class="form-inline search-full form-inline search" role="search">
                  <label>Search</label><br>
                  <div class="search-bar">
                     <i class="fa fa-search" aria-hidden="true"></i><input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                  </div>
               </form>
            </div>



         </div>


         <table class="table table-striped custab">
            <thead>
               <tr>
                  <th>Order Id</th>
                  <th>Client Name</th>
                  <th>Ordered Products Name</th>
                  <th>Date & Time</th>
                  <th>Select Form</th>
                  <th>Assigned Form</th>
                  <th class="text-center"> Form Assign</th>
               </tr>
            </thead>

            @foreach ($data as $list)
            <tr>
               <td>{{$list->id}}</td>
               <td>
                  @foreach ($users as $user)
                  @if ($list->user_id == $user->id && $list->user_id != null)
                  <a href="/admin/users/profile?id={{$list->user_id}}">{{$user->name}}</a>
                  @endif
                  @endforeach
                  @foreach ($frans as $fran)
                  @if ($list->fran_id == $fran->id && $list->fran_id != null)
                  <a href="/admin/franchise/profile?id={{$list->fran_id}}">{{$fran->name}}</a>
                  @endif
                  @endforeach
               </td>
               <td>
                  @foreach ($services as $service)
                  @if ($list->service_id == $service->id)
                  <a href="/admin/orders/view/{{$list->id}}">{{$service->name}}</a>
                  @endif
                  @endforeach
               </td>
               <td>{{$list->created_at}}</td>
               <td class="text-center">
                  <div class="form-group">
                     <select class="form-control btn btn-info form-name-select" name="form_id" id="exampleFormControlSelect1">
                        @foreach ($forms as $form)
                        @if($form->service_id == $list->service_id)
                        <option value="{{$form->id}}">{{$form->name}}</option>
                        @endif
                        @endforeach
                     </select>
                  </div>
               </td>
               <td class="text-center">
                  <div class="form-group">
                     <select class="form-control btn btn-info form-name-select" name="assigned_forms" id="exampleFormControlSelect1">
                        @foreach ($assigned as $assign)
                        @if ($list->id == $assign->order_id)
                        @foreach($forms as $form)
                        @if($form->id == $assign->form_name_id)
                        <option value="">{{$form->name}}</option>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        <!-- if not available  -->


                     </select>
                  </div>
               </td>

               <td class="text-center"><a class="btn btn-info btn-xs assign-btn" data-user-id="{{$list->user_id}}" data-fran-id="{{$list->fran_id}}" data-order-id=" {{$list->id}}">
                     <span class="glyphicon glyphicon-edit"></span>Assign</a>
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