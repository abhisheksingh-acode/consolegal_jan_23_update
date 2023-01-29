@extends('layouts.master')

@section("title","edit order page")


@section('content')

<!--  BEGIN NAVBAR  -->
@include("adminheader")
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <!--  BEGIN SIDEBAR  -->
    @include("adminsidebar")
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="allform-page editorder">
            <!-- <h2>Edit Orders </h2> -->
            <!-- <div class="addbtn pb-4">
                <a class="btn btn-info btn-xs" href="add_form.html">
                    <span class="glyphicon glyphicon-edit"></span> Add New Form<i class="fa fa-plus pl-3" aria-hidden="true"></i></a>
            </div> -->


            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-8 bsckgd">
                        <div class="well well-sm">
                            <h4>Order Details</h4>
                            <p>Order Id: {{$order->id}}</p>
                            <h6>General Details</h6>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="birthdaytime"><strong>Order Date : </strong>{{$order->created_at}}</label><br>
                                            <label for="birthdaytime"><strong>Payment Mode : </strong>{{$order->payment_mode}}</label><br>
                                            <label for="birthdaytime"><strong>Payment Id : </strong>{{$order->payment_id}}</label><br>
                                            <label for="birthdaytime"><strong>Paid :</strong> ₹{{$payment->amount}}</label><br>
                                        </div>



                                        <div class="form-group">
                                            <label for="name">Customer Note:</label>
                                            <input type="hidden" name="email" id="email" value="{{$user->email}}">
                                            <textarea name="compose" id="message" class="form-control" rows="3" cols="10" required="required" placeholder="Type..."></textarea>
                                            <span class="notify text-success"></span>
                                            <br>
                                            <a onclick="sendEmail()" class="btn btn-info btn-sm text-white load">Send</a>
                                        </div>


                                    </div>


                                    <div class="col-md-4">

                                        <p><strong>User ID: </strong>{{$user->user_id}}</p>
                                        <p><strong>Name: </strong>{{$user->name}}</p>
                                        <p><strong>Email: </strong>{{$user->email}}</p>
                                        <p><strong>Phone: </strong>{{$user->phone}}</p>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>


                </div>




                <div class="edittable">
                    <h3 class="pt-3">Customer Details</h3>
                    <table class="table table-striped custab">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Client Name</th>
                                <th>Date</th>
                                <th>Text</th>
                                <th>File</th>
                                <th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <div class="dropdown">
                                        {{$order->service->name}}
                                    </div>
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$assign->created_at}}</td>

                                <!-- text pdf download  -->

                                <td class="text-center" id="text-btn">Download<br>
                                    <a href="/text/{{$assign->id}}" target="_blank"><i class="fa fa-download"></i></a>
                                    <br><a></a>
                                </td>

                                <!-- file download  -->
                                <td class="text-center" id="file-btn">Download<br>
                                    <a href="/download/{{$assign->id}}"><i class="fa fa-download"></i></a>

                                    <br><a></a>
                                </td>


                                <td class="text-center">
                                    <select name="order_status" data-assign-id="{{$assign->id}}" data-order-id="{{$order->id}}" id="order_status" class="form-control btn btn-info">
                                        <option value="1" {{($order->form_submitted) == 1?"selected":""}}>Pending</option>
                                        <option value="2" {{$order->form_submitted == 2?"selected":""}}>In Process</option>
                                        <option value="3" {{$order->form_submitted == 3?"selected":""}}>Resubmit</option>
                                        <option value="4" {{$order->form_submitted == 4?"selected":""}}>Completed</option>
                                    </select>
                                </td>

                            </tr>
                            <!-- <tr>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="dropbtn">Form Status<i class="fa fa-caret-down pl-3" aria-hidden="true"></i></button>
                                        <div class="dropdown-content">
                                            <a href="#">Link 1</a>
                                            <a href="#">Link 2</a>
                                            <a href="#">Link 3</a>
                                        </div>
                                    </div>
                                </td>
                                <td>DEF</td>
                                <td>123</td>
                                <td class="text-center">Download<br><a href="#"><i class="fa fa-download"></i></a><br><a href="#">Re-Submit</a></td>
                                <td class="text-center">Download<br><a href="#"><i class="fa fa-download"></i></a><br><a href="#">Re-Submit</a></td>
                                <td class="text-center">Download<br><a href="#"><i class="fa fa-download"></i></a><br><a href="#">Re-Submit</a></td>

                            </tr>
                            <tr>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="dropbtn">Form Status<i class="fa fa-caret-down pl-3" aria-hidden="true"></i></button>
                                        <div class="dropdown-content">
                                            <a href="#">Link 1</a>
                                            <a href="#">Link 2</a>
                                            <a href="#">Link 3</a>
                                        </div>
                                    </div>
                                </td>
                                <td>DEF</td>
                                <td>123</td>
                                <td class="text-center">Download<br><a href="#"><i class="fa fa-download"></i></a><br><a href="#">Re-Submit</a></td>
                                <td class="text-center">Download<br><a href="#"><i class="fa fa-download"></i></a><br><a href="#">Re-Submit</a></td>
                                <td class="text-center">Download<br><a href="#"><i class="fa fa-download"></i></a><br><a href="#">Re-Submit</a></td>

                            </tr> -->
                        </tbody>
                    </table>

                </div>




                <div class="upldtable">
                    <h4 class="pt-3">Customer Documents Upload</h4>
                    <table class="table table-striped custab">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Client Name</th>
                                <th>Date</th>
                                <th>Upload Invoice</th>
                                <th>Upload File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <div class="dropdown">
                                        {{$order->service->name}}
                                    </div>
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$assign->created_at}}</td>
                                <td class="text-center"> Upload<br><a href="#" data-form-id="{{$order->id}}" data-toggle="modal" data-target="#invoiceModal"><i class="fa fa-upload"></i></a></td>
                                <td class="text-center"> Upload<br><a href="#" data-form-id="{{$order->id}}" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-upload"></i></a></td>

                            </tr>
                            <!-- <tr>
                                <td class="text-center">
                                    Service2
                                </td>
                                <td>DEF</td>
                                <td>123</td>
                                <td class="text-center">Upload<br><a href="#"><i class="fa fa-download"></i></a></td>

                            </tr>
                            <tr>
                                <td class="text-center">
                                    Service3
                                </td>
                                <td>DEF</td>
                                <td>123</td>
                                <td class="text-center">Upload<br><a href="#"><i class="fa fa-download"></i></a></td>

                            </tr> -->
                        </tbody>
                    </table>

                </div>


            </div class="upldtable">

            <h4 class="pt-3">Documents Uploaded Recently</h4>
                <table class="table table-response">
                    <thead>
                        <th>Sr.</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>File</th>
                        <th class="text-center">Download</th>
                    </thead>

                    @foreach($docs as $item)

                    <tr>
                        <td>
                            {{$loop->index + 1}}
                        </td>
                        <td>
                            {{$item->created_at}}
                        </td>
                        <td class="text-uppercase">
                            {{$item->field_name}}
                        </td>
                        <td class="text-left">
                            <a target="_blank" href="{{asset("storage")}}/{{$item->field_content}}">View</a>
                        </td>
                        <td class="text-center">
                            <a target="_blank" href="{{asset("storage")}}/{{$item->field_content}}" download="{{asset("storage")}}/{{$item->field_content}}"><i class="fa fa-download"></i></a>
                        </td>
                    </tr>

                    @endforeach
                </table>
        </div>




            </div>


        </div>




    </div>




</div>
<!--  END CONTENT AREA  -->

</div>

<div class="modal fade" id="exampleModal1" style="z-index: 99999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customer Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" id="form-field" action="/admin/customer/upload" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order_id" id="order-id" value="{{$order->id}}">
                    <input type="hidden" name="service_name" id="service-id" value="{{$order->service->name}}">
                    <input type="hidden" name="name" id="type" value="file">


                    <div id="form-group-container">
                        <label for="" class="form-label">File</label>
                        <input type="file" class="form-control" name="filename[]" required multiple>
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

<div class="modal fade" id="invoiceModal" style="z-index: 99999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customer Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" id="form-invoiceModal" action="/admin/customer/upload" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order_id" id="order-id" value="{{$order->id}}">
                    <input type="hidden" name="service_name" id="service-id" value="{{$order->service->name}}">
                    <input type="hidden" name="name" id="type" value="invoice">


                    <div id="form-group-container">
                        <label for="" class="form-label">File</label>
                        <input type="file" class="form-control" name="filename[]" required multiple>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="form-invoiceModal" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous"></script>
<!-- 

<script type="text/javascript">
    $(document).ready(function() {
        $('#picker').dateTimePicker();
        $('#picker-no-time').dateTimePicker({
            showTime: false,
            dateFormat: 'DD/MM/YYYY',
            title: 'Select Date'
        });
    })
</script> -->


<script>
    $("[name=order_status]").change(function(e) {
        // e.preventDefault();

        let id = $(this).attr('data-order-id');

        let status = $(this).val();

        let assign_id = $(this).attr("data-assign-id");

        $.ajax({
            url: "/admin/order/approve",
            type: "post",
            data: {
                id,
                status,
                assign_id
            },
            success: function(data) {

                $('.approve-btn').html('loading').css("background", "orange");
            },
            complete: function() {
                let step;
                switch (status) {
                    case 1:
                        step = "pending"
                        break;
                    case 2:
                        step = "approved"
                        break;
                    case 3:
                        step = "resubmit"
                        break;
                    case 4:
                        step = "completed"
                        break;

                    default:
                        break;
                }
                $('.approve-btn').html(step).css("background", "orange");
            },
            error: function() {
                alert("failed to send")
            }
        })
    })
</script>

<script>
    $("#file-btn").click(function() {
        $(".file-dl").click();
    })
</script>

<!-- send email and sms  -->
<script>
    // ajax send email and phone 
    function sendEmail() {

        $('.notify').html('').removeClass("text-danger");
        const email = $("#email").val();
        const body = $("textarea[name=compose]").val();

        if (body.length < 1) {
            $('.notify').html('failed : message box is empty').addClass("text-danger");
        } else {
            $.ajax({
                type: "post",
                url: "/email",
                data: {
                    email,
                    body
                },
                beforeSend: function() {
                    $(".load").html('sending...')
                },
                success: function(data) {
                    $(".notify").html('sent').removeClass("text-danger");
                },
                complete: function() {
                    $(".load").html('send')
                    $("textarea[name=compose]").val('');
                },
                error: function() {
                    $(".notify").html('failed').addClass("text-danger");
                }
            })
        }

    }
</script>


@endsection