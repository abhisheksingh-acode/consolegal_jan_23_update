@extends('layouts.master')

@section("title","all orders page")


@section('content')
<!--  BEGIN NAVBAR  -->
@include("adminheader")
<!--  END NAVBAR  -->


<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

   <!--  BEGIN SIDEBAR  -->
   @include("adminsidebar")
   <!--  END SIDEBAR  -->

   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">

      <div class="contentl pt-4">
         <h2 class="titl">Assigned Forms</h2>


         <a class="btn btn-info btn-xs" href="/admin/orders">
            <span class="glyphicon glyphicon-edit"></span>Assign New Forms<i class="fa fa-plus pl-3" aria-hidden="true"></i></a>
      </div>

      <div class="allform-page allorder pt-4">


         <table class="table table-striped custab">
            <thead>
               <tr>
                  <th>Order Id</th>
                  <th>Form Name</th>
                  <th>User ID</th>
                  <th>User Name</th>
                  <th>Date & Time</th>
                  <th>Status</th>
               </tr>
            </thead>

            @foreach ($data as $list)
            <tr>
               <td>{{$list->order_id}}</td>
               <td>
                  <a href="/admin/orders/detail?id={{$list->id}}">
                     {{$list->form->name}}
                  </a>

               </td>
               <td>
                  {{$list->user->user_id}}
               </td>
               <td>
                  {{$list->user->name}}
               </td>

               <td>{{$list->created_at}}</td>
               <td class="text-center">
                  @if($list->submitted == 0)
                  Pending
                  @else
                  Submitted
                  @endif
               </td>

            </tr>
            @endforeach

         </table>


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

      let userId = $(this).attr("data-user-id");

      let index = $(this).index();

      let formName = $(".form-name-select").eq(index).val();

      $.ajax({
         url: "/admin/assign",
         type: "post",
         data: {
            id: userId,
            form_name: formName

         },
         success: function(data) {
            console.log("success");

            $(this).removeClass("assign-btn");
            $(this).html('Assigned');

         }
      })



   })
</script>


@endsection