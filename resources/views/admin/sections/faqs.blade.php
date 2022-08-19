@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>FAQs Section</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">FAQs</li>
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
          <h3>Add FAQs</h3>
          <form method="POST" action="{{route('add-faq')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="col-form-label">Heading</label>
              <input class="form-control" type="text" name="heading" value="" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Description</label>
              <textarea class="form-control" name="description" id="" cols="30" rows="5" required></textarea>
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Add Record</button>
          </form>
        </div>
      </div>


    </div>
    <div class="row">
      <!-- Zero Configuration  Starts-->
      <div class="col-sm-12">
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
                  <!-- @foreach ($section as $sec)
                        <tr>
                            <td class="id">{{$sec->id}}</td>
                            <td class="heading">{{json_decode($sec->content)->heading}}</td>
                            <td class="description">{{json_decode($sec->content)->description}}</td>
                            <td class="d-flex">
                            <a href="javascript::void();" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <form id="delete-form" action="{{url('admin/delete-buy-sub/'.$sec->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            </td>
                          </tr>
                      @endforeach -->

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