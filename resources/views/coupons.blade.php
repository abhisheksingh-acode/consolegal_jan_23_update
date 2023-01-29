@extends('layouts.master')

@section("title","coupons")


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
      <div class="allform-page addservice">
         <h2 class="pb-4">Coupons</h2>

         <a class="btn btn-info btn-xs text-white" data-toggle="modal" data-target="#exampleModal1">
            <span class="glyphicon glyphicon-edit"></span>Add New Coupon<i class="fa fa-plus pl-3" aria-hidden="true"></i></a>
         </a>
         <h6 class="text-center text-success">{{Session::get("delete")}}</h6>
         <table class="table table-striped custab">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Code</th>
                  <th>Type</th>
                  <th>Method</th>
                  <th>Amount</th>
                  <th>Redeem Count</th>
                  <th>Service</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            @foreach ($data as $list)
            <tr>
               <td>{{$list->name}}</td>
               <td>{{$list->code}}</td>
               <td>{{$list->type}}</td>
               <td>{{$list->method}}</td>
               <td>{{$list->amount}}</td>
               <td>{{$list->redeem_count}}</td>
               <td>
                  @php($item = explode(',',$list->service_id))
                  @foreach($item as $item)
                  <ul class="list-unstyled">
                     @foreach($services as $service)
                     @if($service->id == $item)
                     <li>{{$service->name}}</li>
                     @endif
                     @endforeach
                  </ul>
                  @endforeach
               </td>
               <td>{{$list->status}}</td>
               <td class="text-center"><a href="/admin/coupons/delete?id={{$list->id}}" class="text-danger"><i class="fas fa-remove text-danger fa-2x"></i></a></td>

            </tr>
            @endforeach

         </table>

      </div>

   </div>
</div>
<!--  END CONTENT AREA  -->

</div>


<!-- add new field -->
<div class="modal fade" id="exampleModal1" style="z-index: 99999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form class="" id="form-field" action="/admin/coupons" method="post">
               @csrf

               <div class="form-group">
                  <label for="exampleInputEmail1">Coupon Name<span class="text-danger">*</span></label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Coupon Code<span class="text-danger">*</span></label>
                  <input type="text" name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Coupon Type<span class="text-danger">*</span></label>
                  <select name="type" id="" class="form-control" required>
                     <option value="discount">Discount</option>
                     <option value="cashback">Cashback</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Method<span class="text-danger">*</span></label>
                  <select name="method" id="" class="form-control" required>
                     <option value="flat">Flat</option>
                     <option value="percent">Percent</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Amount<span class="text-danger">*</span></label>
                  <input type="text" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               </div>

               <div class="form-group">
                  <label for="service">Service<span class="text-danger">*</span>
                     <span class="text-danger"><small>(ctrl+select for multiple service)</small></span>
                  </label>
                  <select name="service_id[]" id="service" multiple required class="form-control">
                     @foreach ($services as $list)
                     <option value="{{$list->id}}">{{$list->name}}</option>
                     @endforeach
                  </select>


               </div>


               <div class="form-group">
                  <label for="exampleFormControlSelect1">Status<span class="text-danger">*</span></label>
                  <select class="form-control" name="status" id="exampleFormControlSelect1" required>
                     <option value="1">true</option>
                     <option value="0">false</option>
                  </select>
               </div>
               <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </form>
         </div>
         <div class="modal-footer">
            <button type="submit" form="form-field" class="btn btn-primary">Save</button>
         </div>
      </div>
   </div>
</div>


@endsection