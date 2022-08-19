@extends('layouts.app')
@section('title')
Home
@endsection
@section('section')
<section class="main-section">

       

<div class="container">

 
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$blog->title}}</li>
        </ol>
    </nav>

   <div class="row">
        
        <div class="col-lg-12">

            
            <img src="{{asset('front/img/'.$blog->img)}}" width="100%">

        </div>
        
        <div class="col-lg-12">

            <div class="py-5">
                <h1 class="title-main">{{$blog->title}}</h1>
                <p class="mt-5">
                    {!! $blog->description !!}
                </p>
            </div>


        </div>

    </div>


   
</div>

</section>
@endsection