@extends('admin2.index')
@section('content')

@include('backend.blog.layout.header')

 <div class="content-wrapper" style="overflow: hidden">
    <section class="content" style="padding: 80px 0 0">
      <div class="row">
        <div class="col-md-6 mx-auto">
        @if(session()->has('message'))
          <div class="alert alert-success">
              {{ session()->get('message') }}
          </div>
        @endif
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-dragon"></i> Employee</h3>
            </div>
          <form action="{{ route('UserPost.update',$blogs->id) }}"   id="contact_form" class="form-create" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group" >
                <label for="inputName">Name</label>
                 <input type="text" name="name"  id="name" id="inputName" class="form-control" value="{{$blogs->name}}">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Email</label>
                <input name="email" type="email" id="email" class="form-control" value="{{$blogs->email}}">
              </div>  
              <div class="form-group">
                <label for="inputClientCompany">Change Password</label>
                <input name="password" type="password" id="password" class="form-control" value="{{$blogs->password}}">
              </div> 
              <div class="form-group">
                <label for="inputProjectLeader">Image</label>
                <input type='file' accept='image/*'  class="form-control-file" style="width: 100%;background-color:#eee;border-radius: .25rem;"  name="image" onchange='openFile(event)'>
              </div>
              <div class="form-group">
                  <img src="{{ $blogs->image }}" id='output' class="img-uot" style="width: 100px;height:100px">
              </div>
              <div class="row">
                <div class="col-12">
                  <button  type="submit" class="btn btn-success float-right" ><i class="fas fa-plus-circle"></i> Edit employee</button>
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