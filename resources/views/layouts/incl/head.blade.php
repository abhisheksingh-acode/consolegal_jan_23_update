<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0 ">

   <!-------------------------------- favicon ------------------------->

   <link rel="icon" href="{{ asset('web/image/favicon.png')}}">
   <link rel="shortcut icon" href="{{ asset('web/image/favicon.png')}}">

   <!-------------------------------- title ------------------------->

   @yield('title')

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

</head>