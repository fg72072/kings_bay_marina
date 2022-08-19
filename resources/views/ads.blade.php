@extends('layouts.app')
@section('title')
Home
@endsection
@section('section')
<section class="section-title">

    <h1>ads</h1>

</section>

<section class="main-section">

    <div class="container">

        <div class="row align-items-center gy-5">

            @foreach($ads as $ad)
            <div class="col-lg-3 col-md-6">

                <div class="ads-card">

                    <a href="{{url('ads/2')}}">

                        <img src="{{asset('front/img/'.$ad->img)}}">

                    </a>

                    <div class="ads-card-meta">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{url('ads/'.$ad->id)}}">{{$ad->title}}</a>
                            <span><i class="fa-solid fa-eye"></i> {{$ad->views}} Views</span>
                        </div>
                        <ul class="ad-datetime">
                            <li>
                                <i class="fa-solid fa-user"></i> {{$ad->user->firstname.' '.$ad->user->lastname}}
                            </li>

                            <li>
                                <i class="fa-solid fa-clock"></i> {{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}
                            </li>

                            <li>
                                <i class="fa-solid fa-tags"></i>
                                @if($ad->type == 1)
                                Rent
                                @else
                                Sell
                                @endif
                            </li>

                            <li>
                                <i class="fa-solid fa-location-dot"></i> {{$ad->states ? $ad->states->name : "Null"}}
                            </li>
                        </ul>

                    </div>


                </div>

            </div>
            
            @endforeach


        </div>

        <div class="text-center pt-5 mt-5">

            <a href="{{url('user/ads')}}" class="custom-btn primary-btn">Place an Ad</a>

        </div>

    </div>

</section>
@endsection