@extends('admin.index')

@section('content')

<script src="{{ asset('js/blog.js')}}"></script>


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<section  id="contact_form" >

<div class="row"  >
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">#Blogs Table</h3> --}}

        <div class="card-tools">

          <a class="btn btn-primary btn-sm mb-2 "  href="{{ route('blog.create') }}">
            <i class="fas fa-plus-circle">
            </i>
            Create
          </a>
          
          <form class="form-inline ml-3 float-right">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" id="myInput"  type="search" placeholder="Search ..." aria-label="Search">
              <div class="input-group-append">
              </div>
            </div>
          </form>
          
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 600px">
        <table  class="table table-head-fixed text-nowrap" >
          <thead>
            <tr>
              <th>Name</th>
              <th>Title</th>
              <th>Images</th>
              <th>View</th>
              <th>Category</th>
              <th>Show</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody id="bl_table">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</section>

<!-- /.card-body -->




<div class="modal" id="dx-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Chi tiết</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
          <table class="mx-auto modal-content">           
              <tr>
                  <td>View: </td>
                  <td for="" id="view"></td>
              </tr>
              <tr>
                  <td>Content: </td>
                  <td for=""  id="content"></td>
              </tr>
              <tr>
                  <td>Title: </td>
                  <td for="" id="title"></td>
              </tr>
              <tr>
                  <td>Description: </td>
                  <td for="" id="description"></td>
              </tr>
              <tr>
                  <td>Image: </td>
                  <td for=""><img id="image" src="#" alt="" srcset="" width="250"></td>
              </tr>          
          </table>
      </div>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
  
    </div>
  </div>
  </div>



@endsection