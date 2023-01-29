@extends('layouts.web')

@section("title","signup user | consolegal")


@section('content')

<body class="loginbody" style="background-image: url({{ asset('user/images')}}/login_full_bg.jpg);">


    <!-- section Start -->
    <section class="sec-sign my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="login_page bg-white shadow rounded p-4">
                        <div class="text-center">
                            <h4 class="mb-4">Signup</h4>
                        </div>
                        <form class="login-form" action="{{route('user.create')}}" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group position-relative">
                                        <label>Name<span class="text-danger">*</span></label>
                                        <input type="text" value="{{old('name')}}" class="form-control" placeholder="Full Name" name="name" required="">
                                    </div>
                                    @error('name')
                                    <span class="text-danger password_err">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-group position-relative">
                                        <label>Your Email <span class="text-danger">*</span></label>
                                        <input type="email" value="{{old('email')}}" class="form-control" placeholder="Email" name="email" required="">
                                    </div>
                                    @error('email')
                                    <span class="text-danger password_err">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group position-relative">
                                        <label>Phone No<span class="text-danger">*</span></label>
                                        <input type="text" value="{{old('phone')}}" class="form-control" placeholder="Phone No" name="phone" required="">
                                    </div>
                                    @error('phone')
                                    <span class="text-danger password_err">{{$message}}</span>
                                    @enderror
                                </div>
                                {{-- <div class="col-md-12 mb-3">
                                    <div class="form-group position-relative">
                                        <label>Company Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Company Name" name="company" required="">
                                    </div>
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <div class="form-group position-relative">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                    </div>
                                    @error('password')
                                    <span class="text-danger password_err">{{$message}}</span>
                                    @enderror
                                </div>
                                 <div class="col-md-12 mb-3"> 
                                <!-- <div class="form-group position-relative"> -->
                                <label>Referral code (optional)</label>
                                <input type="text" name="ref_id" class="form-control" placeholder="referral code" value="{{(isset($refer_id))?$refer_id : ''}}">
                                <!-- </div> -->
                                </div> 
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <div class="custom-control m-0 custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                            <label class="custom-control-label" for="customCheck1">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary an-btn w-100">Register</button>
                                </div>

                                <div class="mx-auto">
                                    <p class="mb-0 mt-3"><small class="text-dark mr-2">Already have an account ?</small> <a href="/users/login" class="text-dark font-weight-bold">Sign in</a></p>
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
    <!-- section End -->

    @endsection