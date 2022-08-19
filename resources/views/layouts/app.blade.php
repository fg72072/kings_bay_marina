<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta class="url" name="url" content="{{url('')}}">
    <meta name="Fazal Ghani" content="FullStack Developer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/jquery.datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/vendors/slick/slick/slick-theme.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('front/vendors/slick/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('front/vendors/aos-master/dist/aos.css')}}" />
    <link rel="shortcut icon" href="{{asset('front/img/logo.svg')}}" type="image/x-icon">
    <title>Kings Bay Marina</title>
 
</head>

<body>
    @include('includes.header')
    @yield('section')
    @include('includes.footer')

</body>

</html>