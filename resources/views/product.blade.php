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
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>

        <div>

            <h4>Products</h4>

            <div class="d-flex justify-content-between">

                <p>Showing all {{count($products)}} results</p>

                <form action="{{url('products')}}" method="GET" id="search_by">
                    <select name="sort" id="sort" onchange="document.getElementById('search_by').submit();">
                        <option value="">Default Sorting</option>
                        <option value="high-to-low" @if($sort == 'high-to-low') selected @endif>High to Low</option>
                        <option value="low-to-high" @if($sort == 'low-to-high') selected @endif>Low to High</option>
                    </select>
                </form>

            </div>

        </div>

        <div class="products-list">

            <ul>

                @forelse($products as $product)
                <li class="position-relative">
                    @if($product->sales && $product->sales->status == 'active')
                    <span class="sale-tag">Sale</span>
                    @endif
                    <a href="{{url('product/'.$product->id)}}">
                        <div class="product-img">
                            <img src="{{asset('front/img/'.$product->img)}}" class="demo">
                        </div>
                        <h4>{{$product->title}}</h4>
                    </a>
                    
                    <span class="price" ><span @if($product->sales && $product->sales->status == 'active') style="text-decoration:line-through;" @endif>${{$product->price}}</span><span> {{$product->sales && $product->sales->status == 'active' ? '$'.$product->sales->sale_price : ''}}<span></span>
                    @if(session('msg'))
                    <br>
                    <span class="text-danger">{{session('msg')}}</span>
                    @endif

                    <div >
                        <form action="{{url('add-to-cart/'.$product->id)}}" method="POST" class="cart-btn-group">
                            @csrf

                            <button class="custom-btn primary-btn" type="submit" >Add To Cart</button>
                            <button class="custom-btn" type="submit" name="buy" value="buy">Buy Now</button>
                        </form>
                    </div>

                </li>
                @empty

                @endforelse
            </ul>

        </div>

    </div>

</section>
@endsection