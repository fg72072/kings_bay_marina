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
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </nav>

            <h3 class="mb-3">My Account</h3>
            
            <div class="row account-box">
            @include('dashboard.sidebar')
                <div class="col-lg-10">

                    <div class="profile">
                        @if($user->img)
                        <img src="{{asset('front/img/'.$user->img)}}">
                        @else
                        <img src="{{asset('front/img/placeholder.png')}}">
                        @endif

                        <h6 class="mt-3">{{$user->firstname .' '.$user->lastname}}</h6>
                        <p>{{$user->email}}</p>

                    </div>

                </div>

            </div>

        </div>

    </section>
    @endsection