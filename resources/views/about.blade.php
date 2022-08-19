@extends('layouts.app')
@section('title')
Home
@endsection
@section('section')
<section class="section-title" style="background-image:url(./public/front/img/{{json_decode($first_section->content)->image}}) !important;">

<h1>{{json_decode($first_setting->content)->heading}}</h1>

</section>

<section class="main-section">

<div class="container">
    <div class="row align-items-center">

        <div class="col-lg-6 about-details">
            <h3 class="title-main">{{json_decode($second_setting->content)->heading}}</h3>
            
            <p class="p">
            {!! json_decode($second_section->content)->description !!}
            </p>
        </div>

        <div class="col-lg-6">
        <div class="img-grp">
            <img src="{{asset('front/img/'.json_decode($second_section->content)->image1)}}">
            <img src="{{asset('front/img/'.json_decode($second_section->content)->image2)}}">
        </div>  

        </div>
    </div>
</div>

</section>
@endsection