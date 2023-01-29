@extends('layouts.master')


@section('title','wallet profile')

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

        <div class="allform-page allfr">
            <h2>Wallet Profile</h2>


            <form action="/action_page.php">
                <br>
                <div class="form-group">
                    <h2 class="text-dark text-uppercase">{{$users->name}}</h2>

                </div>

            </form>


            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        <div class="wallet">
                            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                            <h5>Total Coin</h5>
                            <h6>{{$total}}</h6>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        <div class="wallet">
                            <i class="fa fa-google-wallet" aria-hidden="true"></i>
                            <h5>Redeemed Coin</h5>
                            <h6>{{$redeem}}</h6>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        <div class="wallet">
                            <i class="fa fa-money" aria-hidden="true"></i>
                            <h5>Available Coin</h5>
                            <h6>{{$data->amount}}</h6>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container" id="navbarscroll">
                <h2>User Wallet History</h2>
                <table class="table table-striped custab">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>User Name</th>
                            <th>Referal by</th>
                            <!-- <th>Redeemed Coin</th> -->
                            <th>Type</th>
                            <th>Entry</th>
                            <th>Coin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($history as $list)
                        <tr>
                            <td>{{$list->created_at}}</td>
                            <td><a>{{$users->name}}</a></td>
                            <td>{{$users->ref_id}}</td>
                            <td>{{$list->amount_type}}</td>
                            @if($list->entry == "debit")
                            <td class="text-danger">{{$list->entry}}</td>
                            @else
                            <td class="text-success">{{$list->entry}}</td>
                            @endif
                            @if($list->entry == "debit")
                            <td class="text-danger">-{{$list->amount}}</td>
                            @else
                            <td class="text-success">+{{$list->amount}}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>






    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->


@endsection