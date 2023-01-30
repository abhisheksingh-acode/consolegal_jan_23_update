@extends('layouts.user')

@section("title","Dashboard User")


@section('content')
          <!-- ORDERS DETAILS START -->
          <div class="tab-pane text-style active" id="tab2">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Pending Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Complete Order</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div id="home" class="container tab-pane active"><br>
                <table class="table table-striped custab">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product Name</th>
                      <th>Date & Time</th>
                      <th>Payment</th>
                      <th>Amount</th>
                      <th class="text-center">Assigned Form</th>
                    </tr>
                  </thead>
                  @foreach ($pending as $order)
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>
                     {{$order->service->name}}
                    </td>
                    <td>{{$order->created_at}}</td>
                    <td class="text-uppercase fw-bold text-left">{{$order->payment_mode}}</td>

                    <td>₹ {{$order->payment->amount??$order->service->price}}</td>

                    <td class="text-center">
                      <!-- in case assign or reassign  -->
                      @if($order->form_submitted == 0 || $order->form_submitted == 3)
                      @foreach ($assigns as $assign)
                      @if($assign->order_id == $order->id)
                      @foreach ($form as $name)
                      @if($assign->form_name_id == $name->id)
                      @once
                      <a class='btn btn-info btn-xs submit-form-btn' data-order-id="{{$order->id}}" data-form-id="{{$name->id}}" data-toggle="modal" data-target="#exampleModal1" href="#">
                        Submit Your Form
                      </a>
                      @endonce
                      @endif
                      @endforeach
                      @endif
                      @endforeach
                      @endif

                      <!-- process  -->
                      @if($order->form_submitted == 1)
                      <a class="btn btn-warning text-white">Pending</a>
                      @endif
                      @if($order->form_submitted == 2)
                      <a class="btn btn-warning text-white">In Process</a>
                      @endif
                    </td>

                  </tr>
                  @endforeach

                </table>

              </div>


              <div id="menu1" class="container tab-pane fade">

                <table class="table table-striped custab">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product Name</th>
                      <th>Date & Time</th>
                      <th>Payment</th>
                      <th>Amount</th>
                      <th class="text-center">Invoice</th>
                      <th class="text-center">Docs</th>
                    </tr>
                  </thead>
                  @foreach ($complete as $order)
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>
                      {{$order->service->name}}
                    </td>
                    <td>{{$order->created_at}}</td>
                    <td class="text-uppercase fw-bold text-left">{{$order->payment_mode}}</td>
                    <td>
                      ₹ {{$order->payment->amount??$order->service->price}}
                    </td>
                    <td class="text-center" id="file-btn">Download<br>
                      <a href="{{route("user.download.invoice",["id" => $order->id])}}"><i class="fa fa-download"></i></a>
                      <br>
                    </td>
                    <td class="text-center" id="file-btn">Download<br>
                      <a href="/download/customer/{{$order->id}}"><i class="fa fa-download"></i></a>
                      <br>
                    </td>
                  </tr>
                  @endforeach

                </table>


              </div>

            </div>
          </div>
          <!-- ORDERS DETAILS END -->

@endsection