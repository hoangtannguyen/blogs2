<!DOCTYPE html>
<html lang="en">
<head>
@include('front_end.index.layout.header')
</head>
<body>

@include('front_end.index.layout.banner')




<section class="banner-unit" id="dx-modal" >

<div class="user-post-all user-details">

    <div class="banner-new">
        Thông tin cá nhân
    </div>

    <div class="banner-user-padding">
        @if(session()->has('message'))
        <div class="success-user">
            {{ session()->get('message') }}
        </div>
        @endif
    </div>


    @include('backend.blog.layout.header')

              <form action="{{ route('UserPost.update',$blogs->id) }}"   id="contact_form"  enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="input-post-padding">
                    <label>Tên</label><br>
                    <input type="text" name="name"  id="name" id="inputName"  class="input-post input-title"  value="{{$blogs->name}}">
                </div>
                  <div class="input-post-padding">
                    <label>Ảnh đại diện</label><br>
                    <input type='file' accept='image/*'  id="image" name="image" value="{{$blogs->image}}" onchange='openFile(event)'>
                </div>
                  <div class="input-post-padding img-uot-all">
                       <img id='output' class="img-uot-two" src="{{ $blogs->image }}" >
                       <div id="btn-file-reset"><i class="fa fa-close"></i>
                       </div>
                  </div>
                  <div class="alert-message" id="nameError"></div>
                <div class="input-post-padding">
                    <label>Email</label><br>
                    <input name="email" type="email" id="email" class="input-post input-title" value="{{$blogs->email}}">
                </div>
                <div class="input-post-padding">
                    <label>Mật khẩu</label><br>
                    <input name="password" type="password" id="password" class="input-post input-title">
                </div>
                <div class="input-post-padding">
                    <label>Nhập lại</label><br>
                    <input name="password" type="password" id="password" class="input-post input-title">
                </div>
                <div>
                    <button type="submit" class="button-user-post" ><i class="fas fa-plus-circle"></i> Cập nhật</button>
                </div>
            </form>
        </div>
    @include('backend.blog.layout.js')
</div>

@include('front_end.index.layout.trending')

</section>

@include('front_end.index.layout.js')





</body>
</html>
