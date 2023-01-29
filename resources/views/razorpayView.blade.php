<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>Laravel - Razorpay Payment Gateway Integration</title>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
   <div id="app">
      <main class="py-4">
         <div class="container">
            <div class="row">
               <div class="col-md-6 offset-3 col-md-offset-6">

                  @if($message = Session::get('error'))
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
                     <strong>Error!</strong> {{ $message }}
                  </div>
                  @endif

                  @if($message = Session::get('success'))
                  <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
                     <strong>Success!</strong> {{ $message }}
                  </div>
                  @endif

                  <div class="card card-default">
                     <div class="card-header">
                        Laravel - Razorpay Payment Gateway Integration
                        <!-- {{session()->get("user")}} -->
                        {{$active}}
                     </div>
                     @if(isset($wallet))
                     <div class="p-4">
                        <h3>Wallet : {{$wallet->amount}}</h3>
                        <h3>Total Payment : {{$service->price}}</h3>

                     </div>

                     <div class="card-body text-center">
                        <form action="{{ route('razorpay.payment.store') }}" method="POST">
                           @csrf

                           <input type="hidden" name="service_id" value="{{$service->id}}">
                           <input type="hidden" name="service_price" value="{{$service->price}}">
                           <input type="hidden" name="service_points" value="{{$service->points}}">

                           <!-- <input type="hidden" name="wallet" value="{{$wallet}}"> -->


                           <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="{{$service->price * 100}}" data-buttontext="Pay {{$service->price}} INR" data-name="ItSolutionStuff.com" data-description="Razorpay" data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png" data-prefill.name="name" data-prefill.email="email" data-theme.color="#ff7529">
                           </script>
                        </form>
                     </div>
                     @endif

                  </div>
                  <br><br>
                  <a href="/" class="btn btn-warning">Home</a>
               </div>
            </div>
         </div>
      </main>
   </div>
</body>

</html>