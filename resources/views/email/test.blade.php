<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>mail</title>
</head>

<body>
   <p>Hi @if(isset($name))
      {{$name}}
      @endif,
   </p>
   <p>{{$details["body"]}}</p>
</body>

</html>