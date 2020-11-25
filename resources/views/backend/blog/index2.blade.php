@extends('admin2.index')
@section('content')

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
                <div>
                <h3 class="card-title">
                  <a class="btn btn-success btn-sm"  href="#" onclick="Bl.create()" >
                    <i class="fas fa-plus-circle">
                    </i>
                    Create blogs
                  </a>
                </h3>
                </div>
              </div>
              <div class="card-body">
                <table id="bl_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th># ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>View</th>
                    <th>Theme</th>
                    <th style="width: 15%">Author</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="blog_table">
                  </tbody>
                  <tfoot>
                  <tr>
                    <th># ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>View</th>
                    <th>Theme</th>
                    <th>Author</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                {{-- <div class="float-right" style="position: relative;top:18px" id="paginate">
                  <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item page-one active"><a onclick="Bl.index(1)" class="page-link" href="#">1</a></li>
                    <li class="page-item page-one"><a onclick="Bl.index(2)" class="page-link" href="#">2</a></li>
                    <li class="page-item page-one"><a onclick="Bl.index(3)" class="page-link" href="#">3</a></li>
                    <li class="page-item page-one"><a onclick="Bl.index(4)" class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>



<script>
     $(document).ready(function()
    {
        $(document).on('click', '.page-one a',function(event)
        {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
        });

    });
</script>


<div id="fs-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
data-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <form enctype="multipart/form-data">
          <input  hidden name="id" id="id" value="0" >
            <div class="modal-header">
                <h5 class="modal-title"  id="fs-modal-title"></h5>
                <button class="btn btn-dark" type="button" aria-label="Close"
                    onclick="$('#fs-modal').modal('hide')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container">
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control col" placeholder="Enter ..." type="text"  name="title" id="title">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">He describes</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image"   accept="image/gif, image/jpeg, image/png" onchange="Bl.uploadAvatar(this);">
                      <span class="custom-file-label" for="exampleInputFile">Choose file</span>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text"  id="btn-file-reset-id"> <i class='fas fa-trash-alt'></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group" style="border: 1px solid #ced4da;border-radius: .25rem;height:150px;width:150px">
                  <img id="showAvatar" src="" alt="" style="width: 100%;height:100%;" >
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="description"  name="description"  class="form-control" rows="3" placeholder="Place some text here">
                    </textarea>
                </div>
                <div class="form-group">
                  <label>Content</label>
                  <textarea id="content" name="content"   class="text-xara" rows="5" placeholder="Place some text here">
                  </textarea>
                </div>
                <div class="form-group">
                  <label>Theme</label>
                  <select name="category_id" id="category_id"  class="form-control select2">
                  </select>
              </div>
                <div class="modal-footer">
                    <button type="button" id="btn-save" class="btn btn-warning btn-block"
                        onclick="Bl.save()">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
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
          <div class="form-group" >
            <label for="recipient-name" style="border-bottom:1px solid rgb(240, 17, 17) " class="col-form-label">Author</label>
          </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group" >
              <div>
                <label for="recipient-name" class="col-form-label">User Create</label>
              </div>
              <div>
                <h6 id="user_name"></h6>
              </div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">User Email</label>
              <h6 id="user_email"></h6>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Date Create</label>
              <h6 id="created_at"></h6>
            </div>
          </div>
          <div class="col-sm-6" >
            <div class="form-group">
              <h6><img style="width: 200px;height:200px;border-radius:50%" src="#" id="user_image" alt=""></h6>
            </div>
          </div>
        </div>
        </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>





<script src="{{ asset('js/blog.js')}}"></script>


@endsection
