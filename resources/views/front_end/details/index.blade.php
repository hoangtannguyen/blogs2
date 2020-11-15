<!DOCTYPE html>
<html lang="en">
<head>
@include('front_end.index.layout.header')
</head>
<body>
    
@include('front_end.index.layout.banner')

<section class="banner-unit" id="dx-modal" >
<div>
        <div class="banner-new">
            LATEST NEWS
        </div>
        <div>
            <img class="page-blogs-images" src="{{$blogs->image}}" alt="">
        </div>
      <div class="page-work">
        <div class="page-title" >
            <span>#1</span>  {{ $blogs->title }}
        </div>
        <div class="page-description" >
            {{ $blogs->description }}
        </div>
        <div class="page-title-two" >
            <span>#2</span> {{ $blogs->title_two}}
        </div>
        <div class="page-content">
             {!! $blogs->content !!}
        </div>
    </div>
    <div class="banner-like">
        <div class="banner-comment">
            Comment   
        </div>
        <div class="fb-like" data-href="{{ route('index.details',$blogs->id) }}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
    </div>
    <div class="comment">
      <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="4i7jWfHU"></script>
        <div class="fb-comments" data-href="{{ route('index.details',$blogs->id) }}" data-numposts="5" data-mobile="true"  data-width="100%" data-colorscheme="dark" ></div>    
    </div>
    <div class="paddingnew"></div>
</div>




@include('front_end.index.layout.trending')

</section>

@include('front_end.index.layout.js')





</body>
</html>