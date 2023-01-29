@extends("layouts.web")

@section('title','Consolegal | Paynow')

@section('content')

   @push('css')
   <link rel="stylesheet" href="{{ asset('web/css/style.css')}}">
   @endpush

   <section id="payment-sec-1" class="position-relative pt-5 pb-5">
      <div class="top-left-box"></div>
      <div class="bottom-right-box"></div>
      <div class="payment-sec-child container  shadow px-0">
          <div style="background-color:#f5f5fd ;" class="row mx-auto px-0 h-100 justify-content-between main-f-c">
              <div class="col-lg-6  row ps-left">
                  <div class="col-8 px-0">
                      <a href=""  class="btn payment-sec-left-btn">Back to Home</a>

                      <div class="shadow ps-left-detail-box">
                          <div class="box-heading">COMPANY BANK ACCOUNT DETAILS</div>

                          <ul class="list-unstyled ps-0">
                              <li class="mb-3">NAME : CONSOLEGAL</li>
                              <li class="mb-3">BANK NAME : STATE BANK OF INDIA</li>
                              <li class="mb-3">CURRENT A/C NO. : 40497148443</li>
                              <li class="mb-3">IFSC CODE : SBIN0000201</li>
                              <li class="mb-3">ADDRESS : VARANASI, UTTAR PRADESH</li>
                              {{-- <li class="">PAN NO. : AAECE1563F</li> --}}
                          </ul>

                      </div>
                  </div>
                  <div class="col-4 px-0 h-100"></div>
              </div>
              <div class="col-lg-6 px-0 pt-4 pe-4 pe-sm-5">
                  <div class="circle-header d-none justify-content-end align-items-center">
                      <div style="width: fit-content;"
                          class="d-flex flex-column justify-content-center    align-content-center">
                          <div class="orange-circle mb-2"></div>
                          <div class="orange-circle-heading">Secure <br> Payment</div>
                      </div>
                      <div class="mini-c"></div>
                      <div class="mini-c"></div>
                      <div class="mini-c"></div>
                      <div style="width: fit-content;"
                          class="d-flex flex-column justify-content-center    align-content-center">
                          <div class="orange-circle mb-2"></div>
                          <div class="orange-circle-heading">Secure <br> Payment</div>
                      </div>
                      <div class="mini-c"></div>
                      <div class="mini-c"></div>
                      <div class="mini-c"></div>
                      <div style="width: fit-content;"
                          class="d-flex flex-column justify-content-center    align-content-center">
                          <div class="orange-circle mb-2"></div>
                          <div class="orange-circle-heading">Secure <br> Payment</div>
                      </div>
                      <div class="mini-c"></div>
                      <div class="mini-c"></div>
                      <div class="mini-c"></div>
                      <div style="width: fit-content;"
                          class="d-flex flex-column justify-content-center    align-content-center">
                          <div class="orange-circle mb-2"></div>
                          <div class="orange-circle-heading">Secure <br> Payment</div>
                      </div>
                  </div>
                  <div class="form-container">
                      <div class="form-heading">PAYMENT INFORMATION</div>

                      <form class="pt-5" action="{{route('paynow')}}" method="POST">
                        @csrf
                          <input type="text" name="name" class="form-control mb-3 w-75 ms-auto"
                              placeholder="Your Name" id="" required>
                              @error('name')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                          <input type="email" name="email" class="form-control mb-3 w-75 ms-auto"
                              placeholder="Your Email" id="" required>
                              @error('email')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                          <div class="mb-3"><input type="number" name="phone" class="form-control w-75 ms-auto" placeholder="Your Number" id="phone_number" required></div>
                             @error('phone')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                          <input type="text" name="order_id" class="form-control mb-3 w-75 ms-auto"
                              placeholder="Your Order No (optional)" id="">
                              @error('order_id')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                          <input type="number" name="amount" class="form-control mb-3 w-75 ms-auto"
                              placeholder="Amount" id="" required>
                              @error('amount')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror

                          <div class="fw-bold ms-auto ">Net Banking/Debit/Credit Card - Pay With</div>

                          <button type="button" id="rzp-button1" class="btn mt-4">Send</button>
                          <div id="msg_reply"></div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>


    @push('script')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>

        $(document).on("input","[name=order_id]",function(){
            var id = $('[name=order_id]').val()?$('[name=order_id]').val():'';

            if(id.length < 1){
                $('#rzp-button1').removeAttr('disabled');
            }else{
                $('#rzp-button1').removeAttr('disabled');
            }
           
           function validate_order_id(){
              $.ajax({
                type:"post",
                url:"{{route('order.validate')}}",
                data:{order_id:id},
                success:function(resp){
                    console.log(resp);
                    if(resp == "false"){

                        $('#rzp-button1').attr('disabled','disabled');
                    }else{
                        $('#rzp-button1').removeAttr('disabled');
                    }
                }
              })
           }

           if(id.length > 0){
               validate_order_id();
           }
        })


        $('body').on('click', '#rzp-button1', function(e) {
           e.preventDefault();

           var name = $('[name=name]').val();
           var email = $('[name=email]').val();
           var phone = $('[name=phone]').val();
           var amount = $('[name=amount]').val();
           var order_id = $('[name=order_id]').val();
  
           var total_amount = amount * 100;
           var options = {
              "key": "{{ env('RAZORPAY_KEY') }}",
              "amount": Number(total_amount),
              "currency": "INR",
              "name": "CONSOLEGAL",
              "description": "Test Transaction",
              "image": "https://web-app-ca.herokuapp.com/image/logo.jpeg",
              "order_id": "",
              "handler": function(response) {
                 $.ajaxSetup({
                    headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                 });
                 $.ajax({
                    type: 'POST',
                    url: "{{route('paynow')}}",
                    data: {
                       razorpay_payment_id: response.razorpay_payment_id,
                       amount,
                       name,
                       phone,
                       email,
                       order_id
                    },
                    beforeSend: function() {
                       $("#rzp-button1").html("Loading...")
                    },
                    success: function(data) {
                       console.log(data);
                    //    $('.amount').val('');
                       location.href = "/order/success";
                    },
                    complete: function() {
                       $("#rzp-button1").html("Place Order");
                    }
                 });
              },
              "prefill": {
                 "name": name,
                 "email": email,
                 "contact": phone
              },
              "notes": {
                 "address": "test test"
              },
              "theme": {
                 "color": "#F37254"
              }
           };

           var rzp1 = new Razorpay(options);
           rzp1.open();
        });
     </script>
    @endpush

@endsection