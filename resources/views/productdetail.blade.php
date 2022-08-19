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
                <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
            </ol>
        </nav>

        <div class="row">
            @if(session('success'))

            <div class="add-cart-success">
                <span>{{session('success')}}</span>

                <a href="{{url('cart')}}" class="custom-btn primary-btn">View Cart</a>
            </div>
            @endif


            <div class="col-lg-6">


                <img src="{{asset('front/img/'.$product->img)}}" width="100%" height="500px">

            </div>

            <div class="col-lg-6">
                <!-- <span class="checkout_steps">{{$product->steps}}</span> -->
                <div class="single-product-meta">
                    <h2>{{$product->title}}</h2>
                    <h4 class="service-price" data-weekend_type="{{$product->weekend_type}}" data-weekend_amount="{{$product->weekend_price}}" data-price="{{$product->sales && $product->sales->status == 'active' ? $product->sales->sale_price : $product->price}}"><span @if($product->sales && $product->sales->status == 'active') style="text-decoration:line-through;" @endif>${{$product->price}}</span><span> {{$product->sales && $product->sales->status == 'active' ? '$'.$product->sales->sale_price : ''}}<span></h4>
                    <span class="price"></span>



                    <span class="product-des">

                        {!! $product->short_intro !!}

                    </span>

                    <p class="my-3"><b>Availability :</b>
                        @if($product->qty)
                        {{$product->qty}}
                        @else
                        {{$product->stock}}
                        @endif
                    </p>
                    <!-- <p class="my-3"><b>Product Type :</b> <a>{{$product->category->title}}</a></p> -->
                    @if(session('msg'))
                    @if($product->type == "service")
                    <span class="text-danger">{{session('msg')}}</span>
                    @else
                    <span class="text-danger">{{session('msg')}}</span>
                    @endif
                    @endif
                    <form action="{{url('add-to-cart/'.$product->id)}}" method="post">
                        @if($product->no_of_count)
                        <div class="checkbox-flex">
                            @foreach(explode(',',$product->no_of_count) as $count)
                            <div>
                                <input type="radio" required name="no_of_count" value="{{$count}}" @if($cart_item && $cart_item->no_of_count == $count) checked @endif/>
                                <label>{{$count}} Bed</label>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        @if($product->category->parent == 2)
                        <div class="form-custom-flex mt-3">
                            <div class="form-group">
                                <label>Date</label>
                                @if($cart_item && $cart_item->date)
                                <input class="form-control" id="date" autocomplete="off" readonly type="text" name="date" value="{{$cart_item->date}}" required />
                                @else
                                <input class="form-control" id="date" autocomplete="off" readonly type="text" name="date" required />
                                @endif
                                @error('date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No. of
                                    @if($product->form_type == 0)
                                    hours
                                    @elseif($product->form_type == 1)
                                    days
                                    @elseif($product->form_type == 2)
                                    months
                                    @elseif($product->form_type == 3)
                                    years
                                    @endif
                                </label>
                                @if($cart_item)
                                <input class="form-control no_of" autocomplete="off" type="number" name="no_of" value="{{$cart_item->no_of_count}}" min="{{$product->min_limit}}" max="{{$product->max_limit}}" required data-form_type="{{$product->form_type}}" />
                                @else
                                <input class="form-control no_of" autocomplete="off" type="number" name="no_of" value="{{$product->min_limit}}" min="{{$product->min_limit}}" max="{{$product->max_limit}}" required data-form_type="{{$product->form_type}}" />
                                @endif
                                <div class="error-message text-danger">

                                </div>
                            </div>
                        </div>
                        @endif

                        @if(count($addons) > 0)
                        <h3>Addons</h3>
                        @foreach($addons as $addon)
                        @php
                        $cart_add = App\Common::getCartAddon($addon->id,$ip);
                        @endphp
                        <div class="addon-row">
                            <div>
                                <input type="checkbox" @if($cart_add) checked @endif name="addon[]" @if($addon->is_bedroom == 1) class="bedroom add-addon" @else class="add-addon" @endif value="{{$addon->id}}"/>
                                <span>{{$addon->title}}</span>
                                <br />
                                @if($addon->type == 0)
                                <input type="hidden" name="addon_qty[]" class="addon_qty per_night" min="{{$addon->min_limit}}" max="{{$addon->max_limit}}" @if($cart_add) value="{{$cart_add->night_or_guest}}" @else value="{{$addon->min_limit}}" @endif>
                                @elseif($addon->is_input == 1)
                                <input type="number" name="addon_qty[]" class="addon_qty toggle-qty" min="{{$addon->min_limit}}" max="{{$addon->max_limit}}" @if($cart_add) value="{{$cart_add->night_or_guest}}" @else value="{{$addon->min_limit}}" @endif>
                                @else
                                <input type="hidden" name="addon_qty[]" class="addon_qty" min="1" @if($cart_add) value="{{$cart_add->night_or_guest}}" @else value="1" @endif>
                                @endif
                                <div class="addon-error-message text-danger">

                                </div>
                            </div>
                            <div>
                                <input type="hidden" class="addon-input-price" name="addon_price[]" value="{{$addon->price}}">
                                <span class="addon_price" data-addon_price="{{$addon->price}}">${{$addon->price}}</span>
                                <span class="addon_type" data-addon_type="{{$addon->type}}">
                                    @if($addon->type == 0)
                                    per night
                                    @elseif($addon->type == 1)
                                    per guest
                                    @elseif($addon->type == 2)
                                    single fee
                                    @endif
                                </span>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @if($product->category->parent == 2)
                        <div class="form-group">
                            <label>Total : </label>
                            @if($cart_item)
                            <span class="total">${{$cart_item->total}}</span>
                            @else
                            <span class="total">$0</span>
                            @endif
                        </div>
                        @endif
                        <div class="add-to-cart">
                            @csrf
                            @if($cart_item)
                            <div>
                                <div class="d-flex align-items-center">
                                    <label style="margin-right: 5px;">{{$product->label}} : </label>
                                    <input type="number" class="no_of_guest" name="qty" value="{{$cart_item->qty}}" min="{{$product->min_guest}}" max="{{$product->max_guest}}" data-id="{{$product->stock}}">
                                </div>
                                <div class="guest-error-message text-danger">

                                </div>
                            </div>
                            @else
                            <div>
                                <div class="d-flex align-items-center">

                                    <label style="margin-right: 5px;">{{$product->label}} : </label> <input type="number" class="no_of_guest" name="qty" value="1" min="{{$product->min_guest}}" max="{{$product->max_guest}}" data-id="{{$product->stock}}">
                                </div>
                                <div class="guest-error-message text-danger">

                                </div>
                            </div>
                            @endif

                            <button class="custom-btn primary-btn" type="submit">Add To Cart</button>
                            <button class="custom-btn" type="submit" name="buy" value="buy">Buy Now</button>
                        </div>
                    </form>

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

                    {!! $product->description !!}

                    <div class="product-share">

                        <p>Share</p>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{url('product/'.$product->id)}}" target="_blank">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>

                            <li>
                                <a href="https://twitter.com/intent/tweet?url={{url('product/'.$product->id)}}" target="_blank">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>

                            <li>
                                <a href="mailto:?subject= Marine&body={{url('product/'.$product->id)}}">
                                    <i class="fa-solid fa-envelope"></i>
                                </a>
                            </li>

                            <li>
                                <a href="http://pinterest.com/pin/create/link/?url={{url('product/'.$product->id)}}" target="_blank">
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