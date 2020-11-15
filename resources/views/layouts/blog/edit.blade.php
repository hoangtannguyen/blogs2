
@extends('admin.index')
@section('content')

@include('blog.layouts.header')


<form action="{{ route('blog.update',$blogs->id) }}"   id="contact_form" class="form-create" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
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
                <input type="text" name="title"  class="form-control" value="{{ $blogs->title }}">
              </div>
              @error('title')
                <div class="alert alert-danger">
                    {{ $message}}
                </div> 
              @enderror
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" name="description" rows="3">{{ $blogs->description }}</textarea>
                </div>
              @error('description')
                <div class="alert alert-danger">
                    {{ $message}}
                </div> 
              @enderror
              <div class="form-group">
                <label for="inputDescription">Content</label>
                <textarea  class="form-control" id="noidung" name="content">{{ $blogs->content }}</textarea>
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
              <input type="text" name="title_two"  class="form-control" value="{{ $blogs->title_two }}">
            </div>
              <div class="form-group">
                <label for="inputStatus">Category_id</label>
                <select class="form-control custom-select" name="category_id" size="4">
                  @foreach ($categorys as $item)
                      <option {{ $item->id == $blogs->category_id   ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
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
                <input type='file' accept='image/*'  class="form-control-file"  name="image" onchange='openFile(event)'>
              </div>
              <div class="form-group">
              <img id='output' src="{{$blogs->image}}" style="height:210px; width:250px;border-radius:10px;object-fit: cover;">
              </div>
              @error('image')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
              @enderror
              <div class="row">
                <div class="col-12">
                  <a href="{{ route('blog.index') }}" class="btn btn-warning">Trở về</a>
                  <button type="submit" class="btn btn-success swalDefaultSuccess">
                    Edit
                  </button>
                </div>
              </div>
          </div>
          </div>  
        </form>


@include('blog.layouts.js')


@endsection