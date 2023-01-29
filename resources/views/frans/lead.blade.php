@extends('layouts.frans')

@section("title","Dashboard Franchise")


@section('content')
          <!-- ACCOUNT DETAILS START -->
          <div class="tab-pane text-style active">
            <div class="container">
               <div id="content" class="main-content">
                  <div class="addform-page addorder">
                     <h2 class="text-danger text-center">{{Session::get('leadError')}}</h2>
                     <h2 class="text-success text-center">{{Session::get('leadSuccess')}}</h2>
                     <h2>Add Leads</h2>
                     <form action="{{route('franchise.dashboard.leads.create')}}" method="post">
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
@endsection