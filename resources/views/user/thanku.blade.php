@extends('layouts.web')

@section('title','order/success')

@section('content')
  <section class="tqpage my-5">
    <div class="container">
      <div class="thanku">
        <img src="{{asset('image')}}/payment.png" alt="" width="200px" height="auto">
        <h2>Thank You</h2>
        <i class="fa fa-check" aria-hidden="true"></i>
        <p style="text-decoration: underline;" class="text-success">Success! Your payment was successful!</p>
      </div>
    </div>
  </section>

  @endsection