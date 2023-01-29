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
   <!-- section Start -->
   <section class="sec-login py-5">
      <div class="container">
         <h4 class="bg-success text-white shadow text-center">{{Session::get("success")}}</h4>
         <h4 class="bg-danger text-white shadow text-center">{{Session::get("error")}}</h4>
         <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
               <div class="login-page bg-white shadow rounded p-4">
                  <div class="text-center">
                     <h4 class="mb-4">Agent Login</h4>

                  </div>
                  <form class="login-form" action="{{route('agent.login')}}" method="POST" id="login-form">
                     @csrf
                     <div class="row">
                        <div class="col-lg-12 mb-3">
                           <div class="form-group position-relative">
                              <label>Your Email <span class="text-danger">*</span></label>
                              <input type="email" class="form-control" placeholder="Email" name="email" required>
                           </div>
                           @error('email')
                              <span class="text-danger password_err">{{$message}}</span>
                           @enderror
                        </div>

                        <div class="col-lg-12 mb-4">
                           <div class="form-group position-relative">
                              <label>Password <span class="text-danger">*</span></label>
                              <input type="password" name="password" class="form-control" placeholder="Password" required>
                           </div>
                           @error('password')
                              <span class="text-danger password_err">{{$message}}</span>
                           @enderror

                        </div>

                        <div class="col-lg-6 col-md-6 col-6 mb-3">
                           <div class="form-group">
                              <div class="custom-control m-0 custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck1">
                                 <label class="custom-control-label" for="customCheck1">Remember me</label>
                              </div>
                           </div>
                        </div>

                        {{-- <div class="col-lg-6 col-md-6 col-6  fp">
                           <a class="btn text-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot Password</a>
                        </div> --}}

                        <div class="col-lg-12 mb-0">
                           <button type="submit" class="btn btn-primary w-100">Log In</button>
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
      {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                     <div class="col-lg-12 verify d-none">
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Type New Password" name="password" required="">
                        </div>
                     </div>

                     <div class="col-lg-12 verify d-none">
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
                  <button type="button" id="send" class="btn btn-warning d-none verify">Retrieve Password</button>
               </div>
            </div>
         </div>
      </div> --}}


   </section>
   <!-- section End -->
   @endsection