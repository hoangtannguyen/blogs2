
@extends('admin.index')
@section('content')

@include('blog.layouts.header')



<form action="{{ route('blog.store') }}"  id="contact_form" class="form-create" enctype="multipart/form-data" method="POST">
  @csrf
  @method('POST')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">BLogs Table</h3>
          </div>
          <div class="card-body">

          <div class="create-from-one">
            <div class="form-group">
              <label for="inputName">#1 Title</label>
              <input type="text" name="title" id="title"  class="form-control">
            </div>
            @error('title')
              <div class="alert alert-danger">
                  {{ $message}}
              </div> 
            @enderror
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
              </div>
            @error('description')
              <div class="alert alert-danger">
                  {{ $message}}
              </div> 
            @enderror
            <div class="form-group" id="content1">
              <label for="inputDescription">Content</label>
              <textarea  class="form-control" id="noidung" name="content"></textarea>
            </div>
            @error('content')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
            @enderror
          </div>         
          <div class="create-from-one">
              <div class="form-group">
                <label for="inputName">#2 Title</label>
                <input type="text" name="title_two"  class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Choose The</label>
                <select class="form-control custom-select" name="category_id" size="4">
                  @foreach ($categorys as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
            </select>
              </div>
              @error('category_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
              @enderror
              <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type='file' accept='image/*'  class="form-control-file"  name="image" onchange='openFile(event)'><br>
                <img id='output' style="width: 300px;height:200px">
              </div>
              @error('image')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
              @enderror
              <div class="row">
                <div class="col-12">
                  <a href="{{ route('blog.index') }}" class="btn btn-warning">Trở về</a>
                  <button id="saveBlog" type="submit" class="btn btn-success swalDefaultSuccess">
                    Thêm
                  </button>
                </div>
              </div>
          </div>
          </div>  
        </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>
</form>


@include('blog.layouts.js')

@endsection