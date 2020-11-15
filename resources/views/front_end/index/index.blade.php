<!DOCTYPE html>
<html lang="en">
<head>
@include('front_end.index.layout.header')
</head>
<body>


@include('front_end.index.layout.banner')



<section class="baner-dev">

  <div class="baner-all">
     <a href=""> HOT LATEST </a> 
  </div>

<div class="swiper-container">
  <div class="swiper-wrapper">
  @foreach ($blog_all as $all)
      <div class="swiper-slide">
      <img src="{{ $all->image}}" class="swiper-slide-image" alt="">
          <div class="swiper-title">
                  {{$all->title}}
          </div>
          <div class="swiper-description">
                 {{$all->users->name}}
          </div>
      </div>
  @endforeach
</div>
  <div class="swiper-pagination"></div>
</div>


</section>


<section class="banner-unit" >

@yield('content')  

@include('front_end.index.layout.trending')

</section>



@include('front_end.index.layout.js')





</body>
</html>