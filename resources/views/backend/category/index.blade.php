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
                    <a href="#" onclick="Ca.create()" class="btn btn-success text-light btn-sm">
                      <i class="fas fa-plus-circle">
                      </i> Create
                      </a>
                </h3>
              </div>
              <div class="card-body">
                <table id="fs-table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>#Id</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>#Id</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            {{-- <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categories Off</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="fs-table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>#Id</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>#Id</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
            </div> --}} 
          </div>
        </div>
      </div>
    </section>
  </div>
  

  
<div id="fs-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
data-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form>
            <div class="modal-header">
                <h5 class="modal-title text-center" id="fs-modal-title">Create Factor Salary</h5>
                <button class="btn btn-dark" type="button" aria-label="Close"
                    onclick="confirm()?$('#fs-modal').modal('hide'):''">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container">
                <div class="container">
                    <span>Name</span><br>
                    <input class="form-control col" type="text"  name="name" >
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-save" class="btn btn-warning btn-block"
                        onclick="Ca.save(this)">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>


<script src="{{ asset('js/category.js') }}"></script>


  
@endsection