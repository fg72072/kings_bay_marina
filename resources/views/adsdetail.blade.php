@extends('layouts.app')
@section('title')
Home
@endsection
@section('section')
<section class="main-section">



    <div class="container">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$ads->title}}</li>
            </ol>
        </nav>

        <div class="row">

            <div class="col-lg-6">


                <img src="{{asset('front/img/'.$ads->img)}}" width="100%">

            </div>

            <div class="col-lg-6">

                <div class="single-product-meta">

                    <h2>{{$ads->title}}</h2>
                    <h4>$ {{$ads->price}}</h4>

                    <ul class="ad-datetime ad-datetime-flex">
                        <li>
                            <i class="fa-solid fa-user"></i> {{$ads->user->firstname.' '.$ads->user->lastname}}
                        </li>

                        <li>
                            <i class="fa-solid fa-clock"></i> {{ Carbon\Carbon::parse($ads->created_at)->diffForHumans() }}
                        </li>

                        <!-- <li>
                        <i class="fa-solid fa-tags"></i> 
                        @if($ads->type == 1)
                        Rent
                        @else
                        Sell
                        @endif
                    </li> -->

                        <li>
                            <i class="fa-solid fa-location-dot"></i> {{$ads->states ? $ads->states->name : "Null"}}
                        </li>
                        <li>
                            <span><i class="fa-solid fa-eye"></i> {{$ads->views}} Views</span>
                        </li>

                    </ul>

                    <span class="product-des">

                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias quas suscipit incidunt labore modi temporibus
                        maxime consequatur minus non laudantium maiores, tenetur deleniti sed, delectus sapiente quasi. Dolore, laudantium eos!

                    </span>
                    @if($ads->web)
                    <div class="mt-3">
                        <b>Website :</b> <a href="{{$ads->web}}" target="_blank">{{$ads->web}}</a>
                    </div>
                    @endif
                    @if($ads->video)
                    <div class="mt-3">
                        <b>Video :</b> <a href="{{$ads->video}}" target="_blank">{{$ads->video}}</a>
                    </div>
                    @endif


                    <p class="my-3"><b>Product Type :</b> <a>@if($ads->type == 1)
                            Rent
                            @else
                            Sell
                            @endif</a></p>



                </div>

            </div>

        </div>


        <div class="product-lg-des">

            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">

                <li class="nav-item" role="presentation">

                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                        Description
                    </button>

                </li>

            </ul>
            <div class="tab-content pt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    {!! $ads->description !!}


                    <div class="product-share">

                        <p>Share</p>
                        <ul>
                            <li>
                                <a href="">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>

                            <li>
                                <a href="">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>

                            <li>
                                <a href="">
                                    <i class="fa-solid fa-envelope"></i>
                                </a>
                            </li>

                            <li>
                                <a href="">
                                    <i class="fa-brands fa-pinterest-p"></i>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
@endsection