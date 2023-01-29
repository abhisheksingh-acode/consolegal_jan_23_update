<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>

   <h1 style="text-align: center;">Customer Upload Details</h1>
   <div class="">
      @foreach($data as $data)
      @if($data->content_label != "_token")
      <h1>{{$data->content_label}}: {{$data->content}}</h1>
      @endif
      @endforeach
   </div>
</body>

</html>