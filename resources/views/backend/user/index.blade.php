@extends('admin2.index')
@section('content')

@include('backend.category.layouts.js')

@include('backend.blog.layout.header')


  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blogs Table</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <a href="#" onclick="us.create()" class="btn btn-success text-light btn-sm">
                      <i class="fas fa-plus-circle">
                      </i> Create
                      </a>
                </h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>#Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        {{-- <th>Permission</th> --}}
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody id="userTable">
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>#Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        {{-- <th>Permission</th> --}}
                        <th>Action</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>



<div id="fs-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
data-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form enctype="multipart/form-data">
            @method('put')
          <input  hidden name="id" id="id" value="0" >
            <div class="modal-header">
                <h5 class="modal-title text-center" id="fs-modal-title"></h5>
                <button class="btn btn-dark" type="button" aria-label="Close"
                    onclick="$('#fs-modal').modal('hide')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container">
                <div class="container">
                    <label>Name</label><br>
                    <input class="form-control col" type="text"  name="name" id="name">
                </div>
                <div class="container">
                    <label>Email</label><br>
                    <input class="form-control col" type="text"  name="email" id="email">
                </div>
                <div class="container">
                  <label>Password</label><br>
                  <input class="form-control col" type="password"  name="password" id="password">
               </div>
               <div class="container">
                <label>User Image</label><br>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image"   accept="image/gif, image/jpeg, image/png" onchange="us.uploadAvatar(this);">
                    <span class="custom-file-label" for="exampleInputFile">Choose file</span>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text"  id="btn-file-reset-id"> <i class='fas fa-trash-alt'></i></span>
                  </div>
                </div>
              </div>
              <div class="container">
                  <label>Roles</label><br>
                <select name="roles[]" id="roles" class="form-control">
                </select>
              </div>
              <div class="container" style="width:150px;height:150px;padding:15px 0;">
                <img id="showAvatar" src="" alt="" style="width: 100%;height:100%;border-radius:50%" >
              </div>
                <div class="modal-footer">
                    <button type="button" id="btn-save" class="btn btn-warning btn-block"
                        onclick="us.save()">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>




<script src="{{ asset('js/user.js') }}"></script>



@endsection
