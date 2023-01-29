@extends('layouts.user')

@section("title","Dashboard User")


@section('content')
          <!--wallet start -->
          <div class="tab-pane active text-style" id="tab3">

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
                    <h6>{{$wallet->amount}}</h6>
                  </div>
                </div>
              </div>
            </div>

            <table class="table table-striped custab">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Entry</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                @foreach($history as $list)
                <tr>
                  <td>{{$list->id}}</td>
                  <td>{{$list->created_at}}</td>
                  <td style="text-transform: capitalize;">{{$list->amount_type}}</td>
                  <td style="text-transform: capitalize;">
                    @if($list->entry == "debit")
                    <span class="text-danger">debit</span>
                    @else
                    <span class="text-success">credit</span>
                    @endif
                  </td>
                  <td>
                    @if($list->entry == "debit")
                    <span class="text-danger">- {{$list->amount}}</span>
                    @else
                    <span class="text-success">+ {{$list->amount}}</span>
                    @endif
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
            {{$history->links()}}

          </div>
          <!--wallet end -->

@endsection