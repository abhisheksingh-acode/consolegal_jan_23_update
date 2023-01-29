@extends('layouts.master')

@section("title","add form page")



@section('content')
<!--  BEGIN NAVBAR  -->
@include('adminheader')
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg></a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <!-- <li class="breadcrumb-item active" aria-current="page"><span>Sales</span></li> -->
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>
        <!-- <ul class="navbar-nav flex-row ml-auto "> -->
        <!-- <li class="nav-item more-dropdown"> -->
        <!-- <div class="dropdown  custom-dropdown-icon"> -->
        <!-- <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Settings</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a> -->

        <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown"> -->
        <!-- <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Settings</a> -->
        <!-- <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a> -->
        <!-- <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a> -->
        <!-- <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a> -->
        <!-- <a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a> -->
        <!-- </div> -->
        <!-- </div> -->
        <!-- </li> -->
        <!-- </ul> -->
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <!--  BEGIN SIDEBAR  -->
    @include('adminsidebar')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="allform-page order-details">

            <h2>View Blog</h2>
            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($nos = 0)
                    @foreach ($data as $item)
                    @php($nos++)
                    <tr>
                        <td>{{$nos}}</td>
                        <td><a href="/blogs/add?id={{$item->id}}">{{$item->title}}</a></td>
                        <td>{{$item->author}}</td>
                        <td>{{$item->created_at}}</td>
                        <td class="text-center">
                            <a href="/blogs/add?id={{$item->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="{{route('blog.delete',['id'=>$item->id])}}" class="delete" data-blog-id="{{$item->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>




    </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection