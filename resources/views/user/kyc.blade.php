@extends('layouts.user')

@section("title","Dashboard User")


@section('content')
          <!-- ACCOUNT DETAILS START -->
          @if($kyc)
          <div class="tab-pane active text-style" id="tab1">
            <form class="login-form" action="{{route('user.kyc.update',['id' => $kyc->id])}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row rightcol">
                <!-- name -->
                <input type="hidden" name="user_type" value="user">
                <input type="hidden" name="user_id" value="{{$user->id}}">

                <div class="col-md-12">
                  <h3 class="rtext">Kyc Form</h3>
                </div>
                <div class="col-md-12">
                  <div class="form-group position-relative">
                    <label>Pan Card<span class="text-danger">*</span></label>
                    <input type="file" class="form-control mb-3" name="pan">
                    <a href="{{asset('storage')}}/{{$kyc->pan}}" class="text-white bg-info btn-sm">Preview</a>
                  </div>

                </div>
                <!-- email -->
                <div class="col-md-12">
                  <div class="form-group position-relative">
                    <label>Aadhaar Card<span class="text-danger">*</span></label>
                    <input type="file" class="form-control mb-3" name="aadhaar">
                    <a href="{{asset('storage')}}/{{$kyc->aadhaar}}" class="text-white bg-info btn-sm">Preview</a>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Passport Photo<span class="text-danger">*</span></label>
                    <input type="file" class="form-control mb-3" name="photo">
                    <a href="{{asset('storage')}}/{{$kyc->photo}}" class="text-white bg-info btn-sm">Preview</a>
                  </div>
                </div>

                <!-- mobile -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Other Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="other_label" value="{{$kyc->other_label??''}}">
                  </div>
                </div>
                <!-- company -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Other Document</label>
                    <input type="file" class="form-control mb-3" name="other_doc" >

                    @if($kyc->other_doc)
                    <a href="{{asset('storage')}}/{{$kyc->other_doc}}" class="text-white bg-info btn-sm">Preview</a>
                    @endif
                  </div>
                </div>
               
               

                <div class="col-lg-12">
                  <div class="form-group">
                    <a type="submit" class="btn btn-info btn-xs" id="update-btn">
                      <button type="submit" class="btn btn-sm text-white">Submit</button>
                    </a>
                  </div>
                </div>
              </div>
            </form>
          </div>
          @else
          <div class="tab-pane active text-style" id="tab1">
            <form class="login-form" action="{{route('user.kyc.upload')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row rightcol">
                <!-- name -->
                <input type="hidden" name="user_type" value="user">
                <input type="hidden" name="user_id" value="{{$user->id}}">

                <div class="col-md-12">
                  <h3 class="rtext">Kyc Form</h3>
                </div>
                <div class="col-md-12">
                  <div class="form-group position-relative">
                    <label>Pan Card<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="pan" required>
                  </div>
                </div>
                <!-- email -->
                <div class="col-md-12">
                  <div class="form-group position-relative">
                    <label>Aadhaar Card<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="aadhaar" required>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Passport Photo<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="photo" required>
                  </div>
                </div>

                <!-- mobile -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Other Document Name</label>
                    <input type="text" class="form-control" placeholder="document name" name="other_label">
                  </div>
                </div>
                <!-- company -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Other Document</label>
                    <input type="file" class="form-control" name="other_doc" >
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <a type="submit" class="btn btn-info btn-xs" id="update-btn">
                      <button type="submit" class="btn btn-sm text-white">Submit</button>
                    </a>
                  </div>
                </div>
              </div>
            </form>
          </div>
          @endif

          
@endsection