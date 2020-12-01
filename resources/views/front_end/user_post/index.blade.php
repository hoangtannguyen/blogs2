<!DOCTYPE html>
<html lang="en">
<head>
@include('front_end.index.layout.header')
</head>
<body>

@include('front_end.index.layout.banner')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


<section class="banner-unit" id="dx-modal" >

<div class="user-post-all">

    <div class="banner-new">
        Đăng bài viết mới
    </div>

    @include('backend.blog.layout.header')

              <form action="{{ route('UserPost.store') }}"  id="contact_form"  enctype="multipart/form-data" method="POST">
                @csrf
                @method('POST')
                  <div class="input-post-padding">
                    <label>Tiêu đề</label><br>
                    <input type="text" class="input-post input-title"  id="title" name="title"  placeholder="Nhập tiêu đề !">
                </div>
                  <div class="input-post-padding">
                    <label>Ảnh mô tả</label><br>
                    <input type='file' accept='image/*'  id="image" name="image" onchange='openFile(event)'>
                </div>
                  <div class="input-post-padding img-uot-all">
                       <img id='output' class="img-uot-two" src="/images/conruoi..jpg" >
                       <div id="btn-file-reset"><i class="fa fa-close"></i>
                       </div>
                  </div>
                  <div class="alert-message" id="nameError"></div>
                  <div class="input-post-padding">
                    <label>Mô tả</label><br>
                    <textarea  id="description"  name="description" class="user-textarea"  rows="5"></textarea>
                  </div>
                  <div class="input-post-padding">
                    <label>Nội dung</label>
                    <textarea id="content" name="content"  class="summernote" rows="5"></textarea>
                  </div>
                    <div class="input-post-padding">
                    <label>Thể loại</label><br>
                    <select class="input-post" id="category_id"  name="category_id">
                        <option value="default">Choose...</option>
                      @foreach ($categorys as $item)
                        <option  value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                  </div>
                <div>
                    <button type="submit" class="btn btn-success float-right" ><i class="fas fa-plus-circle"></i> Đăng bài</button>
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
