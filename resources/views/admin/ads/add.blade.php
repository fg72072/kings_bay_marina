@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Add Blog</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Add Blog</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
      <form method="POST" action="{{route('add-blog')}}" enctype="multipart/form-data">
    <div class="row second-chart-list third-news-update">
      <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
        <div class="card-body">
            @csrf
            <div class="mb-3">
            <div class="form-group">
                <div id="profile-container">
                    <img class="" id="profileImage" src="" alt="Upload Icon" data-holder-rendered="true" max-height="10px;" max-width="100px;" style="height:100px;width:100px;">
                </div>
                <br>
                <input id="imageUpload" type="file" name="img" placeholder="Photo" capture="" value="" required>
            </div>
             </div>
            <div class="mb-3">
              <label class="col-form-label">Title</label>
              <input class="form-control" type="text" name="title" value="" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Short Intro</label>
              <textarea class="form-control" name="short_intro" id="" cols="30" rows="3" required></textarea>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
        <div class="card-body">
            
            <div class="mb-3">
              <label class="col-form-label">Description</label>
              <textarea class="form-control" name="description" id="" cols="30" rows="5" required></textarea>
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Publish</button>
        </div>
    </div>
    </form>


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