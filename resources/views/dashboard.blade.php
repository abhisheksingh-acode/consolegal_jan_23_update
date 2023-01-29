@extends('layouts.master')

@section("title","dashboard page")


@section('content')
@include("adminheader");


<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

   <!--  BEGIN SIDEBAR  -->
   @include("adminsidebar")
   <!--  END SIDEBAR  -->


   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">
      <div class="dasbpage" style="overflow-x:scroll;">
         <h2>All Leads</h2>
         @if(Session::has('errors'))
           {{Session::get('errors')}}
         @endif
         <div class="text-right d-flex justify-content-end align-items-center">
            <a href="{{route('export.leads')}}" title="export to excel" class="btn btn-info"><i class="fas fa-file-excel"></i></a>
            <form action="{{route('import.lead')}}" onchange="javascript:this.form.submit();" method="post" enctype="multipart/form-data">
            <label for="import" title="import from excel" class="btn btn-danger m-0 mx-2"><i class="fas fa-file-upload"></i>
            <input id="import" type="file" name="file" style="position:fixed;left:1000000px;">
            </label>
            </form>
         </div>
         <div class="allform-page allorder">
         <div class="row flex-wrap">

            <div class="col-md-4 col-6">
                  <label>Search</label><br>
                  <div class="search-bar">
                      @csrf
                     <input type="text" class="form-control query search-form-control  ml-lg-auto" placeholder="Search...">
                  </div>
            </div>

            <div class="col-md-6 col-6">
               <div class="datefrom">
                     <label for="from">From</label><br>
                     <input type="date" class="from" id="" name="birthdaytime">

               </div>
               <div class="dateto">
                        <label for="to">To</label><br>
                        <input type="date" id="" class="to" name="to">
               </div>

            </div>
            
           <div class="col-md-2 col-6">
               <div class="dropdown form">
                  <button onclick="filter()" class="dropbtn">Filters</button>
               </div>
            </div>

         </div>
         <table class="table table-striped custab">
            <thead>
               <tr>
                  <th>Name</th>
                  <th class="nowrap">Email</th>
                  <th>Query</th>
                  <th>Phone No</th>
                  <th>From</th>
                  <th class="nowrap">Service</th>
                  <th class="text-nowrap">Enquiry Date</th>
                  <th class="text-center ">Message</th>
               </tr>
            </thead>
<tbody class="append-data-filter">
            @foreach ($data as $list)
            <tr>
               <td>{{$list->name}}</td>
               <td>{{$list->email}}</td>
               <td>{{$list->message}}</td>
               <td>{{$list->phone}}</td>
               <td class="text-nowrap">
               @if($list->from == 'web')
                  Web
               @elseif($list->from !== 'agents')
               {{$list->fran->user_id}}
               @else
               {{$list->agent->user_id}}
               @endif
               <td>
                  {{$list->service->name}}
               </td>
               <td>{{$list->created_at}}</td>
               <td class="text-center">
                  <input data-toggle="modal" name="{{$list->email}}" onclick="loadEmail(this.name)" data-target="#exampleModal1" type="submit" value="Email">
               </td>

            </tr>
            @endforeach
</tbody>
         </table>
         </div>
         {{$data->links()}}

      </div>

   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

<!-- email modal message  -->
<div class="modal fade" id="exampleModal1" style="z-index: 99999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Send Email</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form>
               @csrf
               <input type="hidden" id="email" name="email">
               <div class="form-group">
                  <label for="exampleInputEmail1">Message</label>
                  <textarea name="compose" id="emailbody" class="form-control"></textarea>
               </div>
               <span class="notify text-success"></span>

            </form>
         </div>
         <div class="modal-footer">
            <button type="reset" onclick="sendEmail()" form="form-email" class="btn btn-primary load">Send</button>
         </div>
      </div>
   </div>
</div>



@endsection

@section('scripts')

<script>
   // put email and phone address to modal form 
   function loadEmail(email) {
      $("#email").val(email);
      $("textarea[name=compose]").val('');
   }

   function loadPhone(phone) {
      $("#phone").val(phone);
      $("textarea[name=sms]").val('');
   }

   // ajax send email and phone 
   function sendEmail() {

      const email = $("#email").val();
      const body = $("textarea[name=compose]").val();

      $.ajax({
         type: "post",
         url: "/email",
         data: {
            email,
            body
         },
         beforeSend: function() {
            $(".load").html('sending...')
         },
         success: function(data) {
            $(".notify").html('sent');
         },
         complete: function() {
            $(".load").html('send')
         },
         error: function() {
            $(".notify").html('failed').addClass("text-danger");
         }
      })
   }

  function filter(){
      let query = $('.query').val()?$('.query').val():'';
      let from = $('.from').val()?$('.from').val():'';
      let to = $('.to').val()?$('.to').val():'';
      
      
      
      $.ajax({
          type:'get',
          url:'/leads/filter',
          data:{
              query,
              from,
              to
          },
          success:function(data){
              console.log(data)
              
              $('.append-data-filter').html(data);
          },
          error:function(err){
              console.log(err)
          },
          complete:function(){
              console.log('complete request');
          }
      })
  }
</script>

@endsection