<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="format-detection" content="telephone=no">

   <title>Order Payment</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="{{ asset('user/css')}}/bootstrap.min.css">
   <link rel="stylesheet" href="{{ asset('user/css')}}/style.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('user/css')}}/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('user/css')}}/fonts.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="{{ asset('user/js')}}/jquery.min.js"></script>
   <script src="{{ asset('user/js')}}/bootstrap.min.js"></script>
</head>

<body class="loginbody" style="background-image: url(images/login_full_bg.jpg);">

   <div class="preloader-over">
      <p>Please Wait...</p>

      <img src="{{asset('image/loading-gif.gif')}}" alt="loading">
   </div>
   <!--order start -->
   <div class="text-style" id="tab5">
      <div class="container">
         <img src="{{ asset('web/image')}}/logo.jpeg" class="clogo" width="180" alt="">
         <div class="orderpage">

            <h2 class="pb-4">Your Order</h2>

            <div class="right">
               <h3>Account Details</h3>
               <!-- <h4>TOTAL</h4> -->
            </div>

            <div class="sec2 border-bottom pt-2">
               <h5>Name</h5>
               <h6>{{$user->name}}</h6>
            </div>
            <div class="sec2 border-bottom pt-2">
               <h5>Phone</h5>
               <h6>{{$user->phone}}</h6>
            </div>
            <div class="sec2 border-bottom pt-2">
               <h5>Email</h5>
               <h6>{{$user->email}}</h6>
            </div>

            <br> <br>
            <div class="right">
               <h3>PRODUCT</h3>
               <h4>TOTAL</h4>
            </div>


            <div class="sec2">
               <h5>{{$service->name}}</h5>
               <h6>₹{{$price}}</h6>
            </div>



            <br><br>
            <div class="right">
               <h3>PAYMENT DETAILS</h3>
               <!-- <h4>TOTAL</h4> -->
            </div>

            <ul class="bankdel list-unstyled">
               <!-- <li><input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"></li> -->
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="walletCheck">
                  <label class="form-check-label" for="walletCheck">
                     Pay With Wallet
                  </label>

               </div>
               <li>
                  <h2>₹ <span id="wallet_amount" data-wallet="{{$wallet->amount}}">{{$wallet->amount}}</span></h2>
               </li>
               {{-- <div class="right">
                 
               </div> --}}
               
               <div class="right">
                  <br>
                  <h5>Available Coupons</h5>
               </div>
               <div class="form-group d-flex gx-3">
                  <input type="text" oninput="coupon.name = this.value" name="coupon" placeholder="enter valid coupon code" class="form-control me-3">
                  <button class="apply_coupon_btn btn btn-primary" onclick="apply_coupon()">Apply</button>
               </div>
               <br>
               @php($i = 0)
               @foreach($coupons as $data)
               @php($i++)
               <div class="form-check">
                  <input class="form-check-input coupon_checkbox" data-coupon-code="{{$data->code}}" data-coupon-id="{{$data->id}}" value="{{$data->amount}}" type="checkbox" name="coupon" id="coupon">
                  <label class="form-check-label" for="coupon">
                     {{$data->code}}
                  </label>
               </div>
               @endforeach

               <div class="right">
                  <h5> TOTAL PAYMENT</h5>
                  <h6>₹ <span id="payment" data-ori-price="{{$price}}">{{$price}}</span>
                  </h6>
               </div>
            </ul>

            <div class="">
               <button class="btn btn-dark btn-xs" id="rzp-button1" data-buttonnext="">
                  PLACE ORDER</button>
            </div>

         </div>
      </div>
   </div>
   <!--order end -->






   <!-- JS FILES -->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/scripts.js"></script>


   <script>
      // Get the modal
      var modal = document.getElementById('id01');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
         if (event.target == modal) {
            modal.style.display = "none";
         }
      }
   </script>


   <script>
      let original = Number($("#payment").attr("data-ori-price"));
      $("[data-amount]").attr("data-amount", original * 100);

      if ($()) {

      }

      $('#walletCheck').on('click', function() {


         let original = Number($("#payment").attr("data-ori-price"));

         let amount = Number($("#payment").html());

         let wallet_avail_bal = Number($("#wallet_amount").attr("data-wallet"));

         let final;

         // alert(wallet_avail_bal);

         if (this.checked) {

            final = amount - wallet_avail_bal;

            $("#wallet_amount").attr("data-wallet", 0)


            if (final < 0) {
               $("#payment").html(0);
            } else {
               $("#payment").html(final);
            }
         } else {
            final = amount + Number("{{$wallet->amount}}");
            $("#payment").html(final);


            $("#wallet_amount").attr("data-wallet", $("#wallet_amount").html())

            // final = original;
         }
         $("[data-amount]").attr("data-amount", amount * 100)
      });


      var coupon = {
         name:'',
         amount:0,
         applied:false,
         final:Number($("#payment").html()),
         process:false,
         checked:false,
         id:0
      }


      function apply_coupon(){

         if(coupon.name.length < 1){
            alert('coupon code is empty')
            return false
         }

         if(!coupon.applied){
            coupon.process = true;
            $.ajax({
            type:'post',
            url:"{{route('coupon.check')}}",
            data:{name:coupon.name,service_id:'{{$service->id}}'},
            success:function(data){
               console.log(data);
               if(data.status === 'success'){
                   coupon.amount = Number(data.data.amount);
                   coupon.applied = true;
                   coupon.id = data.data.id;
                   coupon.process = false;


                   coupon.final = Number($("#payment").html()) - coupon.amount;

                   $("#payment").html(coupon.final);
                   
                   if(coupon.checked == false){
                      $(".apply_coupon_btn").text('remove').addClass('btn-dark');
                   }

                   $("[data-amount]").attr("data-amount", coupon.final * 100);

               }else{
                  alert(data.msg);
                  coupon.name = '';
                  coupon.amount = 0;
                  coupon.applied = false;
                  coupon.process = false;
                  coupon.id = 0;

                   $(".apply_coupon_btn").text('apply')
               }
            },
            error:function(err){
               console.log(err);
            }
           })

         }else{
            coupon.process = true;
            $(".apply_coupon_btn").text('apply').removeClass('btn-dark');
            $("[name=coupon]").val('');

            coupon.final = coupon.final + coupon.amount;
            coupon.name = '';
            coupon.amount = 0;
            coupon.id = 0;
            coupon.applied = false;
            coupon.process = false;
            $("#payment").html(coupon.final);
         }
           
      }


      $('.coupon_checkbox').on('change', function() {

         if(coupon.applied){
            apply_coupon();
         }

         if (this.checked) {
            coupon.checked = true
            coupon.name = $(this).attr("data-coupon-code");
            coupon.applied = false;
            apply_coupon();
         }else{
            coupon.checked = false
            coupon.applied = true;
            apply_coupon();
         }

         if(!coupon.process){
            $(".apply_coupon_btn").text('apply').removeClass('btn-dark');
         }

      });
   </script>
   <script src="https://checkout.razorpay.com/v1/checkout.js">
   </script>
   <script>
      $('body').on('click', '#rzp-button1', function(e) {
         e.preventDefault();


         var amount = $('#payment').html();
         let wallet;

         if ($("#walletCheck".checked)) {
            wallet = "{{$wallet->amount}}";
         } else {
            wallet = $("#wallet_amount").attr("data-wallet");
         }

         // var coupon = $("[name=coupon]").checked ? $("[name=coupon]").val() : 0;

         var coupon_id = coupon.id;

         var total_amount = amount * 100;
         var options = {
            "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
            "amount": Number(total_amount), // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
            "currency": "INR",
            "name": "CONSOLEGAL",
            "description": "Test Transaction",
            "image": "https://web-app-ca.herokuapp.com/image/logo.jpeg",
            "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function(response) {
               $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
               });
               $.ajax({
                  type: 'POST',
                  url: "/razorpay-payment",
                  data: {
                     razorpay_payment_id: response.razorpay_payment_id,
                     amount: amount,
                     service_points: "{{$points}}",
                     service_price: "{{$price}}",
                     service_id: "{{$service->id}}",
                     coupon: coupon_id,
                     wallet: wallet
                  },
                  beforeSend: function() {
                     $("#rzp-button1").html("Loading...")
                     $(".preloader-over").addClass("active")
                  },
                  success: function(data) {
                     console.log(data);
                     $('.amount').val('');
                     location.href = "/order/success";
                  },
                  complete: function() {
                     $("#rzp-button1").html("Place Order");
                     $(".preloader-over").removeClass("active")
                  }
               });
            },
            "prefill": {
               "name": "{{$user->name}}",
               "email": "{{$user->email}}",
               "contact": "{{$user->phone}}"
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



</body>

</html>