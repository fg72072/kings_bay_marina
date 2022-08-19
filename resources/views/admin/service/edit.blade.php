@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Edit Service</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Edit Service</li>
            <li class="breadcrumb-item active"><a href="{{url('product/'.$product->id)}}" target="_blank">View </a></li>

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
            <div class="mb-3">
              <label class="col-form-label">Select Category</label>
              <select class="form-control select-category" name="category" required>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $product->cat_id) selected @endif data-type="{{$category->parent}}">
                  @if($category->parent == 1)
                  {{'Product/'.$category->title}}
                  @else
                  {{$category->title}}
                  @endif
                </option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Price</label>
              <input class="form-control" type="number" name="price" value="{{$product->price}}" required min="1">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Min</label>
              <input class="form-control" type="number" name="min" value="{{$product->min_limit}}" required min="1">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Max</label>
              <input class="form-control" type="number" name="max" value="{{$product->max_limit}}" required min="1">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Min Guest</label>
              <input class="form-control" type="number" name="min_guest" value="{{$product->min_guest}}" required min="1">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Max Guest</label>
              <input class="form-control" type="number" name="max_guest" value="{{$product->max_guest}}" required min="1">
            </div>
            @if($product->qty)
            <div class="mb-3">
              <label class="col-form-label">Quantity</label>
              <input class="form-control" type="number" name="qty" value="{{$product->qty}}" required min="1">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Label</label>
              <input class="form-control" type="text" name="label" value="{{$product->label}}">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Type</label>
              <select class="form-control " name="form_type">
                <option value="0" @if($product->form_type == 0) selected @endif>
                  Hours
                </option>
                <option value="1" @if($product->form_type == 1) selected @endif>
                  Days
                </option>
                <option value="2" @if($product->form_type == 2) selected @endif>
                  Months
                </option>
                <option value="3" @if($product->form_type == 3) selected @endif>
                  Years
                </option>
              </select>
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
            <!-- <div class="mb-3">
                <label class="col-form-label">Step</label>
                <input class="form-control" type="number" name="steps" value="{{$product->steps}}" required min="1">
              </div> -->
            <div class="mb-3">
              <label class="col-form-label">Weekend Type</label>
              <select class="form-control " name="weekend_type" required>
                <option value="0" @if($product->weekend_type == 0) selected @endif>
                  Addition
                </option>
                <option value="1" @if($product->weekend_type == 1) selected @endif>
                  Subtraction
                </option>
              </select>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Weekend Amount</label>
              <input class="form-control" type="number" name="weekend_price" value="{{$product->weekend_price}}" required >
            </div>
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
                <input class="form-control" type="number" value="{{$product->sales ? $product->sales->sale_price : ''}}" name="sale_price" min="1">
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
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <h3>Addons</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>

          </div>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table class="display" id="basic-1">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Price</th>
                  <th>Min</th>
                  <th>Max</th>
                  <th>Is Input</th>
                  <th>Is Bedroom</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($addons as $addon)
                <tr>
                  <td class="id" data-id="{{$addon->id}}">{{$addon->id}}</td>
                  <td class="title" data-title="{{$addon->title}}">{{$addon->title}}</td>
                  <td class="price" data-price="{{$addon->price}}">${{$addon->price}}</td>
                  <td class="min_limit" data-min_limit="{{$addon->min_limit}}">{{$addon->min_limit}}</td>
                  <td class="max_limit" data-max_limit="{{$addon->max_limit}}">{{$addon->max_limit}}</td>
                  <td class="is_input" data-is_input="{{$addon->is_input}}">{{$addon->is_input == 0 ? 'No' : 'Yes'}}</td>
                  <td class="is_bedroom" data-is_bedroom="{{$addon->is_bedroom}}">{{$addon->is_bedroom == 0 ? 'No' : 'Yes'}}</td>
                  <td class="type" data-type="{{$addon->type}}">
                    @if($addon->type == 0)
                    per night
                    @elseif($addon->type == 1)
                    per guest
                    @else
                    single Fee
                    @endif
                  </td>
                  <td class="d-flex">
                    <a href="javascript::void();" data-bs-toggle="modal" data-bs-target="#edit-modal" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                    <form id="delete-form" action="{{url('admin/addon/destroy/'.$addon->id)}}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Addon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{route('add-addon')}}" enctype="multipart/form-data">
          <div class="modal-body">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}" />
            <div class="mb-3">
              <label class="col-form-label">Title</label>
              <input class="form-control" type="text" name="title" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Price</label>
              <input class="form-control" type="number" min="1" name="price" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Min</label>
              <input class="form-control" type="number" name="min" value="" required min="1">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Max</label>
              <input class="form-control" type="number" name="max" value="" required min="1">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Is Input</label>
              <select class="form-control" name="is_input" required>
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Is Bedroom</label>
              <select class="form-control" name="is_bedroom" required>
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Type</label>
              <select class="form-control" name="type" required>
                <option value="">Select</option>
                <option value="0">per night</option>
                <option value="1">per guest</option>
                <option value="2">single fee</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Publish</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Addon</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" class="update-form" action="{{url('admin/addon/update')}}" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          <input type="hidden" name="product_id" value="{{$product->id}}" />
          <input type="hidden" class="addon_id" name="addon_id" value="" />
          <div class="mb-3">
            <label class="col-form-label">Title</label>
            <input class="form-control" type="text" name="title" required>
          </div>
          <div class="mb-3">
            <label class="col-form-label">Price</label>
            <input class="form-control" type="number" min="1" name="price" required>
          </div>
          <div class="mb-3">
            <label class="col-form-label">Min</label>
            <input class="form-control" type="number" name="min" value="" required min="1">
          </div>
          <div class="mb-3">
            <label class="col-form-label">Max</label>
            <input class="form-control" type="number" name="max" value="" required min="1">
          </div>
          <div class="select-section">
            <div class="mb-3">
              <label class="col-form-label">Is Input</label>
              <select class="form-control" name="is_input" required>
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Is Bedroom</label>
              <select class="form-control" name="is_bedroom" required>
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Type</label>
              <select class="form-control" name="type" required>
                <option value="">Select</option>
                <option value="0">per night</option>
                <option value="1">per guest</option>
                <option value="2">single fee</option>
              </select>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
</div>
@endsection