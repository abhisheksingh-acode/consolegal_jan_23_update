@extends('layouts.web')

@section('title','ConsoLegal | Home')

@section('content')


<!---------- header  ------------>
<header class="mx-0 ">
   <div class="row main-row mx-auto h-100">
      <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center px-md-5">
         <form class="d-flex w-100 mb-3 position-relative" action="/services" method="get" id="search">
            <input class="form-control me-2 " oninput="liveSearch(this.value)" list="servicelist" type="text" autocomplete="off" placeholder="Search" name="search" aria-label="Search">
            @foreach($service_menu as $data)
            @if ($data->name == "value")
            {{$id = $data->id}}
            @else
            {{$id = ""}}
            @endif
            @endforeach
            
            <div class="suggestionBox shadow d-none" 
             style="background: #fff;padding: 10px;width: 100%;position:absolute;top: 103%;left: 0; z-index:10;">
                <ul class="list-unstyled live-suggestion-container">
                    
                </ul>
            </div>
         </form>
         <h5 class="p-2 fw-bold">Our Categories:</h5>

         <div class="row mx-auto p-0 category-grid gy-3">
            <div class="col-6 col-md-4 grid-item"><a href="/services/FSSAI-Registration/85">Incorporation</a></div>
            <div class="col-6 col-md-4 grid-item"><a href="/services/EPF-Registration/87">Registration</a></div>
            <div class="col-6 col-md-4 grid-item"><a href="/services/Income-Tax-Return/102">Tax/GST</a></div>
            <div class="col-6 col-md-4 grid-item"><a href="/services/Company-Annual-Filing/96">Compliance</a></div>
            <div class="col-6 col-md-4 grid-item"><a href="/insurance/life">Insurance</a></div>
            <div class="col-6 col-md-4 grid-item"><a href="/loan/personal">Loan</a></div>

            <div class="col-6 col-md-4 grid-item d-none d-md-block "><a href="/services/PSARA-License/91">PSARA License</a></div>
            <div class="col-6 col-md-4 grid-item d-none d-md-block "><a href="/services/Trade-License/93">Trade License</a></div>
            <div class="col-6 col-md-4 grid-item d-none d-md-block "><a href="/services/TDS-Return/122">TDS Return</a></div>
         </div>
      </div>
      <div class="col-12 col-md-6 mx-auto icons-grid row">
         <div class="icon col-6 col-md-4">
            <div class="inner">
               <img src="{{ asset('web/image')}}/Income-tax-return.png" alt="">
               <span>Income tax</span>
            </div>
         </div>
         <div class="icon col-6 col-md-4">
            <div class="inner">
               <img src="{{ asset('web/image')}}/Loan.png" alt="">
               <span>Loan</span>
            </div>
         </div>
         <div class="icon col-6 col-md-4">
            <div class="inner">
               <img src="{{ asset('web/image')}}/GST.png" alt="">
               <span>GST</span>
            </div>
         </div>
         <div class="icon col-6 col-md-4">
            <div class="inner">
               <img src="{{ asset('web/image')}}/Payroll-Managment.png" alt="">
               <span>Payroll Managment</span>
            </div>
         </div>
         <div class="icon col-6 col-md-4">
            <div class="inner">
               <img src="{{ asset('web/image')}}/Insurance.png" alt="">
               <span>Insurance</span>
            </div>
         </div>
         <div class="icon col-6 col-md-4">
            <div class="inner">
               <img src="{{ asset('web/image')}}/Income-tax-return.png" alt="">
               <span>Income Tax Return</span>
            </div>
         </div>
         <div class="icon col-6 col-md-4">
            <div class="inner">
               <img src="{{ asset('web/image')}}/Trade-mark-Registration.png" alt="">
               <span>Trademark Registration</span>
            </div>
         </div>
         <div class="icon col-6 col-md-4">
            <div class="inner">
               <img src="{{ asset('web/image')}}/TDS-Return.png" alt="">
               <span>TDS Return</span>
            </div>
         </div>
         <div class="icon col-6 col-md-4">
            <div class="inner">
               <img src="{{ asset('web/image')}}/Registration-Certificate.png" alt="">
               <span>Registration Certificate</span>
            </div>
         </div>
      </div>
   </div>

   <!---------- side social bar  ------------>
   @include('layouts.incl.social')
</header>


<!---------- about us  ------------>
<section class="my-md-5 py-5" id="about-us">
   <div class="row container-md mx-auto">
      <h1 class="title text-center fw-bold d-md-none" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-once="true"> About <span class="brandFont">ConsoLegal</span></h1>

      <div class="col-md-5 col-12 d-flex align-items-center order-3 order-md-1 lt">
         <div class="inner-div ">
            <h1 class="title fw-bold d-none d-md-block" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-once="true"> About <span class="brandFont">ConsoLegal</span></h1>

            <p class="para my-3" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-once="true">
               We Started as a one man show in the profession gradually scaled up with the joining of passionate and experienced professionals from diverse backgrounds now launching our online platform ConsoLegal- Keep it Simple. We value accountability, transparency and simplicity.</p>
            <div class="button" data-aos="fade-up" data-aos-offset="100" data-aos-duration="1000" data-aos-once="true">
               <a href="/about" class="btn an-btn">Read More</a>
            </div>
         </div>
      </div>
      <div class="col-md-1 order-2"></div>
      <div class="col-md-6 col-12 order-1 order-md-3 d-flex justify-content-center rt align-items-center">
         <div class="img-container mx-auto text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-once="true">
            <img src="{{ asset('web/image')}}/about-us.svg" alt="" class="img-fluid">
         </div>
         <div class="float float1">
            <div class="icon"><i class="fas fa-user"></i></div>
            <div class="main">
               <div class="caption">Happy clients</div>
               <div class="nos">200+</div>
            </div>
         </div>
         <div class="float float2">
            <div class="icon"><i class="fas fa-file-alt"></i></div>
            <div class="main">
               <div class="caption">Projects Delivered</div>
               <div class="nos">250+</div>
            </div>
         </div>
         <div class="float float3">
            <div class="icon"><i class="fas fa-trophy"></i></div>
            <div class="main">
               <div class="caption">Awards Received</div>
               <div class="nos">20+</div>
            </div>
         </div>
         <div class="float float4">
            <div class="icon"><i class="far fa-building"></i></div>
            <div class="main">
               <div class="caption">Industries Served</div>
               <div class="nos">30+</div>
            </div>
         </div>
      </div>
      <!-- <div class="col-md-1"></div> -->
   </div>
</section>


<!---------- why choose  ------------>
<section class="my-5 position-relative" id="why-choose">
   <!-- sidebar caption  -->
   <!-- <h3 class="side-caption">Why Choose Us</h3> -->

   <div class="row mx-auto main-row">
      <h2 class="text-center">Why Choose <span class="brandFont fw-bold">ConsoLegal</span></h2>
      <h6 class="text-muted text-center fw-normal">5 Reasons Why You Trust Us</h6>
      <div class="swiper-container-why-choose mx-auto">
         <div class="swiper-wrapper">
            <div class="swiper-slide">
               <div class="inner-card bg-danger">
                  <div class="main-div">
                     <div class="img-container">
                        <img src="{{ asset('web/image')}}/CL.png" alt="">
                     </div>
                     <h6 class="title">7+ Years Experience</h6>
                     <p class="para">
                        We are expert in the industry from last 7 years. Continuously delivering the best services for our clients. We provide the best and the most affordable legal services in the country. Our clients trust us on our quality.
                     </p>
                  </div>
                  <div class="side-image">
                     <img src="{{ asset('web/image')}}/Quick-Support/customers.png" alt="" class="img-fluid">
                  </div>
               </div>
            </div>
            <div class="swiper-slide">
               <div class="inner-card bg-warning">
                  <div class="main-div">
                     <div class="img-container">
                        <img src="{{ asset('web/image')}}/CL.png" alt="">
                     </div>
                     <h6 class="title">99% Client Satisfaction</h6>
                     <p class="para">
                        99% client satisfactions: We always treat our clients at first. Client satisfaction is our main motive. We work because we want our clients to trust us. Hence from last 7 years we have got to 99% of our clients satisfied with us.
                     </p>
                  </div>
                  <div class="side-image">
                     <img src="{{ asset('web/image')}}/Quick-Support/Expertprofessional.png" alt="" class="img-fluid">
                  </div>
               </div>
            </div>
            <div class="swiper-slide">
               <div class="inner-card bg-primary">
                  <div class="main-div">
                     <div class="img-container">
                        <img src="{{ asset('web/image')}}/CL.png" alt="">
                     </div>
                     <h6 class="title">Cost Effective</h6>
                     <p class="para">
                        Cost effective: This is one of our main Feature. We always be the affordable one from the market. We are the guys who committ industry best services at a much affordable prices.
                     </p>
                  </div>
                  <div class="side-image">
                     <img src="{{ asset('web/image')}}/Quick-Support/CostEffective.png" alt="" class="img-fluid">
                  </div>
               </div>
            </div>
            <div class="swiper-slide">
               <div class="inner-card bg-danger">
                  <div class="main-div">
                     <div class="img-container">
                        <img src="{{ asset('web/image')}}/CL.png" alt="">
                     </div>
                     <h6 class="title">Quick Support</h6>
                     <p class="para">
                        Quick support: We provide you with the 24/7 quickest. Service as possible. We always be the first in giving our clients the best they want. From us.
                     </p>
                  </div>
                  <div class="side-image">
                     <img src="{{ asset('web/image')}}/Quick-Support/QuickSupport.png" alt="" class="img-fluid">
                  </div>
               </div>
            </div>
            <div class="swiper-slide">
               <div class="inner-card bg-warning">
                  <div class="main-div">
                     <div class="img-container">
                        <img src="{{ asset('web/image')}}/CL.png" alt="">
                     </div>
                     <h6 class="title">Expert Professional Services</h6>
                     <p class="para">
                        Expert professional services: Last but not the least we are a team of expert, who are willing to provide you the best of service that our clients demands.
                     </p>
                  </div>
                  <div class="side-image">
                     <img src="{{ asset('web/image')}}/Quick-Support/yrexperience.png" alt="" class="img-fluid">
                  </div>
               </div>
            </div>
         </div>
         <div class="swiper-next-btn d-none d-md-block" title="next"><i class="fas fa-long-arrow-alt-right"></i></div>
         <!-- <div class="swiper-prev-btn"><i class="fas fa-chevron-left"></i></div> -->
      </div>
   </div>
</section>


<!---------- our services  ------------>
<section class="my-5 position-relative" id="our-service">
   <!-- side caption  -->
   <h3 class="side-caption">Services</h3>
   <!-- side caption  -->
   <div class="row main-row mx-auto p-0">
      <h2 class="text-center mb-4">Services Offered at <span class="brandFont fw-bold">ConsoLegal</span></h2>

      <!-- left section  -->
      <div class="col-12 col-md-3 lt">
         <div class="tabs-div">
            <ul>
               <li class="tabs tab1 active-li">
                  <input type="radio" checked="checked" name="tabs">
                  <label>
                     Business Registration
                  </label>
               </li>
               <li class="tabs tab2">
                  <input type="radio" name="tabs">
                  <label>
                     Government Registration
                  </label>
               </li>
               <li class="tabs tab3">
                  <input type="radio" name="tabs">
                  <label>
                     Business Licenses
                  </label>
               </li>
               <li class="tabs tab4">
                  <input type="radio" name="tabs">
                  <label>
                     Taxation
                  </label>
               </li>
               <li class="tabs tab5">
                  <input type="radio" name="tabs">
                  <label>
                     IPR & Other
                  </label>
               </li>
               <li class="tabs tab6">
                  <input type="radio" name="tabs">
                  <label>
                     Compliances
                  </label>
               </li>
            </ul>
         </div>
      </div>
      <!-- right section  -->

      <!-- container for tab1 -->
      <div class="col-12 col-md-9 rt tab-container row mx-0">
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Private Limited Company Incorporation</h6>
               <p class="para">A private limited company, or LTD, is a type of privately held small business entity.</p>

               <a href="/services/Private-Limited-Company/125" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">LLP/Partnership Firm Registration</h6>
               <p class="para">LLP is an alternative corporate business form that gives the benefits of limited liability of a company and the flexibility of a partnership.</p>

               <a href="/services/Partnership-Registration/123" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Proprietorship Firm Registration</h6>
               <p class="para">A sole proprietorship is the simplest and most common structure chosen to start a business.</p>

               <a href="/services/One-Person-Company-Registration/126" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Nidhi Company Registration</h6>
               <p class="para">Nidhi Company works with the objective of increasing savings of its members.</p>

               <a href="/services/Nidhi-Company-Compliance/98" class="btn">Get Started</a>
            </div>
         </div>
      </div>
      <!-- container for tab2 -->
      <div class="col-12 col-md-9 rt tab-container d-none row mx-0">
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">MSME/Udyam Registration</h6>
               <p class="para">Udyam (MSME) Registration is Free of Cost and paperless and no online or offline agency.</p>

               <a href="/services/MSME/SSI-Registration/127" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Import Export Code Registration</h6>
               <p class="para">An Importer-Exporter Code is a business identification number which mandatory for export from India or Import to India.</p>

               <a href="/services/Import-Export-Code-Registration/89" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">EPF & ESI Registration</h6>
               <p class="para">In both the schemes a percentage is deducted from employee's salary and proportionate amount is added to it.</p>

               <a href="/services/EPF-Registration/87" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Shop & Establishment Registration</h6>
               <p class="para">A shop or establishment registration certificate gives businesses the right to conduct work in a particular state.</p>

               <a href="/services/Shop-&-Establishment-Registration/86" class="btn">Get Started</a>
            </div>
         </div>
      </div>
      <!-- container for tab3 -->
      <div class="col-12 col-md-9 rt tab-container d-none row mx-0">
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">FSSAI License</h6>
               <p class="para">FSSAI registration or License is mandatory for all types of food business operators in India.</p>

               <a href="/services/FSSAI-Registration/85" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Drug License</h6>
               <p class="para">The drug sale license is issued for both retail as well as wholesale purpose for the distribution of drug in India.</p>

               <a href="/services/Drug-License/92" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Trade License</h6>
               <p class="para">Every trader involved in a general trading activity within the territorial boundaries of any municipal corporation is required to get a trade license.</p>

               <a href="/services/Trade-License/93" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">PSARA License</h6>
               <p class="para">PSARA license is a must requirement for opening any private security agency in India.</p>

               <a href="/services/PSARA-License/91" class="btn">Get Started</a>
            </div>
         </div>
      </div>
      <!-- container for tab4 -->
      <div class="col-12 col-md-9 rt tab-container d-none row mx-0">
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Income Tax Return</h6>
               <p class="para">A tax return is documentation filed with a tax authority that reports income, expenses, and other relevant financial information.</p>

               <a href="/services/Income-Tax-Return/102" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">GST Registration</h6>
               <p class="para">You can get your GSTIN as a sole proprietor or as a partnership business as well.</p>

               <a href="/services/GST-Registration/120" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">GST Return</h6>
               <p class="para">A GST return is a document containing details of all income/sales and/or expense/purchase which a taxpayer (every GSTIN) is required to file.</p>

               <a href="/services/GST-Return/121" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">TDS Return</h6>
               <p class="para">TDS Return is a quarterly statement submitted by the deductor to the Income Tax Department.</p>

               <a href="/services/TDS-Return/122" class="btn">Get Started</a>
            </div>
         </div>
      </div>
      <!-- container for tab5 -->
      <div class="col-12 col-md-9 rt tab-container d-none row mx-0">
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Trademark Registration</h6>
               <p class="para">It grants you the legal right to use your trademark exclusively in such countries.</p>

               <a href="/services/Trademark-Registration/94" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">ISO Registration</h6>
               <p class="para">Seal of approval from a third party body that a company runs to one of the international standards developed.</p>

               <a href="/services/ISO-Registration/90" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Payroll Management</h6>
               <p class="para">The process of administration of a company's employee's financial records.</p>

               <a href="/services/ISO-Registration/90" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Accounting/ Bookeeping</h6>
               <p class="para">The process of recording your company's financial transactions into organized accounts on a daily basis.</p>

               <a href="javascript:void(0)" class="btn">Get Started</a>
            </div>
         </div>
      </div>
      <!-- container for tab6 -->
      <div class="col-12 col-md-9 rt tab-container d-none row mx-0">
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Company Annual Filling</h6>
               <p class="para">Company Annual Filings refers to the filing of Audited Annual Financial Accounts of the Company.</p>

               <a href="/services/Company-Annual-Filing/96" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">LLP Annual Filling</h6>
               <p class="para">LLP is required to file LLP Form 8 (Statement of Account & Solvency) and LLP Form 11 (Annual Return) annually.</p>

               <a href="/services/LLP-Annual-Filing/97" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Nidhi Company Compliances </h6>
               <p class="para">For filing financial documents and other supporting documents to the Registrar of Companies.</p>

               <a href="/services/Nidhi-Company-Compliance/98" class="btn">Get Started</a>
            </div>
         </div>
         <!-- cards container  -->
         <div class="col-12 col-md-6">
            <div class="cards">
               <div class="img-container">
                  <img src="{{ asset('web/image')}}/order.png" alt="">
               </div>
               <h6 class="title">Event Based Compliances</h6>
               <p class="para">The Event-Based Compliances are those mandatory compliances which are other than the usual and necessary annual and periodical compliances</p>

               <a href="/services/Nidhi-Company-Compliance/98" class="btn">Get Started</a>
            </div>
         </div>
      </div>






   </div>
</section>


<!---------- USP section ------------>
<section class="my-5" id="USP">
   <h2 class="text-center main-title mb-3">USP</h2>

   <div class="usp-row row container-md mx-auto py-5">
      <div class="col-md-4 col-12">
         <div class="usp-card">
            <div class="img-container">
               <img src="{{asset('web')}}/image/usp/1.jpg" alt="" class="img-fluid">
            </div>
            <div class="content-box">
               <h3 class="title">Business Portfolio Management</h3>
               <p class="desc">Our diversified and adept resources are expert in building, scaling and managing enterprises for optimal results. We help you in management of your finance and taxes so as to act as a facilitator to empower individuals/business owners.</p>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-12">
         <div class="usp-card">
            <div class="img-container">
               <img src="{{asset('web')}}/image/usp/2.jpg" alt="" class="img-fluid">
            </div>
            <div class="content-box">
               <h3 class="title">Ease of Doing Business</h3>
               <p class="desc">We pool our resource to provide you the ease of doing business. Our combined expertise caters to all your business needs with personal keenness and individual attention irrespective of the size of your enterprise. Your accounts will be at you finger tips so as to make your life simple.</p>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-12">
         <div class="usp-card">
            <div class="img-container">
               <img src="{{asset('web')}}/image/usp/3.jpg" alt="" class="img-fluid">
            </div>
            <div class="content-box">
               <h3 class="title">Dedicated Communication Centre</h3>
               <p class="desc">Our diverse talents and our dedication provide high quality and timely service to our clients. Our firm is responsive and proactive to your needs /compliance. We cater you with accurate and timely interventions and advice. Finances and compliances being our forte we ensure that our clients will get undivided attention to other aspects of the business as well.</p>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-12">
         <div class="usp-card">
            <div class="img-container">
               <img src="{{asset('web')}}/image/usp/4.jpg" alt="" class="img-fluid">
            </div>
            <div class="content-box">
               <h3 class="title">Transparent pricing structure</h3>
               <p class="desc">Our pricing has been tailored to accommodate every Individuals and Companies of all sizes and capacity. Transparency builds trust, which is an essence for effective teamwork. There are no hidden costs involved in our pricing structure.</p>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-12">
         <div class="usp-card">
            <div class="img-container">
               <img src="{{asset('web')}}/image/usp/5.jpg" alt="" class="img-fluid">
            </div>
            <div class="content-box">
               <h3 class="title">Guidance for Efficient Business Operations</h3>
               <p class="desc">A firm's reputation is built on the quality of its services. Our primary goal as a trusted advisor is to be available and to provide insightful advice to enable our clients to make informed financial decisions related to your Business and Taxes. We'll take care of all of your issues about your tax and financial situations. You may mail/contact us at any time.</p>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-12">
         <div class="usp-card">
            <div class="img-container">
               <img src="{{asset('web')}}/image/usp/6.jpg" alt="" class="img-fluid">
            </div>
            <div class="content-box">
               <h3 class="title">Promoting Entrepreneurship through Franchise opportunity</h3>
               <p class="desc">Franchise businesses are advantageous to aspiring entrepreneurs because they allow them to lower start-up costs and the risk of beginning a business on their own. We help businesses/individuals in managing tax and financial compliances with accuracy and precision. We also extend a 360^ support for entrepreneurs who invest in franchise model, from ideation to kick-starting. We help you to shape your aspirations.</p>
            </div>
         </div>
      </div>
   </div>

</section>

<!-- Usp card hover  -->



<!-- our process  -->
<section class="mb-0 my-md-5" id="our-process">
   <div class="row container-md mx-auto main-row">
          <h3 class="title text-center col-12">Working Process at ConsoLegal</h3>
      <div class="col-md-6 lt">
         <div class="head" style="width: 70%;">
         
            <!--<p class="sub-title">Lorem ipsum dolor sit amet consectetur-->
            <!--   adipisicing elit. Facere, fuga.</p>-->
         </div>

         <div class="img-container">
            <img src="{{ asset('web/image')}}/processhome.png" alt="" class="img-fluid">
         </div>
      </div>
      <div class="col-md-6 rt">
         <div class="accordions">
            <div class="accordion-box">
               <div class="title show">Make Enquiry</div>
               <div class="dropdown-content">
                  <p class="desc">Share your Contact Details and
                     receive free consultation.</p>
               </div>
            </div>
            <div class="accordion-box">
               <div class="title ">Make Payments</div>
               <div class="dropdown-content">
                  <p class="desc">Make Online or Offline Payment for
                     your Order.</p>
               </div>
            </div>
            <div class="accordion-box">
               <div class="title">Submit Documents</div>
               <div class="dropdown-content">
                  <p class="desc">Submit Documents for your
                     Order Using Online Dashboard.</p>
               </div>
            </div>
            <div class="accordion-box">
               <div class="title">Work Completed</div>
               <div class="dropdown-content">
                  <p class="desc">Work will be completed by us and
                     updates delivered Online.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- app download section  -->
<section class="mt-0 my-md-5" id="join-app">
   <div class="row mx-auto container-md main-row">
      <h2 class="heading theme-orange col-12 text-center d-md-none">ConsoLegal App for IOS and Android coming soon</h2>

      <div class="col-md-6 d-flex lt">
         <div class="img-container">
            <img src="{{ asset('web/image')}}/mobile-app.jpg" alt="">
            <img src="{{ asset('web/image')}}/app2.png" alt="">
         </div>
      </div>
      <div class="col-md-6 rt">
         <div class="inner-div">
            <h2 class="heading d-none d-md-block">ConsoLegal App for IOS and Android coming soon</h2>
            <p class="sub-heading">Book Services, Ask Free Questions, share knowledge with Verified Experts.</p>
            <span class="sub-heading">Download Our App</span>

            <form id="join-form">
                @csrf
               <div class="">
                  <div class="input-group mb-3">
                     <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">+91</button>
                     <input type="text" required name="phone" class="form-control" aria-label="Text input with dropdown button" placeholder="Mobile Number">
                  </div>
               </div>
            </form>
            <button type="submit" class="btn" form="join-form">Join Waiting list</button>
            <div class="row mx-auto justify-content-center mt-2">
               <div class="col-7"><img src="{{ asset('web/image')}}/android-ios.png" alt="" class="img-fluid"></div>
               <!-- <div class="col-3"><img src="https://www.gigzoe.com/static/media/Ios-Button.c68c9de3.png" alt="" class="img-fluid"></div> -->
            </div>
         </div>

      </div>
   </div>
</section>

<!---------- FAQs section ------------>

@include('layouts.incl.faq')



<!----------- blogs section  ---------->
<section class="my-5" id="blogs">
   <h2 class="main-title text-center mb-5">Latest Blogs</h2>

   <div class="swiper-container-blog">
      <div class="swiper-wrapper">
         <!-- slide 1 -->

         @foreach($blogs as $data)

         <div class="swiper-slide">
            <div class="blog-card-container">
               <div class="img-container">
                  <span class="date">{{$data->created_at->toFormattedDateString()}}</span>
                  <img src="{{ asset('storage')}}/{{$data->image}}" class="" alt="">
               </div>
               <div class="title">
                  <h5>{{$data->title}}</h5>
               </div>
               <div class="tags">
                  <span class="author">Posted By: Author</span>

                  <ol class="tag-list">
                     <li>{{$data->highlight1}}</li>
                     <li>{{$data->highlight2}}</li>
                  </ol>

               </div>
               <div class="read-more"><a href="/blogpage/{{$data->id}}" class="btn an-btn">Read More</a></div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
   <div class="swiper-prev-btn"><i class="fas fa-chevron-left"></i></div>
   <div class="swiper-next-btn"><i class="fas fa-chevron-right"></i></div>
</section>


<!----------- clients section  ----------->
<section class="my-5" id="clients">
   <div class="row mx-auto">
      <div class="col-3 col-md-2 d-flex justify-content-center align-items-center">
         <h4 class="main-title">CLIENT</h4>
      </div>
      <div class="col-9 col-md-10 clients-slider-container ">
         <div class="clients-slider">
            <div class="img-container"><img src="{{ asset('web/image/client')}}/1.jpeg" alt=""></div>
            <div class="img-container"><img src="{{ asset('web/image/client')}}/2.jpeg" alt=""></div>
            <div class="img-container"><img src="{{ asset('web/image/client')}}/3.jpeg" alt=""></div>
            <div class="img-container"><img src="{{ asset('web/image/client')}}/4.jpeg" alt=""></div>
            <div class="img-container"><img src="{{ asset('web/image/client')}}/5.jpeg" alt=""></div>
            <div class="img-container"><img src="{{ asset('web/image/client')}}/6.jpeg" alt=""></div>
            <div class="img-container"><img src="{{ asset('web/image/client')}}/7.jpeg" alt=""></div>
            <div class="img-container"><img src="{{ asset('web/image/client')}}/8.jpeg" alt=""></div>
            <div class="img-container"><img src="{{ asset('web/image/client')}}/11.jpeg" alt=""></div>
            
         </div>

      </div>
   </div>
</section>


<!----------- testimonial section  ----------->

@include('layouts.incl.testimonial')

<script>
    function liveSearch(query){
        
        
        if(query.length < 1){
            $('.suggestionBox').addClass('d-none');
        }else{
            $('.suggestionBox').removeClass('d-none');
        }
        
        $.ajax({
            type:"post",
            url:"/live-search",
            data:{search:query},
            success:function(data){
                console.log(data);
                
                $('.live-suggestion-container').html(data);
            }
        })
    }
</script>

@endsection