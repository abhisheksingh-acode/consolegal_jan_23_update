@extends('layouts.master')

@section("title","Career Forms")


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
         <h2 class="titl">Career Forms</h2>
      </div>

      <div class="allform-page allorder pt-4">

         <div class="row flex-wrap">
            <div class="col-md-2 col-6">
               <div class="dropdown form">
                  <button onclick="myFunction()" class="dropbtn">Filters</button>
                  <div id="myDropdown" class="dropdown-content">
                     <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                     <a href="#about">Products1</a>
                     <a href="#base">Order ID</a>
                     <a href="#blog">Order ID</a>
                     <a href="#contact">Order ID</a>
                     <a href="#custom">Products2</a>
                     <a href="#support">Order ID</a>
                     <a href="#tools">Assigned</a>
                  </div>
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
                  <th>Career Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>City</th>
                  <th>Message</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th class="text-center">Resume</th>
               </tr>
            </thead>

            @foreach ($data as $list)
            <tr>
               <td>{{$list->id}}</td>
               <td>{{$list->name}}</td>
               <td>{{$list->email}}</td>
               <td>{{$list->phone}}</td>
               <td>{{$list->city}}</td>
               <td>{{$list->message}}</td>
               <td>{{$list->category->category_name}}</td>
               <td>{{$list->created_at}}</td>
               <td><a href="{{$list->url()}}" download="{{$list->url()}}" class="btn-sm"><i class="fas fa-download"></i></a></td>
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