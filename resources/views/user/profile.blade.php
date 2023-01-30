@extends('layouts.user')

@section("title","Dashboard User")


@section('content')
          <!-- ACCOUNT DETAILS START -->
          <div class="tab-pane active text-style" id="tab1">
            <div class="d-flex justify-content-end align-items-center">
               <a href="{{route('user.kyc.create')}}" class="btn-sm btn-primary">Upload Kyc</a>
            </div>
            <form class="login-form" action="{{route('user.profile.update')}}" method="post">
              @csrf
              <div class="row rightcol">
                <!-- name -->
                <div class="col-md-12">
                  <h3 class="rtext">Personal Information</h3>
                </div>
                <div class="col-md-12">
                  <div class="form-group position-relative">
                    <label>Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="FullName" name="name" required="" value="{{ session()->get('user')->name}}">
                  </div>
                </div>
                <!-- email -->
                <div class="col-md-12">
                  <div class="form-group position-relative">
                    <label>Email Address<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" placeholder="EmailAddress" value="{{ session()->get('user')->email}}" name="email" required="">
                  </div>
                </div>




                <!-- mobile -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Mobile Number<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Phone" value="{{ session()->get('user')->phone}}" name="Phone" required="">
                  </div>
                </div>
                <!-- company -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" placeholder="Company Name" value="{{ session()->get('user')->company}}" name="company" >
                  </div>
                </div>
               
                <div class="col-md-12">
                  <div class="form-group">
                    <label>GSTIN</label>
                    <input type="text" class="form-control" placeholder="GSTIN" value="{{ session()->get('user')->gst??''}}" name="gst">
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Change Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Change Password">
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <a type="submit" class="btn btn-info btn-xs" id="update-btn">
                      <button type="submit" class="btn btn-sm text-white">Update</button>
                    </a>
                    {{-- <button onclick="document.getElementById('id01').style.display='block'" class="" style="width:auto;">Forgot Password</button> --}}
                  </div>

                </div>
              </div>
            </form>
          </div>
@endsection