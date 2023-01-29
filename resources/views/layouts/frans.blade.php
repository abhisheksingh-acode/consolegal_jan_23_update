<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="format-detection" content="telephone=no">

   <title>@yield('title')</title>


   <!-- CSS FILES -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="{{ asset('user/css')}}/bootstrap.min.css">
   <link rel="stylesheet" href="{{ asset('user/css')}}/style.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('user/css')}}/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('user/css')}}/fonts.css" />
   <script src="{{ asset('user/js')}}/jquery.min.js"></script>
   <script src="{{ asset('user/js')}}/bootstrap.min.js"></script>
</head>

<body>


   

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
         </ul>
       </div>
 
       <div class="col-md-3 col-8 acclog d-flex justify-content-around ">
 
         <h3><a href="/" class="">Home</a></h3>
         <h3><a class="text-dark" href="{{route('franchise.signout')}}">
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
               <li class="active"><i class="fa fa-user" aria-hidden="true"></i><a href="{{route('franchise.dashboard')}}">Account Details</a></li>
               <li class=""><i class="fa fa-shopping-basket" aria-hidden="true"></i><a href="{{route('franchise.dashboard.orders')}}">Order</a></li>
               <li class=""><i class="fa fa-google-wallet" aria-hidden="true"></i><a href="{{route('franchise.dashboard.wallet')}}">Wallet</a></li>
               <li class=""><i class="fa fa-money-bill-wave-alt" aria-hidden="true"></i><a href="{{route('franchise.dashboard.payment')}}">Online Payments</a></li>
               <li class=""><i class="fa fa-share-square" aria-hidden="true"></i><a href="{{route('franchise.dashboard.leads')}}">Leads</a></li>
             </ul>
           </nav> 
         </div>
       </div> 
       <div class="col-md-10">
         <div class="tab-content box-shd">

   @yield('content')

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
  <form class="" id="form-field" action="{{route('user.form.submit')}}" method="post" enctype="multipart/form-data">
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
  id: echo,
  order_id
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



   <!-- JS FILES -->

   <script src="{{ asset('user/js')}}/scripts.js"></script>


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
</body>

</html>