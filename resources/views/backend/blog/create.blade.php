@extends('admin2.index')
@section('content')

 <div class="content-wrapper" style="overflow: hidden">
    <section class="content" style="padding: 30px 0 0">
      <div class="row">
        <div class="col-md-9 mx-auto">
          @include('backend.blog.layout.header')
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-dragon"></i> User Post</h3>
            </div>
          <form action="{{ route('UserPost.store') }}"  id="contact_form" class="form-create" enctype="multipart/form-data" method="POST">
            @csrf
            @method('POST')
            <div class="card-body">
              <div class="form-group" >
                <label for="inputName">Title</label>
                <input type="text" name="title"  id="title" size="1" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">He describes</label>
                <input type='file' accept='image/*'  class="form-control-file" id="image" name="image" onchange='openFile(event)'>
              </div>
              <div class="form-group" style="width: 350px;width:350px">
                   <img id='output' src="/images/conruoi.jpg" class="img-uot">
              </div>
              <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea  id="description"  name="description" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group s1">
                <label for="inputDescription">Content</label>
                <textarea id="text-xara" name="content" name="image" class="text-xara" rows="5" placeholder="Place some text here"
                style="width: 100%; height: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 80px;"></textarea>     
              </div>  
                <div class="form-group">
                <label for="inputStatus">Theme</label>
                <select  id="category_id"  name="category_id"  class="form-control custom-select required">
                    <option value="default">Choose...</option>
                  @foreach ($categorys as $item)
                    <option  value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-success float-right" ><i class="fas fa-plus-circle"></i> Create Post</button>
                </div>
              </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</section>
</div>


@include('backend.blog.layout.js')


@endsection