@extends('layouts.master')

@section("title","login | consolegal")

@section('content')

<body class="loginbody" style="background-image: url({{ asset('image')}}/login_full_bg.jpg);">


   <!-- section Start -->
   <section class="sec-login">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
               <div class="login-page bg-white shadow rounded p-4">
                  <div class="text-center">
                     <h4 class="mb-4">Login</h4>
                  </div>
                  <form class="login-form" id="login-form">
                     @csrf
                     <div class="row">
                        <!-- <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>Username<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                                    </div>
                                </div> -->
                        <div class="col-lg-12">
                           <div class="form-group position-relative">
                              <label>Your Email <span class="text-danger">*</span></label>
                              <input type="email" class="form-control" placeholder="Email" name="email" required>
                           </div>
                        </div>

                        <div class="col-lg-12">
                           <div class="form-group position-relative">
                              <label>Password <span class="text-danger">*</span></label>
                              <input type="password" name="password" class="form-control" placeholder="Password" required>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <h6 class="notify"></h6>
                        </div>


                        <div class="col-lg-6 col-md-6 col-6">
                           <div class="form-group">
                              <div class="custom-control m-0 custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck1">
                                 <label class="custom-control-label" for="customCheck1">Remember me</label>
                              </div>
                           </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-6  fp">
                           <!--<button onclick="showModal()" style="width:auto;">Forgot Password</button>-->
                        </div>



                        <div class="col-lg-12 mb-0">
                           <button type="submit" id="login-btn" class="btn btn-primary an-btn w-100">Log In</button>
                        </div>

                        <div class="col-12 text-center">
                           <p class="mb-0 mt-3"><small class="text-dark mr-2">Don't have an account ?</small>
                              <a href="/users/signup" class="text-dark font-weight-bold">Sign Up</a>
                           </p>
                        </div>
                     </div>
                  </form>

               </div>
            </div>
         </div>
         <!--end row-->
      </div>
      <!--end container-->





   </section>
    {{--  <div id="id02" class="modal">
         <form class="modal-content animate" action="/action_page.php" method="post">
            @csrf

            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>



            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-md-8 col-8">
                     <p>Change Password</p>
                  </div>

                  <div class="col-lg-4 col-md-4 col-4"><a href="#">Resend OTP</a></div>

                  <div class="col-lg-12">
                     <div class="form-group">
                        <input type="text" placeholder="Type New Password" name="ph" required="">
                     </div>
                  </div>

                  <div class="col-lg-12">
                     <div class="form-group">
                        <input type="text" placeholder="Retype New Password" name="ph" required="">
                     </div>
                  </div>


                  <div class="col-lg-12">
                     <button type="submit">Retrieve Password</button>
                  </div>
               </div>
            </div>


         </form>
      </div> --}}
   <!-- section End -->





   <script>
      // Get the modal
    //   var modal = document.getElementById("id01");


function showModal(){
    document.getElementById('id02').style.display='block';
}
      // When the user clicks anywhere outside of the modal, close it
    //   window.onclick = function(event) {
    //      if (event.target == modal) {
    //         modal.style.display = "none";
    //      }
    //   }



      // submit login form ajax 
      $(document).on("submit", "#login-form", function(e) {
         e.preventDefault();

         $("#login-btn").html("Loading...");

         let formData = $("#login-form").serialize();

         $.ajax({
            url: "/admin",
            type: "POST",
            data: formData,
            success: function(data) {

               console.log(data);

               if (data.status == "success") {
                  $(".notify").html("login successfully").addClass("text-white");

                  window.location.href = "/admin/dashboard";
               } else {
                  $(".notify").html("login failed!").addClass("text-danger");
               }
            },
            complete: function() {
                $("#login-btn").html("Log in");
               $("#login-form").reset();
            }

         })


      })
   </script>

   @endsection