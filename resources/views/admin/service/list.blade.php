@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>List Service</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">List Service</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">


  </div>
  <div class="row">
    <!-- Zero Configuration  Starts-->
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="display" id="basic-1">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Img</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Min</th>
                  <th>Max</th>
                  <th>Quantiy</th>
                  <!-- <th>Short Intro</th> -->
                  <th>Type</th>
                  <th>Menu</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr>
                  <td class="id">{{$product->id}}</td>
                  <td class="heading"><img src="{{asset('front/img/'.$product->img)}}" width="100"></td>
                  <td class="description">{{$product->title}}</td>
                  <td class="description">{{$product->category->title}}</td>
                  <td class="description">${{$product->price}}</td>
                  <td class="description">
                    @if($product->min_limit)
                    {{$product->min_limit}}
                    @else
                    -
                    @endif
                  </td>
                  <td class="description">
                    @if($product->max_limit)
                    {{$product->max_limit}}
                    @else
                    -
                    @endif
                  </td>
                  <td class="description">
                    @if($product->qty)
                    {{$product->qty}}
                    @else
                    {{$product->stock}}
                    @endif
                  </td>
                  <!-- <td class="description">{{Str::limit($product->short_intro,100)}}</td> -->
                  <td>
                    @if($product->form_type == 0)
                    Hours
                    @elseif($product->form_type == 1)
                    Days
                    @elseif($product->form_type == 2)
                    Months
                    @elseif($product->form_type == 3)
                    Years
                    @endif
                  </td>
                  <td class="description">
                    @if($product->menu == 1)
                    Right
                    @elseif($product->menu == 2)
                    Left
                    @else
                    -
                    @endif
                  </td>
                  <td class="description">
                    @if($product->status == 1)
                    Active
                    @else
                    Unactive
                    @endif
                  </td>
                  <td class="d-flex">
                    <a href="{{url('admin/service/edit/'.$product->id)}}" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                    <form id="delete-form" action="{{url('admin/product/destroy/'.$product->id)}}" method="post">
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
</div>
<!-- Container-fluid Ends-->
</div>
@endsection