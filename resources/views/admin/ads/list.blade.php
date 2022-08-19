@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>List Ads</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">List Ads</li>
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
                    <th>User</th>
                    <th>Img</th>
                    <th>Title</th>
                    <th>Price Type</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                      @foreach($ads as $ad)
                      <tr >
                            <td class="id position-relative"> @if($ad->status == 0) <i class="fa  text-green position-absolute" style="top:-40px;left:5px"><span class="f-70">.</span></i> @endif {{$ad->id}}</td>
                            <td class="id">{{$ad->email}}</td>
                            <td class="heading"><img src="{{asset('front/img/'.$ad->img)}}" width="100"></td>
                            <td class="description">{{$ad->title}}</td>
                            <td class="description">
                              @if($ad->price_type == 1)
                              Fixed
                              @elseif($ad->price_type == 2)
                              Negotiable
                              @else
                              On Call
                              @endif
                            </td>
                            <td class="description">$ {{$ad->price}}</td>
                            <td class="description">
                              @if($ad->type == 1)
                              Rent
                              @else
                              Sell
                              @endif
                            </td>
                            <td class="description">
                              @if($ad->status == 0)
                              Pending
                              @else
                              <span class="text-success">Live</span>
                              @endif
                            </td>
                            <td class="description">{{$ad->created_at}}</td>
                            <td class="d-flex">
                            <a href="{{url('admin/ads/edit/'.$ad->id)}}" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <form id="delete-form" action="{{url('admin/ads/destroy/'.$ad->id)}}" method="post">
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