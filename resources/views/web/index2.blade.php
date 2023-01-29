@extends("layouts.web")

@section('title','Consolegal | Services')

@section('content')



<!---------- header  ---------->
<section class="mb-5" id="header1">
   <div class="div row container main-row mx-auto">
      <div class="col-12 col-md-6 lt">
         <h3 class="title">{!!$service->name!!}</h3>
         <p class="para">
            {!!$service->description!!}
         </p>
         <div class="package">
            <p class="caption">Package Inclusion :-</p>

            <ul class=" list-container">
               @foreach ( $sub_head as $list)
               <li class="list">{{$list->sub_head}}</li>
               @endforeach
            </ul>
         </div>
      </div>

      <div class="col-12 col-md-6 rt">
         <form id="lead-form">
            <h3 class="title mb-4">Get Started</h3>
            <div class="row g-3">
               <div class="col-12 col-md-6">
                  <input type="text" required 
                  value="" name="name" class="form-control" placeholder="Name">
               </div>
               <div class="col-12 col-md-6">
                  <input type="text" required name="email" class="form-control" placeholder="Email">
               </div>
               <div class="col-12 col-md-6">
                  <input type="text" required name="phone" class="form-control" placeholder="Phone">
               </div>
               <div class="col-12 col-md-6">
                  <select name="service_id" required id="get-started-form1" class="form-select">
                     <option value="#"><span class="text-muted">Select Services</span></option>

                     <option value="{{$service->id}}"><span class="text-muted">{{$service->name}}</span></option>
                     @foreach($services_all as $data)
                     @if($data->name != $service->name)
                     <option value="{{$data->id}}"><span class="text-muted">{{$data->name}}</span></option>
                     @endif
                     @endforeach

                  </select>
               </div>
               <div class="col-12">
                  <button type="submits" class=" btn an-btn px-4">Send</button>
               </div>
               <p id="notify"></p>
               <!-- phone hide span  -->
               <div class="d-none box-container d-md-flex row mt-3 mx-auto">
                  <div class="box col-5">
                     <h5 class="nos">50000+</h5>
                     <span class="caption">Happy customers</span>
                  </div>
                  <div class="box col-4">
                     <h5 class="nos">300+</h5>
                     <span class="caption">Professionals</span>
                  </div>
                  <div class="box col-3">
                     <h5 class="nos">250+</h5>
                     <span class="caption">Partners</span>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
   <!---------- side social bar  ------------>
   @include('layouts.incl.social')
</section>





<a class="inquiry-btn btn btn-warning" title="Fill Enquiry Form" href="#">INQUIRY</a>


<!---------- how to start  ---------->
<section class="mt-5">
   <h2 class="text-center main-title">How to Start a Private Limited Company Registration</h2>
   <div class="main-img-container w-75 mx-auto p-3">
      <img src="{{ asset('web/image')}}/processindex2.png" alt="" class="img-fluid">
   </div>
</section>

<!---------- main content  ---------->

<section class="mb-5 bg-light py-5">

   <div class="row mx-auto scrollspy-custom">
      <!-- side active tab indicator (phone hide)-->
      <div class="col-md-3 d-none d-md-block lt bar-container">
         <ul class="bar-list">
            <li class="active-li">
               <a href="" class="bar-item ">
                  <span class="icon "><i class="fas fa-chart-bar"></i></span>Overview
               </a>
            </li>
            <li>
               <a href="" class="bar-item"><span class="icon "><i class="fas fa-wallet"></i></span>Benefits
               </a>
            </li>
            <li><a href="" class="bar-item"><span class="icon "><i class="fas fa-seedling"></i></span>Requirements</a></li>
            <li><a href="" class="bar-item"><span class="icon "><i class="fas fa-list-ul"></i></span>Listicles</a></li>
            <li><a href="" class="bar-item"><span class="icon "><i class="fab fa-wpforms"></i></span>Registration Procedure</a></li>
            <li><a href="" class="bar-item"><span class="icon"><i class="fas fa-info"></i></span>Other Information</a></li>
            <li><a href="" class="bar-item"><span class="icon "><i class="far fa-folder-open"></i></span>Comparison Guide</a></li>
            <li><a href="" class="bar-item"><span class="icon "><i class="far fa-question-circle"></i></span>Faqs</a></li>
         </ul>
      </div>
      <!-- main scroll container  -->
      <div class="col-md-9 col-lg-6 scroll-container md">

         <!-- overview section  -->
         <div class="scroll-section" id="overview">

            @foreach($tabs as $data)
            @if($data->name == "overview")
            {!!$data->description!!}
            @endif
            @endforeach


            <!------<div class="section-video">
               <iframe src="https://www.youtube.com/embed/o9N6P8xdqbo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>----->

            <!--<form action="" class="bg-white p-4 rounded-3 my-4 box-shadow">-->
            <!--   <h4 class="text-center pb-2">Company Registration</h4>-->
            <!--   <div class="row g-3">-->
            <!--      <div class="col-12 col-md-6">-->
            <!--         <input type="text" name="name" class="form-control" placeholder="Name">-->
            <!--      </div>-->
            <!--      <div class="col-12 col-md-6">-->
            <!--         <input type="text" name="email" class="form-control" placeholder="Email">-->
            <!--      </div>-->
            <!--      <div class="col-12 col-md-6">-->
            <!--         <input type="text" name="phone" class="form-control" placeholder="Phone">-->
            <!--      </div>-->
            <!--      <div class="col-12 col-md-6">-->
            <!--         <select name="state" id="company-registratio-form" class="form-select">-->
            <!--            <option value="#"><span class="text-muted">Select State</span></option>-->
            <!--         </select>-->
            <!--      </div>-->
            <!--      <div class="col-12 text-center">-->
            <!--         <button class=" btn px-5 btn-danger">Send Now</button>-->
            <!--      </div>-->
            <!--   </div>-->
            <!--</form>-->

         </div>
         <!-- benefit section  -->
         <div class="scroll-section" id="benefits">
            @foreach($tabs as $data)
            @if($data->name == "details")
            {!!$data->description!!}
            @endif
            @endforeach


         </div>

         <!-- requirement section  -->
         <div class="scroll-section" id="requirement">
            @foreach($tabs as $data)
            @if($data->name == "require")
            {!!$data->description!!}
            @endif
            @endforeach
           
         </div>
         <!-- listicles section  -->
         <div class="scroll-section" id="listicles">
            @foreach($tabs as $data)
            @if($data->name == "listicles")
            {!!$data->description!!}
            @endif
            @endforeach
          
         </div>
         <!-- registration procedure -->
         <div class="scroll-section" id="registration">
            @foreach($tabs as $data)
            @if($data->name == "regs")
            {!!$data->description!!}
            @endif
            @endforeach
         </div>
         <!-- other information  -->
         <div class="scroll-section" id="other">
            @foreach($tabs as $data)
            @if($data->name == "others")
            {!!$data->description!!}
            @endif
            @endforeach
         </div>
         <!-- comparison guide  -->
         <div class="scroll-section" id="comparison">
            @foreach($tabs as $data)
            @if($data->name == "others")
            {!!$data->description!!}
            @endif
            @endforeach
         </div>
         <!-- Faqs  -->
         <div class="scroll-section" id="faqs">
            @foreach($tabs as $data)
            @if($data->name == "faq")
            {!!$data->description!!}
            @endif
            @endforeach
         </div>




      </div>
      <!-- sticky form (phone hide) -->
      <div class="col-md-3 d-none d-lg-block sticky-form-container rt">
         <form action="/order" method="post" id="service-form" class="bg-white p-4 rounded-3 my-4 box-shadow ">
            @csrf
            <h4 class="text-center pb-2">Get Started</h4>
            <div class="row g-3">
               <div class="col-12">
                  <input type="text" value="{{$user?$user->name:''}}" name="name" required class="form-control" placeholder="Name">
               </div>
               <div class="col-12">
                  <input type="text" value="{{$user?$user->email:''}}" name="email" required class="form-control" placeholder="Email">
               </div>
               <div class="col-12">
                  <input type="text" value="{{$user?$user->phone:''}}" name="phone" required class="form-control" placeholder="Phone">
               </div>
               <div class="col-12">
                  <select name="service_id" id="get-started-form" required class="form-select">
                     <option value="{{$service->id}}"><span class="text-muted">{{$service->name}}</span></option>

                     @foreach($services_all as $data)
                     @if($data->name != $service->name)
                     <option value="{{$data->id}}"><span class="text-muted">{{$data->name}}</span></option>
                     @endif
                     @endforeach
                  </select>
               </div>
               <div class="col-12 text-center">
                  <button type="submit" class="btn px-5 btn-danger">Buy Now</button>
               </div>
               <div class="text-center">
                  <p class="small">
                     Easy Payment Options Available No Spam. No Sharing. 100% Confidentiality
                  </p>
               </div>
            </div>
         </form>
      </div>
   </div>

</section>

<script>
   $(document).on("submit", "#lead-form", function(e) {
      e.preventDefault();

      let formData = $(this).serialize();

      $.ajax({
         url: "/leads/web",
         type: "post",
         data: formData,
         success: function(data) {
            $("#notify").html("Thank You ! Request sent successfuly").css("color", "green");
         },
         complete: function() {
            location.href = "/thankyou";
         },
         error: function() {
            $("#notify").html("failed to send ! Try diffrent email and phone").css("color", "red");
         }
      })
   })
</script>


@endsection