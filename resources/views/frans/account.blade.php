@extends('layouts.frans')

@section("title","Dashboard Franchise")


@section('content')


<section class="myccount">

   <div class="container-fluid">

      <div class="header row">
         <div class="col-md-3 col-12">
            <div class="rgtitle">
               <a href="/">
                  <img src="{{ asset('user/images')}}/c-logo.jpg" class="logo-icon" alt="logo icon">
               </a>
            </div>
         </div>

         <div class="col-md-3 search-bar flex-grow-1">

         </div>

         <div class="col-md-3 col-4">
            <ul class="hicons">
               <!-- <li><i class="fa fa-th-large" aria-hidden="true"></i></li>
          <li><i class="fa fa-bell-o" aria-hidden="true"></i></li> -->

            </ul>
         </div>

         <div class="col-md-3 col-8 acclog d-flex justify-content-around ">

            <h3><a href="/" class="">Home</a></h3>
            <h3><a class="text-dark" href="/franchise/signout">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                     <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                     <polyline points="16 17 21 12 16 7"></polyline>
                     <line x1="21" y1="12" x2="9" y2="12"></line>
                  </svg> Sign Out</a>
            </h3>

         </div>
      </div>




      <div class="row">
         <div class="col-md-2 p-0">
            <div class="rightside">
               <nav class="nav-sidebar">
                  <ul class="nav tabs">
                     <li class="active"><i class="fa fa-user" aria-hidden="true"></i><a href="#tab1" data-toggle="tab">Account Details</a></li>
                     <li class=""><i class="fa fa-shopping-basket" aria-hidden="true"></i><a href="#tab2" data-toggle="tab">Order</a></li>
                     <li class=""><i class="fa fa-google-wallet" aria-hidden="true"></i><a href="#tab3" data-toggle="tab">Wallet</a></li>
                     <li class=""><i class="fa fa-money-bill-wave-alt" aria-hidden="true"></i><a href="#tab4" data-toggle="tab">Online Payments</a></li>
                     <li class=""><i class="fa fa-share-square" aria-hidden="true"></i><a href="#tab5" data-toggle="tab">Add Leads</a></li>
                  </ul>
               </nav>


            </div>

         </div>



         <div class="col-md-10">

            <div class="tab-content box-shd">

               <!-- ACCOUNT DETAILS START -->
               <div class="tab-pane active text-style" id="tab1">
                  <form class="login-form" id="profile-form" action="/franchise/update" method="post">
                     @csrf
                     <div class="row rightcol">
                        <!-- name -->
                        <div class="col-md-12">
                           <h3 class="rtext">Personal Information</h3>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group position-relative">
                              <label>Name<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" placeholder="FullName" name="name" required="" value="{{ session()->get('frans')->name}}">
                           </div>
                        </div>
                        <!-- email -->
                        <div class="col-md-12">
                           <div class="form-group position-relative">
                              <label>Email Address<span class="text-danger">*</span></label>
                              <input type="email" class="form-control" placeholder="EmailAddress" value="{{ session()->get('frans')->email}}" name="email" required="">
                           </div>
                        </div>




                        <!-- mobile -->
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Mobile Number<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" placeholder="Phone" value="{{ session()->get('frans')->phone}}" name="Phone" required="">
                           </div>
                        </div>
                        <!-- company -->
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Company Name<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" placeholder="Company Name" value="{{ session()->get('frans')->company_name}}" name="company" required="">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>GSTIN<span class="text-secondary">(optional)</span></label>
                              <input type="text" class="form-control" placeholder="GSTIN" value="{{ session()->get('frans')->gst}}" name="gst" >
                           </div>
                        </div>

                        <div class="col-lg-12">
                           <div class="form-group">
                              <label>Change Password <span class="text-danger">*</span></label>
                              <input type="password" name="password" class="form-control" placeholder="Change Password">
                           </div>
                        </div>

                        <div class="col-lg-12">
                           <div class="form-group">
                              <a type="submit" class="btn btn-info btn-xs" id="update-btn">
                                 <button type="submit" class="btn btn-sm text-white">Update</button>
                              </a>
                              <!-- <button onclick="document.getElementById('id01').style.display='block'" class="" style="width:auto;">Forgot Password</button> -->
                           </div>

                        </div>
                     </div>
                  </form>
               </div>
               <!-- ACCOUNT DETAILS END -->


               <!-- ORDERS DETAILS START -->
               <div class="tab-pane text-style" id="tab2">
                  <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Pending Order</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Complete Order</a>
                     </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div id="home" class="container tab-pane active"><br>
                        <table class="table table-striped custab">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Product Name</th>
                                 <th>Date & Time</th>
                                 <th>Payment</th>
                                 <th>Amount</th>
                                 <th class="text-center">Assigned Form</th>
                              </tr>
                           </thead>
                           @foreach ($pending as $order)
                           <tr>
                              <td>{{$order->id}}</td>
                              <td>
                                 @foreach($services as $service)
                                 @if( $service->id == $order->service_id)
                                 <a href="/reciept/{{$order->id}}">{{$service->name}}</a>
                                 @endif
                                 @endforeach
                              </td>
                              <td>{{$order->created_at}}</td>
                              <td>Paid</td>

                              <td>
                                 @foreach($services as $service)
                                 @if( $service->id == $order->service_id)
                                 ₹{{$service->f_price}}
                                 @endif
                                 @endforeach
                              </td>

                              <td class="text-center">
                                 <!-- in case assign or reassign  -->
                                 @if($order->form_submitted == 0 || $order->form_submitted == 3)
                                 @foreach ($assigns as $assign)
                                 @if($assign->order_id == $order->id)
                                 @foreach ($form as $name)
                                 @if($assign->form_name_id == $name->id)
                                 <a class='btn btn-info btn-xs submit-form-btn' data-order-id="{{$order->id}}" data-form-id="{{$name->id}}" data-toggle="modal" data-target="#exampleModal1" href="#">
                                    Submit Your Form
                                 </a>
                                 @endif
                                 @endforeach
                                 @endif
                                 @endforeach
                                 @endif

                                 <!-- process  -->
                                 @if($order->form_submitted == 1)
                                 <a class="btn btn-warning text-white">Pending</a>
                                 @endif
                                 @if($order->form_submitted == 2)
                                 <a class="btn btn-warning text-white">Approved</a>
                                 @endif
                              </td>


                           </tr>
                           @endforeach

                        </table>
                        {{$pending->links()}}

                     </div>


                     <div id="menu1" class="container tab-pane fade">

                        <table class="table table-striped custab">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Product Name</th>
                                 <th>Date & Time</th>
                                 <th>Payment</th>
                                 <th>Amount</th>
                                 <th class="text-center">Status</th>
                              </tr>
                           </thead>
                           @foreach ($complete as $order)
                           <tr>
                              <td>{{$order->id}}</td>
                              <td>
                                 @foreach($services as $service)
                                 @if( $service->id == $order->service_id)
                                 <a href="/reciept/{{$order->id}}">{{$service->name}}</a>
                                 @endif
                                 @endforeach
                              </td>
                              <td>{{$order->created_at}}</td>
                              <td>Paid</td>
                              <td>@foreach($services as $service)
                                 @if( $service->id == $order->service_id)
                                 {{$service->f_price}}
                                 @endif
                                 @endforeach
                              </td>
                              <td class="text-center" id="file-btn">Download<br>
                                 <a href="/download/customer/{{$order->id}}"><i class="fa fa-download"></i></a>
                                 <br>
                              </td>
                           </tr>
                           @endforeach

                        </table>
                        {{$complete->links()}}


                     </div>

                  </div>
               </div>
               <!-- ORDERS DETAILS END -->


               <!--wallet start -->
               <div class="tab-pane text-style" id="tab3">

                  <div class="container">
                     <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                           <div class="wallet">
                              <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                              <h5>Total Coin</h5>
                              <h6>{{$total}}</h6>
                           </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                           <div class="wallet">
                              <i class="fa fa-google-wallet" aria-hidden="true"></i>
                              <h5>Redeemed Coin</h5>
                              <h6>{{$redeem}}</h6>
                           </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                           <div class="wallet">
                              <i class="fa fa-money" aria-hidden="true"></i>
                              <h5>Available Coin</h5>
                              <h6>{{$wallet->amount}}</h6>
                           </div>
                        </div>
                     </div>
                  </div>

                  <table class="table table-striped custab">
                     <thead>
                        <tr>
                           <th>Order ID</th>
                           <th>Date</th>
                           <th>Type</th>
                           <th>Entry</th>
                           <th>Amount</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($history as $list)
                        <tr>
                           <td>{{$list->id}}</td>
                           <td>{{$list->created_at}}</td>
                           <td style="text-transform: capitalize;">{{$list->amount_type}}</td>
                           <td style="text-transform: capitalize;">
                              @if($list->entry == "debit")
                              <span class="text-danger">debit</span>
                              @else
                              <span class="text-success">credit</span>
                              @endif
                           </td>
                           <td>
                              @if($list->entry == "debit")
                              <span class="text-danger">- ₹{{$list->amount}}</span>
                              @else
                              <span class="text-success">+ ₹{{$list->amount}}</span>
                              @endif
                           </td>
                        </tr>
                        @endforeach

                     </tbody>
                  </table>
                  {{$history->links()}}

               </div>
               <!--wallet end -->

               <!--payment start -->
               <div class="tab-pane text-style" id="tab4">
                  <h4 class="text-muted">Online Payments History</h4>

                  <table class="table table-striped custab">
                     <thead>
                        <tr>
                           <th>Order ID</th>
                           <th>Date</th>
                           <th>Payment Id</th>
                           <th>Amount</th>
                           <th>Service</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($pay_history as $pay)
                        <tr>
                           <td>{{$pay->id}}</td>
                           <td>{{$pay->created_at}}</td>
                           <td style="text-transform: capitalize;">{{$pay->r_payment_id}}</td>
                           <td style="text-transform: capitalize;">
                              ₹{{$pay->amount}}
                           </td>
                           <td>
                              @foreach($services as $prod)
                              @if($prod->id == $pay->product_id)
                                 {{$prod->name}}
                                 @endif
                              @endforeach
                           </td>
                           <td>
                           </td>
                        </tr>
                        @endforeach

                     </tbody>
                  </table>
                  {{$pay_history->links()}}
               </div>
               <!--payment end -->


               <!--leads add start -->
               <div class="tab-pane text-style" id="tab5">
                  <div class="container">
                     <div id="content" class="main-content">
                        <div class="addform-page addorder">
                           <h2>Add Leads</h2>
                           <form action="/franchise/leads" method="post">
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
                                 <label for="services" class="form-label">Select Service<span class="text-danger">*</span></label>
                                 <select name="service_id" id="cars" class="form-control" required>
                                    <option value="volvo">Select</option>
                                    @foreach ($services as $list)
                                    <option value="{{ $list->id}}">{{$list->name}}</option>
                                    @endforeach
                                 </select>
                              </div>



                              <div class="form-group"><input type="submit" value="Add" class="btn btn-warning px-4"></div>
                           </form>


                        </div>




                     </div>
                  </div>
               </div>
            </div>

         </div>
         <!--refer end -->



      </div>

   </div>


   </div>

   </div>


</section>



<!-- add new field -->
<div class="modal fade" id="exampleModal1" style="z-index: 99999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Assigned</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form class="" id="form-field" action="/franchise/form_submit" method="post" enctype="multipart/form-data">
               <!-- @csrf -->

               <input type="hidden" name="form_id" id="form-id" value="">
               <input type="hidden" name="assign_id" id="assign-id" value="">
               <input type="hidden" name="order_id" id="order-id" value="">


               <div id="form-group-container">

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



<script>
   // Get the modal
   var modal = document.getElementById('id01');

   // When the user clicks anywhere outside of the modal, close it
   window.onclick = function(event) {
      if (event.target == modal) {
         modal.style.display = "none";
      }
   }
</script>

<script>
   $(document).on("click", ".submit-form-btn", function() {
      let echo = $(this).attr("data-form-id");
      let order_id = $(this).attr("data-order-id");

      $.ajax({
         url: "/form/content",
         type: "post",
         data: {
            id: echo

         },
         success: function(data) {


            $("#form-id").attr('value', data.id);
            $("#assign-id").attr('value', data.assign_id);
            $("#order-id").attr('value', order_id);


            let content = '';

            data.data.forEach((index) => {
               content += `<div class="form-group">
              <label for="" class="form-label">${index.form_content}</label>
              <input type="${index.type}" name="${index.form_content}" ${index.required == 1 ? "required":""} class="form-control">
            </div>`;

            })

            $("#form-group-container").html(content);
         }
      })
   })
</script>


<script>
   // $(document).on("submit", "#form-field", function(e) {
   //   e.preventDefault();

   //   let formData = $(this).serialize();

   //   $.ajax({
   //     url: "/user/form_submit",
   //     type: "post",
   //     data: formData,
   //     enctype: 'multipart/form-data',
   //     processData: false,
   //     contentType: false,
   //     success: function(data) {
   //       // location.reload()
   //     }
   //   })
   // })
</script>



@endsection