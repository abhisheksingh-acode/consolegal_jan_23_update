<!DOCTYPE html>
<html lang="en">

<!-- title should be on top  -->

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0 ">

   <!-------------------------------- favicon ------------------------->

   <link rel="icon" href="{{ asset('web/image/favicon.png')}}">
   <link rel="shortcut icon" href="{{ asset('web/image/favicon.png')}}">

   <!-------------------------------- title ------------------------->
   <title> @yield('title')</title>


   <!-------------------------------- stylesheets ------------------------->

   <!-------- bootstrap -------->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" />

   <!-------- swiper css -------->
   <link rel="stylesheet" href="{{ asset('web/css/swiper-bundle.min.css')}}" />

   <!-------- aos css -------->
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

   <!--------- font-awsome ----------->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

   <!--------- custom  ----------->
   <link rel="stylesheet" href="{{ asset('web/css/main.css')}}">

   <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
   
   <style>
       .w-85{
    width:85% !important;
}
   </style>
   
   @stack('css')
</head>

<body>
   <!---------- navbar  ---------->
   @include('layouts.incl.nav')



   @yield('content')


   <!--------- footer  ----------->
   @include('layouts.incl.footer')

   <script>
      // typed animation
      var options = {
         strings: ["Income Tax", "GST Registration", "Income Tax"],
         typeSpeed: 60,
         loop: true,
         attr: "placeholder",
         loopCount: Infinity,
         showCursor: true,
         cursorChar: "|",
      };
      var typed = new Typed("#search input", options);
   </script>
   
   <script>
       
       
       $("body").click(function() {
    $('.navbar-collapse').collapse('hide');
});

$("nav").click(function(e) {
    e.stopPropagation();
});
   </script>

   @stack('script')
</body>

</html>