@extends('layouts.master')


@section('title','wallet')

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
            <h2>Wallet</h2>

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
                            <h6>{{$avail}}</h6>
                        </div>
                    </div>
                </div>
            </div>


            <div class="ulist" id="navbarscroll">
                <h2 class="pt-3">User List</h2>
                <div class="col-12">
                    <div class="text-right">
                       <a href="{{route('export.payment')}}" title="export to excel" class="btn btn-info"><i class="fas fa-file-excel"></i></a>
                    </div>
                 </div>
                <table class="table table-striped custab">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <!-- <th> Date</th> -->
                            <th>User Name</th>
                            <th>Total Coin</th>
                            <!-- <th>Redeemed Coin</th> -->
                            <!-- <th>Available Coin</th> -->
                            <!-- <th>Referal</th> -->
                        </tr>
                    </thead>
                    @foreach ( $wallet as $item)
                    @if($item->user !== null)
                    <tr>
                        <td>{{$item->user->user_id}}</td>
                        <!-- <td>dd/mm/yyyy</td> -->
                        <td><a href="/admin/wallet/user?id={{$item->user_id}}">
                                
                                {{$item->user!==null?$item->user->name:''}}
                            </a></td>
                        <td>{{$item->amount}}</td>
                    </tr>
                    @else

                    @if($item->fran !== null)
                    <tr>
                        <td>{{$item->fran->user_id}}</td>
                        <!-- <td>dd/mm/yyyy</td> -->
                        <td><a href="/admin/wallet/fran?id={{$item->fran->id}}">
                                
                                {{$item->fran!==null?$item->fran->name:''}}
                            </a></td>
                        <td>{{$item->amount}}</td>
                    </tr>
                    @endif

                    @endif
                    @endforeach
                </table>
            </div>


        </div>


    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->


@endsection