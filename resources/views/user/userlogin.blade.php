@extends('layouts.web')

@section("title","login | consolegal")

@section('content')
@push('css')
<style>
    body{
      background-image: url({{ asset('user/images')}}/login_full_bg.jpg);
    }
</style>
   
@endpush
{{-- <body class="loginbody" style="background-image: url({{ asset('user/images')}}/login_full_bg.jpg);"> --}}

   {{-- @include('layouts.incl.nav') --}}

   <!-- section Start -->
   <section class="sec-login py-5">
      <div class="container">
         <h4 class="bg-success text-white shadow text-center">{{Session::get("success")}}</h4>
         <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
               <div class="login-page bg-white shadow rounded p-4">
                  <div class="text-center">
                     <h4 class="mb-4">Login</h4>
                  </div>
                  <form class="login-form" id="login-form" data-redirect="{{session()->get('buyservice')}}">
                     @csrf
                     <div class="row">

                        <div class="col-lg-12 mb-3">
                           <div class="form-group position-relative">
                              <label>Your Email <span class="text-danger">*</span></label>
                              <input type="email" class="form-control" placeholder="Email" name="email" required>
                           </div>
                           <span class="text-danger email_err"></span>
                        </div>

                        <div class="col-lg-12 mb-3">
                           <div class="form-group position-relative">
                              <label>Password <span class="text-danger">*</span></label>
                              <input type="password" name="password" class="form-control" placeholder="Password" required>
                           </div>
                           <span class="text-danger password_err"></span>
                        </div>

                        <div class="col-lg-6 col-md-6 col-6">
                           <div class="form-group">
                              <div class="custom-control m-0 custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck1">
                                 <label class="custom-control-label fs-6" for="customCheck1">Remember me</label>
                              </div>
                           </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-6">
                           <a class="btn text-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot Password</a>
                        </div>



                        <div class="col-lg-12 mb-0">
                           <button type="submit" id="login-user" class="btn btn-primary w-100">Log In</button>
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
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-lg-8 col-md-8 col-8">
                        <p></p>
                     </div>

                     <input type="hidden" id="user_id" name="user_id">

                     <div class="col-lg-12 registered final">
                        <div class="form-group">
                           <input type="text" id="email" class="form-control" placeholder="enter registered email" name="email" required="">
                        </div>
                     </div>

                     <div class="col-lg-12 otp d-none final">
                        <div class="form-group">
                           <input type="number" maxlength="6" id="otp" class="form-control" placeholder="Enter 6 digit otp" name="otp" required="">
                        </div>
                     </div>

                     <div class="col-lg-12 verify d-none mb-3">
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Type New Password" name="password" required="">
                        </div>
                     </div>

                     <div class="col-lg-12 verify d-none mb-3">
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Retype New Password" name="c_password" required="">
                        </div>
                     </div>

                     <div class="col-lg-12">
                        <h6 class="error text-center"></h6>
                     </div>
                     <div class="col-lg-4 col-md-4 col-4 resend d-none otpBtn final"><a class="btn text-primary">Resend OTP</a></div>
                  </div>
               </div>
               <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                  <button type="button" id="otpBtn" class="btn btn-warning otpBtn final">Send Otp</button>
                  <button type="button" class="btn btn-warning otpverify d-none final">Verify</button>
                  <button type="button" id="send" class="btn btn-warning d-none verify">Update Password</button>
               </div>
            </div>
         </div>
      </div>




   </section>
   <!-- section End -->



   {{-- @include('layouts.incl.footer') --}}

   <script>
      // submit login form ajax 
      $(document).on("submit", "#login-form", function(e) {
         e.preventDefault();

         let formData = $(this).serialize();

         let redirect = $(this).attr("data-redirect");

         $.ajax({
            url: "/users/login",
            type: "POST",
            data: formData,
            beforeSend: function() {
               $("#login-user").html("Sending...")
            },
            success: function(data) {

               if (data.status == "success") {
                  if (redirect.length > 3) {
                     location.href = redirect;
                  } else {
                     location.href = "/users/dashboard";
                  }

               } else if (data.status == "email_err") {
                  $(".email_err").html("Wrong Email !!");
               } else if (data.status == "password_err") {
                  $(".password_err").html("Wrong Password !!");
               }
            },
            complete: function() {
               $("#login-user").html("Log In")
            }
         })


      })
   </script>




   <!-- forgot password  -->
   <script>
      // send otp to email and phone 
      $(document).on("click", ".otpBtn", function() {
         // empty error box every click
         $(".error").html("");

         const email = $("#email").val();

         if (email.length < 8) {
            $(".error").html("Email id should not be empty !!").css("color", "#f00");
         } else if (email.substr(-10, 10) != "@gmail.com") {
            $(".error").html("Email id should be end with @gmail.com !!").css("color", "#f00");
         } else {
            $.ajax({
               type: "post",
               url: "/otp",
               data: {
                  email,
                  type: "user"
               },
               success: function(data) {
                  console.log(data);
                  switch (data.status) {
                     case "invalid":
                        $(".error").html("Email id is not registered !!").css("color", "#f00");
                        break;
                     case "failed":
                        $(".error").html("Failed to send otp !!").css("color", "#f00");
                        break;
                     case "success":
                        // put user id to send password change request 
                        $("#user_id").val(data.data);


                        $(".error").html("Otp send successfully").css("color", "#00f");

                        // hide otp button and unhide resend button 
                        $("#otpBtn").addClass("d-none");
                        $(".resend").removeClass("d-none");
                        $(".otpverify").removeClass("d-none");

                        // unhide otp input 
                        $(".otp").removeClass("d-none");
                        break;
                  }
               }
            })
         }

      });


      // submit otp 

      $(document).on("click", ".otpverify", function() {
         const otp = $(".otp [name=otp]").val();

         $.ajax({
            type: "post",
            url: "/otp",
            data: {
               type: "verify",
               otp: otp
            },
            success: function(data) {
               if (data.status == "verified") {
                  $(".error").html("Otp verified successfully.").css("color", "#0f0");

                  $(".final").addClass("d-none");
                  $(".verify").removeClass("d-none");


               }
               if (data.status == "error") {
                  $(".error").html("Otp does not match").css("color", "#f00");
               }
               if (data.status == "expire") {
                  $(".error").html("Otp is expired resend otp").css("color", "#f00");
               }
            }
         })
      });


      // change password 
      $(document).on("click", "#send", function() {
         const pass = $(".modal [name=password]").val();
         const c_pass = $(".modal [name=c_password]").val();
         const user_id = $("#user_id").val();

         if (pass != c_pass) {
            $(".error").html("Confirm password should be same as password").css("color", "#f00");
         } else {
            $(".error").html("");

            $.ajax({
               type: "post",
               url: "{{route('reset.password')}}",
               data: {
                  password: pass,
                  id: user_id
               },
               success: function(data) {
                  location.reload();
               }
            })
         }

      });
   </script>

   @endsection