@extends("layouts.web")

@section('title','Consolegal | Contact')

@section('content')

<!----- contact us home  ------->
<section class="mx-auto" id="contact-us">
   <h3 class="main-title text-center">Contact US</h3>
   <h5 class="sub-title text-center">Any Question and Remarks? Just write us a message</h5>


   <div class="main-row row container-md mx-auto">
      <div class="col-md-5 lt">
         <div class="info-card">
            <div class="top">
               <h3 class="title">Contact Information</h3>
               <p class="caption-info">Fill up the form and our Team will get back to you within 24 hours</p>
            </div>

            <div class="contact-info">
               <div class="box">
                  <span class="icon"><i class="fas fa-phone-alt"></i></span>
                  <span class="text">+91 {{config('app.phone')}}</span>
               </div>
               <div class="box">
                  <span class="icon"><i class="fas fa-envelope"></i></span>
                  <span class="text">{{config('app.email')}}</span>
               </div>
               <div class="box">
                  <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                  <span class="text">Varanasi, 221002</span>
               </div>
            </div>

            <div class="social-icons">
               <span class="icons"><a href="{{config('app.facebook')}}"><i class="fab fa-facebook-f"></a></i></span>
               <span class="icons"><a href="{{config('app.whatsapp')}}"><i class="fab fa-whatsapp"></a></i></span>
               <span class="icons"><a href="{{config('app.instagram')}}"><i class="fab fa-instagram"></a></i></span>
               <span class="icons"><a href="{{config('app.linkedin')}}"><i class="fab fa-linkedin"></a></i></span>
            </div>
         </div>
      </div>
      <div class="col-md-7 rt">
         <form class="row g-3" id="contact-form">
            @csrf
            <div class="col-md-12">
               <label for="inputEmail4" class="form-label">Full Name</label>
               <input type="text" name="name" class="form-control" id="inputEmail4" required>
            </div>
            <!-- <div class="col-md-6">
               <label for="inputPassword4" class="form-label">Last Name</label>
               <input type="text" class="form-control" id="inputPassword4">
            </div> -->
            <div class="col-6">
               <label for="inputAddress" class="form-label">E-mail</label>
               <input type="email" name="email" class="form-control" id="inputAddress" placeholder="xxxx@mail.com" required>
            </div>
            <div class="col-6">
               <label for="inputAddress2" class="form-label">Phone</label>
               <input type="text" name="phone" class="form-control" id="inputAddress2" placeholder="Phone: 123xxxx" required>
            </div>
            <div class="col-12">
               <label class="form-check-label" for="gridCheck">
                  Message (optional)
               </label>
               <input class="form-control" name="message" type="text" id="gridCheck">
            </div>
            <div class="col-12 p-4 ps-0">
               <button type="submit" class="btn an-btn">Send Message</button>
            </div>
            <p id="notify"></p>
         </form>
      </div>
   </div>

</section>



<script>
   $(document).on("submit", "#contact-form", function(e) {
      e.preventDefault();

      let formData = $(this).serialize();


      $.ajax({
         url: "/leads/web",
         type: "post",
         data: formData,
         success: function(data) {
            $("#notify").html("Success ! Thank you for contacting us ").css("color", "green");
         },
         error: function() {
            $("#notify").html("Failed to send ! Try with diffrent email & phone").css("color", "red");
            // alert("failed");
         }
      })
   })
</script>


@endsection