@extends('admin2.index')
@section('content')

<script src="{{ asset('js/blog.js')}}"></script>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>He Posted</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
            @endif
            <div class="card">
              <div class="card-header">
                <div>
                  <h3 class="card-title">
                    <a class="btn btn-success btn-sm mb-3"  href="{{ route('UserPost.create') }}">
                      <i class="fas fa-plus-circle">
                      </i>
                      Create User Post
                    </a>
                  </h3>
                </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th># ID</th>
                    <th style="width: 25%">Title</th>
                    <th>Images</th>
                    <th>View</th>
                    <th>Theme</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @if (count($blogs) === 0)
                    <th>KCDL</th>
                @else
                @foreach ($blogs as $key => $blog)           
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$blog->title}}</td>
                    <td><img src="{{$blog->image}}" style="width:50px;height:50px;border-radius:15%" alt=""></td>
                    <td>{{$blog->view}}</td>
                    <td>{{$blog->categories->name}}</td>
                    <td> 
                        <div style="display: flex;">
                            <a class="btn btn-warning btn-sm" onclick="Bl.showUserPost({{$blog->id}})" >
                                <i class="fa fa-eye"></i>Show                        
                            </a>                 
                        </div>
                    </td>
                  </tr>                           
                @endforeach
              @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th># ID</th>
                    <th>Title</th>
                    <th>Images</th>
                    <th>View</th>
                    <th>Category</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                <div class="float-right pt-3">
                  {{-- {{$blogs->links()}} --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <div class="modal"  id="dx-modal">
    <div class="modal-dialog modal-lg  modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Details blog</h6>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description</label>
            <h5 id="description"></h5>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Content</label>
            <h5 id="content"></h5>
          </div>
        </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>        
      </div>
    </div>
  </div>
  

 
  
  
@endsection