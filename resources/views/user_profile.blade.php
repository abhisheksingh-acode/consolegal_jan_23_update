@extends('layouts.master')

@section("title","add form page")


@section('content')
@include('adminheader')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    @include('adminsidebar')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content wallet">


        <div class="uprofile">
            <h2>{{$type}} profile</h2>

            @if($type == "user")
            <form action="/admin/user/update" method="post">
                @elseif($type == "agent")
                <form action="/admin/agents/edit/{{$data->id}}" method="post">
                    @else
                    <form action="/admin/franchise/update" method="post">
                        @endif
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group">
                            <h4 class="text-success text-center">{{Session::get("success")}}</h4>
                            <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
                        </div>
                        <div class="form-group">
                            <label>Name</label><span class="pl-5"></span>
                            <input type="text" class="form-control" placeholder="User Name" name="name" required="" value="{{$data->name}}">
                        </div>

                        <div class="form-group">
                            <label>Mobile Number</label><span class="pl-4"></span>
                            <input type="text" class="form-control" placeholder="Mobile Number" name="phone" required="" value="{{$data->phone}}">
                        </div>

                        <div class="form-group">
                            <label>Email Address</label><span class="pl-5"></span>
                            <input type="email" class="form-control" placeholder="EmailAddress" name="email" required="" value="{{$data->email}}">
                        </div>

                        <div class="form-group">
                            <label>Company Name</label><span class="pl-5"></span>
                            @if($type != "franchise")
                            <input type="text" class="form-control" placeholder="company" name="company" required="" value="{{$data->company}}">
                            @else
                            <input type="text" class="form-control" placeholder="company" name="company" required="" value="{{$data->company_name}}">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Change Password </label>
                            <input type="password" name="password" class="form-control" placeholder="Change Password">
                        </div>

                        <div class="form-group"><input type="submit" value="Save"></div>
                    </form>


                    @if($kyc)
            <div class="container">
                <h1 class="text-capitalize">{{$type}} Kyc</h1>

                <table class="table">
                    <tr>
                        <th>Label</th>
                        <th>Preview</th>
                        <th>Download</th>
                    </tr>

                    <tr>
                        <td>Pan Card</td>
                        <td><a href="{{asset('storage')}}/{{$kyc->pan}}" class="text-white p-1 bg-dark"><i class="fas fa-eye"></i></a></td>
                        <td><a href="{{asset('storage')}}/{{$kyc->pan}}" download="{{asset('storage')}}/{{$kyc->pan}}" class="text-white p-1 bg-dark"><i class="fas fa-download"></i></a></td>
                    </tr>
                    <tr>
                        <td>Aadhaar Card</td>
                        <td><a href="{{asset('storage')}}/{{$kyc->aadhaar}}" class="text-white p-1 bg-dark"><i class="fas fa-eye"></i></a></td>
                        <td><a href="{{asset('storage')}}/{{$kyc->aadhaar}}" download="{{asset('storage')}}/{{$kyc->aadhaar}}" class="text-white p-1 bg-dark"><i class="fas fa-download"></i></a></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td><a href="{{asset('storage')}}/{{$kyc->photo}}" class="text-white p-1 bg-dark"><i class="fas fa-eye"></i></a></td>
                        <td><a href="{{asset('storage')}}/{{$kyc->photo}}" download="{{asset('storage')}}/{{$kyc->photo}}" class="text-white p-1 bg-dark"><i class="fas fa-download"></i></a></td>
                    </tr>

                    @if($kyc->other_label)
                    <tr>
                        <td>{{$kyc->other_label}}</td>
                        <td><a href="{{asset('storage')}}/{{$kyc->other_doc}}" class="text-white p-1 bg-dark"><i class="fas fa-eye"></i></a></td>
                        <td><a href="{{asset('storage')}}/{{$kyc->other_doc}}" download="{{asset('storage')}}/{{$kyc->other_doc}}" class="text-white p-1 bg-dark"><i class="fas fa-download"></i></a></td>
                    </tr>
                    @endif
                </table>
            </div>
            @endif

        </div>










    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->


<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
@endsection