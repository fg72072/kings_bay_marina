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
                <li class="breadcrumb-item active" aria-current="page">Listing Form</li>
            </ol>
        </nav>

        <h3 class="mb-3">Listing Form</h3>

        <div class="ads-listing">


            <form class="listing-form custom-form" action="{{route('store-ads')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="ad-type">Product type <span class="required">*</span></label>
                    <select class="form-control" id="ad-type" name="type">
                        <option value="">Select Ads Type</option>
                        <option value="1">Rent</option>
                        <option value="2">Sell</option>
                    </select>
                </div>

                <div class="listing-type">

                    <h4 class="rent list-type">Rent</h4>
                    <h4 class="sell list-type">Sell</h4>


                    <h5 class="my-3">Listing Information:</h5>
                    <div class="form-group">
                        <label for="title">Title <span class="required">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <!-- IMAGE UPLOAD -->

                    <h5 class="my-3">Image:</h5>

                    <div class="upload-images">

                        <div class="box">
                            <!-- <p class="mb-4">Drop files here to add them.</p> -->

                            <label for="browse-file">Upload Image..</label>
                            <input type="file" id="browse-file" name="image">

                        </div>

                        <div class="uploaded-images">

                            <img src="" id="img_uploaded">

                        </div>

                        <div class="img-recommended">

                            <ul>
                                <li>Recommended image size to (924x462)px</li>
                                <li>Image maximum size 2 MB.</li>
                                <li>Allowed image type (png, jpg, jpeg).</li>

                            </ul>

                        </div>

                    </div>



                    <h5 class="my-3">Pricing:</h5>

                    <!-- PRICE-RADIOBTN -->

                    <div iv class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pricetype" id="price" value="1" checked>
                        <label class="form-check-label" for="price">Price</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pricetype" id="pricerange" value="2">
                        <label class="form-check-label" for="pricerange">Price Range</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pricetype" id="disable" value="3">
                        <label class="form-check-label" for="disable">Disable</label>
                    </div>


                    <!-- PRICE-TYPE -->

                    <div class="form-group">
                        <label for="price-type">Price type <span class="required">*</span></label>
                        <select class="form-control" id="price-type" name="price_type" required>
                            <option value="1">Fixed</option>
                            <option value="2">Negotiable</option>
                            <option value="3">On Call</option>
                        </select>
                    </div>

                    <!-- MIN-MAX-PRICE -->
                    <div class="form-group">
                        <label for="price">Price [$] <span class="required">*</span></label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>
                    <!-- <div class="minmax-price">

                            <div class="form-group">
                                <label for="price">Price [$] <span class="required">*</span></label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>

                            <div class="form-group">
                                <label for="price">Price [$] <span class="required">*</span></label>
                                <input type="text" class="form-control" id="price" required>
                            </div>

                        </div> -->

                    <!-- CITY -->

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city">
                    </div>

                    <!-- DESCRIPTION -->

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="10" class="form-control ckeditor"></textarea>
                    </div>


                    <!-- VIDEO URL -->

                    <h5 class="my-3">Video URL</h5>

                    <div class="form-group">
                        <input type="text" class="form-control" name="video" placeholder="Only YouTube & Vimeo URL">
                        <p class="">E.g. https://www.youtube.com/watch?v=RiXdDGk_XCU, https://vimeo.com/620922414</p>
                    </div>

                    <!-- CONTACT DETAILS -->

                    <h5 class="my-3">Contact Details</h5>

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label for="state">State <span class="required">*</span></label>
                                <select class="form-control" id="state" name="state" required>
                                    <option value="">--select location--</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="zipcode">Zip Code</label>
                                <input type="text" class="form-control" value="{{$user->zip_code}}" name="zip_code" id="zipcode">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control">{{$user->address}}</textarea>
                            </div>

                        </div>


                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="phone">Phone <span class="required">*</span></label>
                                <input type="tel" class="form-control" value="{{$user->phone}}" name="phone" id="phone" required>
                            </div>

                            <div class="form-group">
                                <label for="whatsapp">Whatsapp number</label>
                                <input type="tel" value="{{$user->whatsapp}}" class="form-control" name="whatsapp" id="whatsapp">
                                <p class="">Whatsapp number with your country code. e.g.+1xxxxxxxxxx</p>
                            </div>

                            <div class="form-group">
                                <label for="email">Email </label>
                                <input type="email" class="form-control" value="{{$user->email}}" name="email" id="email" required>
                            </div>

                            <div class="form-group">
                                <label for="website">Website </label>
                                <input type="url" class="form-control" value="{{$user->web}}" name="website" id="website">
                            </div>

                        </div>

                    </div>

                </div>



                <input type="submit" value="Submit" class="custom-btn primary-btn">

            </form>

        </div>


    </div>

</section>
@endsection