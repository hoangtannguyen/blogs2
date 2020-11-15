@extends('admin2.index')
@section('content')

@include('backend.category.layouts.js')

 
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
                    <a href="#" onclick="RoleUser.create()" class="btn btn-success text-light btn-sm">
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
                        <th>User</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody id="role_userTable">
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>#Id</th>
                        <th>User</th>
                        <th>Role</th>
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
          <input  hidden name="id" id="id" value="0" >
            <div class="modal-header">
                <h5 class="modal-title text-center" id="fs-modal-title"></h5>
                <button class="btn btn-dark" type="button" aria-label="Close"
                    onclick="confirm()?$('#fs-modal').modal('hide'):''">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container">
              <div class="container">
                <span>User</span><br>
                <select name="user_id" id="user_id" class="form-control select2">
                </select>
            </div>
              <div class="container">
                  <span>Role</span><br>
                  <select name="role_id" id="role_id" class="form-control select2">
                  </select>
              </div>
                <div class="modal-footer">
                    <button type="button" id="btn-save" class="btn btn-warning btn-block"
                        onclick="RoleUser.save()">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>




<script src="{{ asset('js/role_user.js') }}"></script>


  
@endsection