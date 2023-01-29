<!-- footer component  -->
<section class="mt-5" id="footer">
   <div class="subscribe-div row container mx-auto">
      <div class="col-4 lt">
         <h4>Subscribe To Our News Letter</h4>
      </div>
      <div class="col-8 rt">
         <form action="/email/subscribe" class="w-75" method="post" id="subscribe">
            <div class="email-box">
               <input type="email" placeholder="enter your email id" name="email" class="email mx-auto form-control " required>
            </div>
         </form>
         <button class="btn subscribe-btn" type="submit" form="subscribe">Subscribe</button>
         
         @if(Session::get('success'))
           <div class="text-white">
               {{session::get('success')}}
           </div>
        @endif
                            <span class="text-danger">{{Session::get("error")}}</span>
      </div>
   </div>

   <div class="social-icons-div">
      <div class="row main-row mx-auto p-0">
         <span class="col-md-4 col-6">Get Connected</span>
         <ul class="col-md-2 col-6">
            <li><a href="{{config('app.facebook')}}" target="_blank"><i class="fab fa-facebook"></i></a></li>
            
            <li><a href="{{config('app.whatsapp')}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
            
            <li><a href="{{config('app.twitter')}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
            
            <li><a href="{{config('app.instagram')}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
            
            <li><a href="{{config('app.linkedin')}}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            
            <!--<li><i class="fab fa-pinterest"></i></li>-->
            <!--<li><i class="fab fa-youtube"></i></li>-->
         </ul>
      </div>
   </div>

   <div class="content-row row mx-auto container-md">
      <div class="col-12 col-md-3 content">
         <h4 class="title">Incorporation</h4>
         <ul class="links-list">
            @foreach($service_menu as $data)
                     @if($data->category == "incorporation")
                     <li><a href="/services/{{$data->slug}}/{{$data->id}}">{{$data->name}}</a></li>
                     @endif
                     @endforeach
         </ul>
      </div>
      <div class="col-12 col-md-3 content">
         <h4 class="title">Registration</h4>
         <ul class="links-list">
            @foreach($service_menu as $data)
                     @if($data->category == "registration")
                     <li><a href="/services/{{$data->slug}}/{{$data->id}}">{{$data->name}}</a></li>
                     @endif
                     @endforeach

         </ul>
      </div>
      <div class="col-12 col-md-3 content">
         <h4 class="title">Tax/GST</h4>
         <ul class="links-list">
           @foreach($service_menu as $data)
                     @if($data->category == "tax/gst")
                     <li><a href="/services/{{$data->slug}}/{{$data->id}}">{{$data->name}}</a></li>
                     @endif
                     @endforeach
         </ul>
      </div>
      <div class="col-12 col-md-3 content">
         <h4 class="title">COMPLIANCE</h4>
         <ul class="links-list">
            @foreach($service_menu as $data)
                     @if($data->category == "compliance")
                     <li><a href="/services/{{$data->slug}}/{{$data->id}}">{{$data->name}}</a></li>
                     @endif
                     @endforeach

         </ul>
      </div>

   </div>

   <div class="bottom-div">
      <div class="row main-row mx-auto p-0">
         <ul class="col-md-7 col-12">
            <li><a href="/about" class="text-white text-decoration-none">About Us</a></li>
            <li><a href="/privacy" class="text-white text-decoration-none">Privacy Policy</a></li>
            <li><a href="/tnc" class="text-white text-decoration-none">Term & Condition</a></li>
            <li><a href="/refund" class="text-white text-decoration-none">Refund Policy</a></li>
            <li><a href="{{route('paynow')}}" class="text-white text-decoration-none">Pay Now</a></li>
            <li><a href="/contact" class="text-white text-decoration-none">Contact Us</a></li>
            <li><a href="/blogpage" class="text-white text-decoration-none">Blogs</a></li>
            <li>Site Map</li>
         </ul>
         <span class="col-md-4">Copyright &copy;{{date('Y')}} {{config('app.name')}}</span>
      </div>
   </div>
</section>

<script>
   var joinUrl = "{{route('join.post')}}";
</script>
<!------------------------------------------- scripts  -------------------------------------------->
<!----------- jquery  --------->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('web/js/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('web/js/typed.js')}}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="https://unpkg.com/tilt.js@1.1.19/dest/tilt.jquery.js"></script>
<script src="{{ asset('web/js/index.js')}}"></script>
<script>
   AOS.init();
</script>