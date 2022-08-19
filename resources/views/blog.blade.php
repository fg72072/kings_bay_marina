@extends('layouts.app')
@section('title')
Home
@endsection
@section('section')
<section class="py-5">

    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
            </ol>
        </nav>

        <div class="row gy-5">

            @foreach($blogs as $blog)
            <div class="col-lg-6">
                <div class="blog-card m-0">

                    <a href="#">

                        <img src="{{asset('front/img/'.$blog->img)}}">

                    </a>

                    <div class="blog-meta">

                        <h3><a href="{{url('blog/'.$blog->id)}}">{{$blog->title}}</a></h3>

                        <p>{{$blog->short_intro}}</p>

                        <div class="mt-3">
                        <a href="{{url('blog/'.$blog->id)}}" class="custom-btn primary-btn">Read More</a>
                        </div>

                    </div>

                    <div class="blog-card-footer">

                        <p>{{$blog->created_at}}</p>

                    </div>


                </div>

            </div>
            @endforeach


        </div>
    </div>

</section>
@endsection