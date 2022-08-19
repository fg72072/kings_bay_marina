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
    <div class="row">

        <div class="col-lg-6">
            <h3 class="title-main">{{json_decode($second_setting->content)->heading}}</h3>
            
            <p>
            {!! json_decode($second_section->content)->description !!}
            </p>

            <div class="contact-form">
                @if(session('success'))
                <span class="text-success">{{session('success')}}</span>
                @endif
                <form action="{{route('contact')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Your name</label>
                        <input type="text" value="" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Your email</label>
                        <input type="text" value="" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Your message (optional)</label>
                        <textarea class="form-control" rows="5" name="message"></textarea>
                    </div>

                    <input type="submit" value="Send Now">

                </form>

            </div>
            
        </div>

        <div class="col-lg-6">
        
            <iframe height="300px" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
            src="https://maps.google.com/maps?q=London%20Eye%2C%20London%2C%20United%20Kingdom&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near" 
            title="London Eye, London, United Kingdom" aria-label="London Eye, London, United Kingdom">
            </iframe>

            <div class="contact-info">

                <div>
                    <span>Address :</span>
                    <span>{{json_decode($setting->content)->address}}</span>
                </div>

                <div>
                    <span>Phone :</span>
                    <span>{{json_decode($setting->content)->phone}}</span>
                </div>

                <div>
                    <span>City :</span>
                    <span>{{json_decode($setting->content)->city}}</span>
                </div>

                <div>
                    <span>Email :</span>
                    <span>{{json_decode($setting->content)->email}}</span>
                </div>

            </div>

            <div class="availablity">

                <p>{{json_decode($setting->content)->available}}</p>
                <h2>{{json_decode($setting->content)->phone}}</h2>

            </div>

        </div>
    </div>
</div>

</section>
@endsection