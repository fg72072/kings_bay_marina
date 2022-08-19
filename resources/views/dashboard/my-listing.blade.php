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
                <li class="breadcrumb-item active" aria-current="page">My Listings</li>
            </ol>
        </nav>

        <h3 class="mb-3">My Listings</h3>

        <div class="row account-box">


            @include('dashboard.sidebar')


            <div class="col-lg-10">

                <div class="my-listing">

                    <div class="listing-header">

                        <form class="listing-search" method="get" action="{{url('user/ads-listing')}}">

                            <div class="form-group">
                                <input type="text" class="form-control" name="search" id="search-listing" placeholder="search by title">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Search" class="custom-btn primary-btn">
                            </div>

                        </form>

                        <a href="{{url('user/ads')}}" class="custom-btn primary-btn">Add New Listing</a>

                    </div>

                    <div class="listing-body">


                        @forelse($ads as $ad)
                        <div class="listing-item">

                            <div class="listing-thumb">

                                <img src="{{asset('front/img/'.$ad->img)}}" width="200">

                            </div>

                            <div class="listing-meta">

                                <h4>{{$ad->title}}</h4>

                                <!-- <p class="labels">new</p> -->

                                <ul>
                                    <li>

                                        <i class="fa-solid fa-clock"></i>
                                        {{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }} by {{$ad->user->firstname.' '.$ad->user->lastname}}
                                    </li>

                                    <li>
                                        <i class="fa-solid fa-location-dot"></i>
                                        {{$ad->states ? $ad->states->name : "Null"}}
                                    </li>

                                    <li>
                                        <i class="fa-solid fa-eye"></i>
                                        {{$ad->views}} views
                                    </li>
                                </ul>

                                <div class="btn-group">
                                    <!-- <button class="custom-btn primary-btn">Edit</button> -->
                                    <form id="delete-form" method="POST" action="{{url('user/ads-delete/'.$ad->id)}}">
                                        @csrf
                                        <button class="custom-btn">Delete</button>
                                    </form>
                                </div>

                            </div>



                        </div>
                        @empty
                        <p class="">No listing found.</p>
                        @endforelse


                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
@endsection