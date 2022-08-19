@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Edit Product</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Edit Product</li>
            <li class="breadcrumb-item active"><a href="{{url('product/'.$product->id)}}" target="_blank">View</a></li>

          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <form method="POST" action="{{url('admin/product/update/'.$product->id)}}" enctype="multipart/form-data">
      <div class="row second-chart-list third-news-update">
        <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <div class="form-group">
                <div id="profile-container">
                  <img class="" id="profileImage" src="{{asset('front/img/'.$product->img)}}" alt="Upload Icon" data-holder-rendered="true" max-height="10px;" max-width="100px;" style="height:100px;width:100px;">
                </div>
                <br>
                <input id="imageUpload" type="file" name="img" placeholder="Photo" capture="" value="">
              </div>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Title</label>
              <input class="form-control" type="text" name="title" value="{{$product->title}}" required>
            </div>
            <!-- <div class="mb-3">
              <label class="col-form-label">Select Category</label>
              <select class="form-control select-category" name="category">
                  @foreach($categories as $category)
                  <option value="{{$category->id}}" data-type="{{$category->parent}}">
                      @if($category->parent == 0)
                      {{'Product/'.$category->title}}
                      @else
                      {{'Service/'.$category->title}}
                      @endif
                  </option>
                  @endforeach
              </select>
            </div> -->
            <div class="mb-3">
              <label class="col-form-label">Select Category</label>
              <select class="form-control select-category" name="category" required>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $product->cat_id) selected @endif data-type="{{$category->parent}}">
                  @if($category->parent == 1)
                  {{$category->title}}
                  @else
                  {{'Service/'.$category->title}}
                  @endif
                </option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Price</label>
              <input class="form-control" type="number" name="price" value="{{$product->price}}" required min="1">
            </div>
            <!-- <div class="mb-3">
              <label class="col-form-label">Min</label>
              <input class="form-control" type="number" name="min" value="{{$product->min_limit}}" required min="1">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Max</label>
              <input class="form-control" type="number" name="max" value="{{$product->max_limit}}" required min="1">
            </div> -->
            @if($product->qty)
            <div class="mb-3">
              <label class="col-form-label">Quantity</label>
              <input class="form-control" type="number" name="qty" value="{{$product->qty}}" required min="1">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Menu</label>
              <select class="form-control " name="menu">
                <option value="1" @if($product->menu == 1) selected @endif>
                  Right
                </option>
                <option value="2" @if($product->menu == 2) selected @endif>
                  Left
                </option>
              </select>
            </div>
            @endif
            @if($product->no_of_count)
            @php $count = explode(',',$product->no_of_count) @endphp
            <div class="checkbox-flex">
              <div class="mb-3">
                <input class="no_of_bed" type="checkbox" value="1" @if(in_array(1,$count)) checked @endif name="no_of_count[]">
                <label class="col-form-label">1 Bed</label>
              </div>
              <div class="mb-3">
                <input class="no_of_bed" type="checkbox" value="2" @if(in_array(2,$count)) checked @endif name="no_of_count[]">
                <label class="col-form-label">2 Bed</label>
              </div>
              <div class="mb-3">
                <input class="no_of_bed" type="checkbox" value="3" @if(in_array(3,$count)) checked @endif name="no_of_count[]">
                <label class="col-form-label">3 Bed</label>
              </div>
              <div class="mb-3">
                <input class="no_of_bed" type="checkbox" value="4" @if(in_array(4,$count)) checked @endif name="no_of_count[]">
                <label class="col-form-label">4 Bed</label>
              </div>
            </div>
            @endif
            <div class="service-only">

            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
          <div class="card-body">
            <div class="mb-3">
              <label class="col-form-label">Sale</label>
              <select class="form-control sale" name="sale" required>
                <option value="0" @if(!$product->sales) selected @endif>No</option>
                <option value="1" @if($product->sales) selected @endif>Yes</option>
              </select>
            </div>
            <div class="sale-section" @if($product->sales) data-show="true" @else data-show="false" @endif>
              <div class="mb-3">
                <label class="col-form-label">Sale Price</label>
                <input class="form-control" type="number" value="{{$product->sales ? $product->sales->sale_price : ''}}" name="sale_price"  min="1">
              </div>
              <div class="mb-3">
                <label class="col-form-label">Sale Start</label>
                <input class="form-control datetime" value="{{$product->sales ? $product->sales->start_date : ''}}" type="text" name="sale_start">
              </div>
              <div class="mb-3">
                <label class="col-form-label">Sale End</label>
                <input class="form-control datetime" value="{{$product->sales ? $product->sales->end_date : ''}}" type="text" name="sale_end">
              </div>
            </div>

            <div class="mb-3">
              <label class="col-form-label">Short Intro</label>
              <textarea class="form-control" name="short_intro" id="" cols="30" rows="3" required>{{$product->short_intro}}</textarea>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Description</label>
              <textarea class="form-control ckeditor" name="description" id="" cols="30" rows="5" required>{!! $product->description !!}</textarea>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Status</label>
              <select class="form-control" name="status">
                <option value="0" @if($product->status == 0) selected @endif>Unactive</option>
                <option value="1" @if($product->status == 1) selected @endif>Active</option>
              </select>
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Update</button>
          </div>
        </div>
    </form>
    @if($product->category->parent == 1)
    <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
      <h3 class="ms-1">Add Inventory</h3>
      <form method="post" action="{{route('add-inventory')}}">
        <div class="card-body">
          @csrf
          <div class="mb-3">
            <input class="form-control" type="hidden" name="id" value="{{$product->id}}" required min="1">
            <label class="col-form-label">Quantity</label>
            <input class="form-control" type="number" name="qty" value="" required min="1">
          </div>
          <div class="mb-3">
            <label class="col-form-label">Purchase Price</label>
            <input class="form-control" type="number" name="price" value="" required min="1">
          </div>
          <button class="btn btn-primary offset-md-5" type="submit">Publish</button>
        </div>
      </form>
    </div>
    @endif


  </div>
  <div class="row">
    <!-- Zero Configuration  Starts-->
    <!-- <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
            <h3>FAQs List</h3>
            <div class="table-responsive">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Heading</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                        <tr>
                            <td class="id"></td>
                            <td class="heading"></td>
                            <td class="description"></td>
                            <td class="d-flex">
                            <a href="javascript::void();" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <form id="delete-form" action="" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            </td>
                          </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> -->

  </div>
</div>
<!-- Container-fluid Ends-->
</div>
@endsection