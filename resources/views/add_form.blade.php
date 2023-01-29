@extends('layouts.master')

@section("title","add form page")


@section('content')

@include("adminheader");

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
    @include("adminsidebar")
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="addform-page">

            <div class="addbtn">
                <a class="btn btn-info btn-xs" href="#" type="button" data-toggle="modal" data-target="#exampleModal">
                    <span class="glyphicon glyphicon-edit"></span> Add Form<i class="fa fa-plus pl-3" aria-hidden="true"></i></a>
            </div>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @php($nos = 0)
                @foreach ($forms as $form)
                @php($nos++)

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading{{$nos}}">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$nos}}" aria-expanded="true" aria-controls="collapse{{$nos}}">
                                <i class="more-less glyphicon glyphicon-plus">Add Field</i>
                                {{$form->name}}
                            </a>
                        </h4>
                    </div>

                    <div id="collapse{{$nos}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$nos}}">
                        <div class="panel-body">

                            @foreach ($form_content as $input)
                            @if ($input->form_name_id == $form->id)
                            <div class="form-group">
                                <label>{{$input->form_content}}</label>
                                <input type="{{$input->type}}" class="form-control" placeholder="{{$input->form_content}}" name="{{$input->name}}">
                            </div>
                            @endif
                            @endforeach

                            <div class="form-group">
                                <input type="submit" class="add-field-btn" data-form-id="{{$form->id}}" value="Add Field" data-toggle="modal" data-target="#exampleModal1">
                            </div>


                        </div>
                    </div>
                </div>
                @endforeach

            </div><!-- panel-group -->


        </div>
    </div>




    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button> -->

    <!-- Modal -->
    <!-- add form name  -->
    <div class="modal fade" id="exampleModal" style="z-index: 99999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" id="form-name">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Form Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Service</label>
                            <select class="form-control" name="service_id" id="exampleFormControlSelect1">
                                @foreach ($services as $list)
                                <option value="{{$list->id}}">{{$list->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="form-name" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>


    <!-- add new field -->
    <div class="modal fade" id="exampleModal1" style="z-index: 99999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Field</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" id="form-field" action="/admin/services/forms/content" method="post">
                        @csrf

                        <input type="hidden" name="form_id">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Field Label<span class="text-danger">*</span></label>
                            <input type="text" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Field Type<span class="text-danger">*</span></label>
                            <select class="form-control" name="type" id="exampleFormControlSelect1" required>
                                <option value="text">Text</option>
                                <option value="file">File</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Required<span class="text-danger">*</span></label>
                            <select class="form-control" name="required" id="exampleFormControlSelect1" required>
                                <option value="1">true</option>
                                <option value="0">false</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status<span class="text-danger">*</span></label>
                            <select class="form-control" name="status" id="exampleFormControlSelect1" required>
                                <option value="1">true</option>
                                <option value="0">false</option>
                            </select>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="form-field" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>


</div>
<!--  END CONTENT AREA  -->

</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    $(document).on("submit", "#form-name", function(e) {

        e.preventDefault();

        let formData = $(this).serialize();

        $.ajax({
            url: "/admin/services/forms/post",
            type: "post",
            data: formData,
            success: function() {
                window.location.href = "/admin/services/forms/add";
            }
        })

    })


    $(document).on("click", ".add-field-btn", function() {

        let formId = $(this).attr("data-form-id");

        $("[name=form_id]").attr("value", formId);
    })
</script>

@endsection