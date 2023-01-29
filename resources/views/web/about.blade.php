@extends("layouts.web")

@section('title','Consolegal | about')

@section('content')

<section id="about-us-home">
   <div class="row container-md mx-auto">
      <div class="col-md-6 lt order-2 order-md-1">
         <div class="content">
            <h2 class="heading">How We Started <span class="brandFont">ConsoLegal</span></h2>
            <p class="sub-para">We Started as a one man show in the profession gradually scaled up with the joining of passionate and experienced professionals from diverse backgrounds now launching our online platform ConsoLegal- Keep it Simple. We value accountability, transparency and simplicity.</p>
            <a class="btn an-btn">Get Started</a>
         </div>
      </div>
      <div class="col-md-6 rt order-1 order-md-2">
         <div class="img-container">
            <img src="{{asset('web/image/about-vector.webp')}}" alt="about-page-vector" class="img-fluid">
         </div>
      </div>

   </div>


</section>


<!-- content section  -->
<section class="content-section row mx-auto container-md px-0">
   <h1 class="title text-center py-4">About <span class="brandFont">ConsoLegal</span></h1>
   <div class="container-md col-md-9 mx-auto py-5 ">
      <p class="para">
         We Started as a one man show in the profession gradually scaled up with the joining of passionate and experienced professionals from diverse backgrounds now launching our online platform ConsoLegal- Keep it Simple. We value accountability, transparency and simplicity. We believe in simplifying Financial, taxation and business-related matters for our clients by providing one stop solution. Here not just services are provided but to provide a trusted presence for all your financial needs. Consolegal is a consulting firm with office based in Varanasi offering business incorporation, tax return preparation, tax audit compliances, GST registration & return preparation, TDS Return Filing, Trademark, Govt licenses and registrations, accounting, bookkeeping, payroll, ROC compliances and other related services
      </p>
      <p class="para">
         At ConsoLegal, Where passion meets profession & expectations meet excellence. We are a technology-driven platform trying to organize professional services industry in India. We are committed to helping start-ups, individuals, Companies and other businesses in solving legal compliance related to starting and running their business so that they can progress towards new level of success. We provide a range of client-oriented services to meet the emerging Accounting, Taxation, and Compliance challenges that you face by multiple fronts. We provide you with support services that can free up owners to concentrate on essential aspects of their business. We help companies to remain compliant and lawful. Our firm provides outstanding service to our clients because of our dedication to the three underlying principles- professionalism, responsiveness & quality
      </p>
      <p class="para">
         Our objective is to provide the best professional services across INDIA to reap the maximum benefits to maximum people. we assure that every client receives the close analysis and attention they deserve We pride ourselves on our knowledge and understanding of our clients and their organizations. it's our continuous goal to be a valued partner to each client whom we work with. We realize that timing is a crucial aspect of quality service and we carefully coordinate our work and delivery timelines with our clients to make sure it works with their schedules and that their expectations are met.
      </p>
      <p class="para">
         Whether it’s a simple tax return or more complex taxation advice, CONSOLEGAL is here to help you. Our ultimate goal is to be a value addition to your business for making you focus on your core business functions, let us provide the accounting, Tax compliances, legal and financial services.
      </p>
   </div>
   <div class="col-md-3 d-md-block d-none" style="overflow: hidden;">
      <br><br>
      <img src="https://cdn.pixabay.com/photo/2021/10/05/06/36/leaves-6682003_1280.jpg" alt="" height="600px">
   </div>
</section>

<!-- quick cards  -->
<section class="quick-cards">
   <div class="head">
      <h3 class="title">The Values We <br> Live By</h3>
      <p class="sub-title">Lorem ipsum dolor sit amet consectetur adipisicing
         elit. Eligendi, temporibus?</p>
   </div>

   <div class="cards-container container-md mx-auto ">
      <div class="cards">
         <div class="img"><img src="{{ asset('web/image')}}/national-top-50.svg" alt="" class="img-fluid"></div>
         <h3 class="title">Title for quick card</h3>
         <p class="sub-title">Lorem ipsum dolor </p>
         <p class="desc">adipisicing elit. Ipsa porro quia nemo iure, excepturi nobis nisi culpa.</p>
      </div>
      <div class="cards">
         <div class="img"><img src="{{ asset('web/image')}}/national-top-50.svg" alt="" class="img-fluid"></div>
         <h3 class="title">Title for quick card</h3>
         <p class="sub-title">Lorem ipsum dolor </p>
         <p class="desc">adipisicing elit. Ipsa porro quia nemo iure, excepturi nobis nisi culpa.</p>
      </div>
      <div class="cards">
         <div class="img"><img src="{{ asset('web/image')}}/national-top-50.svg" alt="" class="img-fluid"></div>
         <h3 class="title">Title for quick card</h3>
         <p class="sub-title">Lorem ipsum dolor </p>
         <p class="desc">adipisicing elit. Ipsa porro quia nemo iure, excepturi nobis nisi culpa.</p>
      </div>
   </div>

</section>



@endsection