@extends('layouts.user')

@section("title","Dashboard User")


@section('content')
          <!--payment start -->
          <div class="tab-pane active text-style" id="tab5">
            <h4 class="text-muted">Online Payments History</h4>

            <table class="table table-striped custab">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Date</th>
                  <th>Payment Id</th>
                  <th>Amount</th>
                  <th>Service</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pay_history as $pay)
                <tr>
                  <td>{{$pay->id}}</td>
                  <td>{{$pay->created_at}}</td>
                  <td style="text-transform: capitalize;">{{$pay->r_payment_id}}</td>
                  <td style="text-transform: capitalize;">
                    ₹{{$pay->amount}}
                  </td>
                  <td>
                    {{$pay->service->name}}
                  </td>
                  <td>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
            {{$pay_history->links()}}
          </div>
          <!--payment end -->

@endsection