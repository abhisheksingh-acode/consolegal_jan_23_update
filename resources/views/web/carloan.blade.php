@extends("layouts.web")

@section('title','Consolegal | Car loan')

@section('content')
<section class="car-loan header-height" id="car-loan">
   <h2 class="main-title">Car Loan Upto ₹ 50,00,000</h2>
   <div class="estimation-div">
      <p class="title fw-bold text-center">Select Your Loan Amount Requirement</p>
      <div class="amount-selector">
         <span class="start ">1,00,000</span>
         <div class="range">
            <label for="customRange2" class="form-label">Example range</label>
            <input type="range" class="form-range" min="50000" max="1000000" id="customRange2">
         </div>
         <span class="end ">50,00,000</span>
      </div>

      <table class="table ">
         <tr>
            <td>Tenure (months)</td>
            <td>Interest Rate (p.a)</td>
            <td>EMI (monthly)</td>
            <td>Total Repayment </td>
         </tr>
         <tr class="table table-bordered">
            <td class="border">72</td>
            <td class="border">10.5 %</td>
            <td class="border">939</td>
            <td class="border">67,608</td>
         </tr>
      </table>
      <button class="btn mx-auto d-block an-btn mb-2">Apply For Car Loan Now</button>

      <span class="small fw-bold ">T&C apply. The values shown are for representation purposes only. Actual values may differ.</span>
   </div>
</section>

<section class="tabs-page-scroll ">
   <div class="tabs-container">
      <ul class="list-unstyled">
         <li class="active"><a href="#tab1">Tab 1</a></li>
         <li class=""><a href="#tab2">Tab 2</a></li>
         <li class=""><a href="#tab3">Tab 3</a></li>
         <li class=""><a href="#tab4">Tab 4</a></li>
      </ul>
   </div>
</section>

<section class="personal-loan-about " id="tab1">
   <h3 class="title text-center mb-5">Car Loan</h3>

   <p class="para">
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum enim facere molestias, itaque iure hic sit iste excepturi fugiat corrupti repellat suscipit non modi aut mollitia accusantium ad aliquid temporibus illo eligendi praesentium possimus deleniti harum. Minima sit sequi maiores ducimus voluptatem eius facere adipisci dolores asperiores consequatur impedit harum perferendis doloribus vitae distinctio, eveniet inventore ullam reprehenderit necessitatibus incidunt.
   </p>
   <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis iure laborum quae fuga ipsam harum veniam impedit fugit eaque aperiam laboriosam quidem, quis voluptatum error amet voluptate vel, doloremque adipisci? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis, corporis possimus optio, vero consectetur nobis voluptatem culpa esse eum quisquam sint neque consequuntur dolores labore dolor nihil ullam, voluptas sed! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus commodi, accusamus dolor totam dignissimos delectus rem hic aliquid sint non ullam magni itaque tempore quod molestias sit velit, quae est?</p>

   <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis iure laborum quae fuga ipsam harum veniam impedit fugit eaque aperiam laboriosam quidem, quis voluptatum error amet voluptate vel, doloremque adipisci? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis, corporis possimus optio, vero consectetur nobis voluptatem culpa esse eum quisquam sint neque consequuntur dolores labore dolor nihil ullam, voluptas sed! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus commodi, accusamus dolor totam dignissimos delectus rem hic aliquid sint non ullam magni itaque tempore quod molestias sit velit, quae est? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur sed facilis quisquam tempora numquam sit est sapiente reprehenderit non corrupti nemo officia voluptatem magnam eius ad similique maxime cupiditate, eaque dignissimos voluptate explicabo aspernatur commodi! Quos ducimus nobis quis eius similique voluptatem, ipsum consequatur necessitatibus in. Consectetur corrupti, animi veniam doloribus vel nulla dolorem in ut praesentium nesciunt pariatur cupiditate, laboriosam assumenda magnam at quo sunt! Veniam reiciendis repellendus debitis.</p>

</section>

<section class="benefits-loan " id="tab2">
   <div class="row mx-auto container-fluid container-md">
      <div class="col-md-8">
         <h3 class="title theme-orange">Benefits Of Car Loan</h3>
         <p class="para">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex est tenetur, impedit eum suscipit quasi qui animi. Commodi maxime eligendi natus nostrum dolor nam omnis vero, esse aperiam molestiae in debitis accusantium exercitationem soluta ullam molestias doloribus pariatur, voluptatem maiores illo. Nihil, numquam libero sequi itaque praesentium dolorum? Exercitationem.
         </p>
         <ul class="ul">
            <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam, officiis.</li>
            <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </li>
            <li>Lorem ipsum dolor sit, amet Lorem ipsum dolor sit amet. Veniam, officiis.</li>
            <li>Lorem ipsum dolor sit, amet consectetur Lorem, ipsum dolor. adipisicing elit. Veniam, officiis.</li>
            <li>Lorem ipsum dolor sit, amet consectetur Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, illo. adipisicing elit. Veniam, officiis.</li>
            <li>Lorem ipsum dolor sit, amet consectet Veniam, officiis.</li>
         </ul>
      </div>
      <div class="col-md-4">
         <div class="img-container" style="overflow: hidden;">
            <img src="{{ asset('web/image')}}/personal-loan.jpg" alt="" height="400px" width="auto">
         </div>
      </div>
   </div>
</section>

<!---------- FAQs section ------------>
@include('layouts.incl.faq')

<!----------- testimonial section  ----------->
@include('layouts.incl.testimonial')

@endsection