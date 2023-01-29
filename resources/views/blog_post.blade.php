@extends('layouts.master')

@section("title","blog post page")

@section('content')
<!--  BEGIN NAVBAR  -->
@include("adminheader")
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

    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <!--  BEGIN SIDEBAR  -->
    @include("adminsidebar")
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="allform-page addblog">

            <h2>Add Blog Post</h2>

            <div class="row">
                <div class="col-md-6">
                    @if(isset($data))
                    @php($url = "/blogs/put")
                    @else
                    @php($url = "/blogs/post")
                    @endif

                    <form action="{{$url}}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if(isset($data))
                        <input type="hidden" name="id" value="{{$data->id}}">
                        @endif

                        <label for="fname">Title (max: 150 characters)</label><br>
                        <textarea rows="3" cols="58" maxlength="150" name="title" placeholder="Title..." required>@if(isset($data)){{$data->title}}@endif</textarea><br>

                        <label for="fname">Description</label><br>
                        <textarea id="summernote" name="description" required>@if(isset($data)){{$data->description}}@endif</textarea>
                </div>


                <div class="col-md-6">


                    <label for="HighlightOne">Highlight One (max: 60 characters)</label><br>
                    <textarea rows="2" cols="58" maxlength="60" name="highlightone" placeholder="Type..." required>@if(isset($data)){{$data->highlight1}}@endif</textarea><br>

                    <label for="HighlightTwo">Highlight Two (max: 60 characters)</label><br>
                    <textarea rows="2" maxlength="60" cols="58" name="highlighttwo" placeholder="Type..." required>@if(isset($data)){{$data->highlight2}}@endif</textarea><br>

                    <div class="">
                        <label for="">Tags</label>
                        <select name="tags" class="form-control w-50" id="" required>
                            <option value="gst">GST/TAX</option>
                            <option value="registration">Registration</option>
                            <option value="incorporation">Incorporation</option>
                            <option value="others">Others</option>
                            <option value="loan">Loan</option>
                        </select>
                    </div>

                    <div class="featimg pt-4">
                        <h4>Featured Image</h4>
                        <!-- <form action="/action_page.php"> -->
                        <input type="file" id="myFile" name="file"><br>
                        @if(isset($data))
                        <img src="{{asset('storage')}}/{{$data->image}}" alt="" width="100px" height="100px">
                        @endif
                        <br>
                        <input type="submit" value="Save">
                        </form>
                    </div>

                </div>

            </div>

        </div>


    </div>




</div>
<!--  END CONTENT AREA  -->

</div>

<script>
    $('#summernote').summernote({
        placeholder: 'Type here',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
@endsection

<!-- for texteditor -->