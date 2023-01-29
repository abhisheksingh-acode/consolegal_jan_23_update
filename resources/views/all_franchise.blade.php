@extends('layouts.master')

@section('title','All franchise')
@section('content')
<!--  BEGIN NAVBAR  -->
@include('adminheader')
<!--  END NAVBAR  -->


<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

   <div class="overlay"></div>
   <div class="search-overlay"></div>

   <!--  BEGIN SIDEBAR  -->
   @include('adminsidebar')
   <!--  END SIDEBAR  -->

   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content wallet">

      <div class="user" id="navbarscroll">
         <h2>All Franchise</h2>
         <div class="row d-flex justify-content-between align-items-center">   
            <div class="col-10">
                  <form class="d-flex justify-content-between align-items-center py-2" action="{{route("franchise.all")}}">
                <input class="form-control" value="{{request()->key??''}}" name="key" placeholder="search by id, name, email, phone" required="" />

                <button type="submit" class="btn-sm btn-warning mx-4">Go</button>
            </form>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('export.frans')}}" title="export to excel" class="btn btn-info"><i class="fas fa-file-excel"></i></a>
            </div>              
        </div>
         <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
            </div>
         <table class="table table-striped custab">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Fran Name</th>
                  <th>Email Address</th>
                  <th>Phone No.</th>
                  <th>Company</th>
                  <th class="text-center">Action</th>
               </tr>
            </thead>
            <tbody>
               @php($nos = 0)
               @foreach ($user as $list)
               @php($nos++)
               <tr>
                  <td>{{$list->user_id}}</td>
                  <td><a href="/admin/franchise/profile?id={{$list->id}}">{{$list->name}}</a></td>
                  <td>{{$list->email}}</td>
                  <td>{{$list->phone}}</td>
                  <td>{{$list->company_name}}</td>
                  <td class="text-center">
                     <a href="/admin/franchise/profile?id={{$list->id}}">
                        <i class="fa fa-pencil" aria-hidden="true"></i> 
                     </a>
                     <a href="#" onclick="deleteUser({{$list->id}})">
                         <i class="fa fa-trash" aria-hidden="true"></i> 
                     </a>
                     <a href="#" onclick="allocateMoneyModal({{$list->id}})">
                         <i class="fa fa-rupee" aria-hidden="true"></i> 
                     </a>
                  </td>

               </tr>
               @endforeach

            </tbody>
         </table>
         {{$user->links()}}


      </div>



 






   </div>
   <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->



 <!-- Allocate Money Modal -->
 <div class="modal fade" id="allocateModal" style="z-index: 9999999;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title fs-5" id="exampleModalLabel">Allocate Credit</h1>
         <button type="button" onclick="hideModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times text-dark"></i></button>
       </div>
       <div class="modal-body">
         <form action="" method="POST" id="allocateform">
            @csrf

            <input type="hidden" name="id" id="id">
            <div class="mb-3">
               <label for="id" class="form-label">Franchise ID</label>
               <input type="text" id="user_id" class="form-control" readonly disabled />
            </div>
            <div class="mb-3">
               <label for="name" class="form-label">Franchise Name</label>
               <input type="text" id="name" class="form-control" readonly disabled />
            </div>
         
            <div class="mb-3">
               <label for="amount" class="form-label">Amount</label>
               <input type="number" id="amount" name="amount" class="form-control" required />
            </div>
         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" onclick="hideModal()" data-bs-dismiss="modal">Cancel</button>
         <button type="submit" form="allocateform" class="btn btn-primary">Credit</button>
       </div>
     </div>
   </div>
 </div>

@push('scripts')
    
<script>
    function deleteUser(id){
       let sure = confirm('Are your sure, want to delete.');
        
        if(sure){
            location.href = `/admin/franchise/delete/${id}`;
        }
    }
    function hideModal(){
        $("#allocateModal").modal("hide")
    }
    function allocateMoneyModal(id){

      $.ajax({
         type:"get",
         url:`{{route("fran.profile")}}`,
         data:{id},
         success:function(data){
            console.log(data);

            $("#allocateModal #user_id").attr("placeholder",data.user.user_id)
            $("#allocateModal #id").val(data.user.id)
            $("#allocateModal #name").val(data.user.name)

         },
         error:function(err){
            console.log(err);
         }
      })

        $("#allocateModal").modal("show")
    }
    

    $(document).on("submit","#allocateform", function(e){         
         e.preventDefault();

      let formData = $(this).serialize();

      const confirmation = confirm('Please confirm to proceed.')

      if(!confirmation){
         return
      }

      $.ajax({
         type:"post",
         url:"{{route('admin.franchise.allocate')}}",
         data:formData,
         success:function(data){
            console.log(data);
            hideModal();

            $("#allocateModal #amount").val("")

            alert(data.msg)
         },
         error:function(err){
            console.log(err);
         }
      })
    })
</script>
@endpush


@endsection