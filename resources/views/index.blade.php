@extends('layouts.app')
@section('title')
Home
@endsection
@section('section')
<div class="banner-video">
    <!-- <video  src="banner-video.mp4" autoplay loop></video> -->
    <!-- <video autoplay loop muted>
        <source src="{{asset('front/img/banner-video.mp4')}}" type="video/mp4">
    </video> -->
    <!-- <div id="made-in-ny" class="w-100"></div> -->
    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/713557518?autoplay=1&loop=1&autopause=0&muted=1&controls=0&sidedock=0&title=0" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Comp new.mp4"></iframe></div>
</div>

<section class="py-5">


    <div class="container">

        <h1 class="title-main-marine text-center">{{json_decode($first_setting->content)->heading}}</h1>

        <div class="row king-bay">


            <div class="col-lg-4 king-baybg" style="background:url(./public/front/img/{{json_decode($first_section->content)->image}});">



            </div>

            <div class="col-lg-8 king-baydata">

                <p class="f-bold">
                    {!! json_decode($first_section->content)->description !!}
                </p>

            </div>



        </div>


    </div>

    <div class="container-fluid py-5 px-0">

        <h1 class="title-main text-center my-5">{{json_decode($second_setting->content)->heading}}</h1>

        <div class="service-list">

            <ul>
                @foreach($second_section as $sec)
                <li>
                    <span><i class="fa-solid fa-anchor"></i></span>
                    {{$sec->content}}
                </li>
                @endforeach


            </ul>

        </div>

    </div>

    <div class="container-fluid blog-slide service-style">

        <h1 class="title-main-white text-center my-5">Serving All Your Marine Needs on Long Island</h1>




        <div class="services-slider">

            @foreach($products as $product)
            <div>

                <div class="blog-card position-relative">

                    @if($product->sale)
                    <span class="sale-tag">Sale</span>
                    @endif
                    <a href="{{url('product/'.$product->id)}}">
                        <img src="{{asset('front/img/'.$product->img)}}" width="100%">

                    </a>

                    <div class="blog-meta">

                        <h3><a href="{{url('product/'.$product->id)}}">{{$product->title}}</a></h3>

                        <p>
                            {{$product->short_intro}}
                        </p>

                        <a href="{{url('product/'.$product->id)}}" class="custom-btn primary-btn">Read More</a>

                    </div>

                    <div class="blog-card-footer">

                        <p>{{$product->created_at}}</p>

                    </div>


                </div>
            </div>
            @endforeach


        </div>



    </div>


    <div class="container">

        <h1 class="title-main text-center my-5">Weather Forcast</h1>

        <iframe class="mb-5" src="https://embed.windy.com/embed2.html?lat=41.509&lon=26.147&detailLat=44.415&detailLon=26.166&width=1100&height=450&zoom=5&level=surface&overlay=wind&product=ecmwf&menu=&message=true&marker=true&calendar=now&pressure=true&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1" height="450" width="100%"></iframe>

        <iframe src="https://cdnres.willyweather.com/widget/loadView.html?id=141780" height="520" width="100%"></iframe>

    </div>


    <div class="container-fluid py-5">

        <div class="row py-5">

            <div class="col-lg-6">
                <h1 class="title-main text-center my-5">{{json_decode($third_setting->content)->heading}}</h1>

                <p>
                    {!! json_decode($third_section->content)->description !!}
                </p>

            </div>

            <div class="col-lg-6">
                <h1 class="title-main text-center my-5">Booking Form</h1>

                <form class="service-form">

                    <h5>In which service are you intrested?</h5>

                    <label for="services">Services:</label>
                    <select id="services " class="service-option-home">
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->title}}</option>
                        @endforeach
                    </select>
                    <a href="" type="submit" class="custom-btn primary-btn booking-btn">Submit</a>

                </form>

            </div>

        </div>



    </div>

    <div class="container-fluid py-5 px-0 blog-slide blog-style">

        <h1 class="title-main text-center my-5">latest news</h1>



        <div class="blogs-slider">

            @foreach($blogs as $blog)
            <div>

                <div class="blog-card blog-style-card">

                    <a href="{{url('blog/'.$blog->id)}}">

                        <img src="{{asset('front/img/'.$blog->img)}}">

                    </a>

                    <div class="blog-meta">

                        <h3><a href="{{url('blog/'.$blog->id)}}">{{$blog->title}}</a></h3>

                        <p>{{$blog->short_intro}}</p>

                        <a href="{{url('blog/'.$blog->id)}}" class="custom-btn white-btn">Read More</a>
                        <p>{{$blog->created_at}}</p>

                    </div>

                    <div class="blog-card-footer">

                        <p>{{$blog->created_at}}</p>

                    </div>


                </div>
            </div>
            @endforeach





        </div>

    </div>

    <div class="container-fluid py-5">

        <h1 class="title-main text-center my-5">All our Technicians are Factory Trained & Certified - We Use Genuine Parts!</h1>

        <div class="container">

            <div class="client-logos">

                <div>
                    <img src="{{asset('front/img/yamaha.png')}}">
                </div>

                <div>
                    <img src="{{asset('front/img/merc-pa.png')}}">
                </div>

                <div>
                    <img src="{{asset('front/img/mercruiser.png')}}">
                </div>

                <div>
                    <img src="{{asset('front/img/yamaha-second.png')}}">
                </div>



            </div>

        </div>

    </div>


</section>
@endsection
