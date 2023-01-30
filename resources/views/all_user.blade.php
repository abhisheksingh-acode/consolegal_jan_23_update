@extends('layouts.master')

@section('title','All Users')
@section('content')
<!--  BEGIN NAVBAR  -->
@include('adminheader')
<!--  END NAVBAR  -->


<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    @include('adminsidebar')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content wallet">

        <div class="user" id="navbarscroll">
            <h2>All User</h2>
            <div class="row d-flex justify-content-between align-items-center">   
                <div class="col-10">
                      <form class="d-flex justify-content-between align-items-center py-2" action="{{route("user.all")}}">
                    <input class="form-control" value="{{request()->key??''}}" name="key" placeholder="search by id, name, email, phone" required="" />

                    <button type="submit" class="btn-sm btn-warning mx-4">Go</button>
                </form>
                </div>
                <div class="col-2 text-right">
                    <a href="{{route('export.users')}}" title="export to excel" class="btn btn-info"><i class="fas fa-file-excel"></i></a>
                </div>              
            </div>
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
            </div>
            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email Address</th>
                        <th>Phone No.</th>
                        <th>Refer By</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($nos = 0)
                    @foreach ($user as $list)
                    @php($nos++)
                    <tr>
                        <td>{{$list->user_id}}</td>
                        <td><a href="/admin/users/profile?id={{$list->id}}">{{$list->name}}</a></td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->phone}}</td>
                        <td>{{$list->ref_id}}</td>
                        <td class="text-center"><a href="/admin/users/profile?id={{$list->id}}">
                                <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                            <a href="#" onclick="deleteUser({{$list->id}})"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$user->links()}}
        </div>
    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->


<script>
    function deleteUser(id){
       let sure = confirm('Are your sure, want to delete.');
        
        if(sure){
            location.href = `/users/delete/${id}`;
        }
    }
</script>








@endsection