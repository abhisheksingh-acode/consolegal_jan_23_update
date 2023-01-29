<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title')</title>


   <!-- CSS FILES -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-2/css/all.min.css" integrity="sha512-61a6zi50gYXGgd/n9+ZT2/RKnXr6lkRoWlS88AjFdoUHaIDnyBAcoE0Vs/QDU3lK3nCcUowNDqmQ8WaV0yT4qw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css')}}" />




   <!-- CSS FILES -->
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{ asset('css/style.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css')}}" />



   <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{ asset('css/datetimepicker.css')}}" />


   <!-- for text editor -->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

   <script src="{{ asset('js/jquery.min.js') }}"></script>

   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

   <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>

</head>

<body>

   @yield('content')

   <!-- JS FILES -->
   <script src="{{ asset('js/summernote-bs4.js')}}"></script>
   <script src="{{ asset('js/jquery.min.js') }}"></script>
   <script src="{{ asset('js/bootstrap.min.js')}}"></script>
   <!-- <script src="{{ asset('js/scripts1.js')}}"></script> -->
   <script src="{{ asset('js/scripts.js')}}"></script>



   <!-- new add -->



   <script src="{{ asset('js/app.js')}}"></script>

   <script>
      $(document).ready(function() {
         App.init();
      });
   </script>

   <script>
      function openCity(evt, cityName) {
         var i, tabcontent, tablinks;
         tabcontent = document.getElementsByClassName("tabcontent");
         for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
         }
         tablinks = document.getElementsByClassName("tablinks");
         for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
         }
         document.getElementById(cityName).style.display = "block";
         evt.currentTarget.className += " active";
      }

      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
   </script>

   @stack('scripts')


</body>

</html>