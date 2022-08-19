<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta class="url" name="url" content="{{url('')}}">
    <meta  name="Fazal Ghani" content="FullStack Developer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendors/bootstrap/css/bootstrap.min.css')}}">
</head>

<body>
<p><b>Name : </b>{{$data->name}}</p>
<p><b>Email : </b>{{$data->email}}</p>
<br>
<br>
{{$data->message}}

</body>

</html>

