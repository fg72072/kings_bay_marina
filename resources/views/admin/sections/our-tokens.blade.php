@extends('admin.layouts.app')
@section('section')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Our Tokens Section</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Our Tokens</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row second-chart-list third-news-update">
            <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
                <div class="card-body">
                    <form method="POST" action="{{url('admin/our-tokens/'.$setting->id)}}" enctype="multipart/form-data">
                        @csrf
                      <div class="mb-3">
                        <label class="col-form-label">Heading</label>
                        <input class="form-control" type="text" name="heading" value="{{json_decode($setting->content)->heading}}" required>
                      </div>
                      <button class="btn btn-primary offset-md-5" type="submit">Update Record</button>
                    </form>
                  </div>
            </div>
  
          
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

@endsection
