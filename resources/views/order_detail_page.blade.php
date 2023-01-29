@extends('layouts.master')

@section("title","add form page")


@section('content')

<!--  BEGIN NAVBAR  -->
@include('adminheader')
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->

<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <!--  BEGIN SIDEBAR  -->
    @include('adminsidebar')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="allform-page order-details">

            <h2>Get Your Orders Details</h2>

            <a class="btn btn-warning" href="/reciept/{{$order->id}}" style="width:100%"><i class="fa fa-download"></i> Download</a>

            <table class="table table-striped responsive">
                <tr>
                    <th>Order id</th>
                    <td>{{$order->id}}</td>
                </tr>
                <tr>
                    <th>User ID</th>
                    <td>{{$user->user_id}}</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>User Type</th>
                    <td>
                        @if($type == "user_id")
                        User
                        @else
                        Franchise
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Service</th>
                    <td>{{$order->service->name}}</td>
                </tr>
                <tr>
                    <th>Service Charge</th>
                    <td>₹{{$order->service->price}}</td>
                </tr>
                <tr>
                    <th>Paid</th>
                    <td>₹{{$order->payment->amount??$order->service->price}}</td>
                </tr>
                <tr>
                    <th>Payment Mode</th>
                    <td class="text-uppercase fw-bold text-left">{{$order->payment_mode}}</td>
                </tr>
                <tr>
                    <th>Payment id</th>
                    <td>{{$order->payment_id}}</td>
                </tr>
                <tr>
                    <th>Date & Time</th>
                    <td>{{$order->created_at}}</td>
                </tr>
            </table>
        </div>




    </div>




</div>
<!--  END CONTENT AREA  -->

</div>


@endsection