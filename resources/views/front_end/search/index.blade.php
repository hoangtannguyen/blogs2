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
        LATEST SEARCH
    </div>

@if (count($blogs) == 0)
    <img class="searcherror" src="/images/500.png" alt="">
@else
<div class="banner-one">
    @foreach ($blogs as $blog)
    <div class="banner-langding">
    <img class="banner-image" src="{{$blog->image}}" alt="">
        <div class="banner-work">
            <div class="banner-date">
                {{$blog->created_at}} / in <span class="text-action">Game</span>
            </div>
            <div class="banner-action">
                <div>
                    <span class="text-action"><i class="fa fa-eye"></i> {{$blog->view}} </span>
                </div>
                <div>
                    <a href="/post-link" class="text-action">
                        <i class='fas fa-comment'></i>
                        <span class="fb-comments-count" data-href="{{ route('index.details',$blog->id) }}">0</span>
                    </a>
                </div>
                <div>
                    <a href="#" class="text-action blog-name"><i class='far fa-edit'></i>
                        {{$blog->users->name}} </a>
                </div>
            </div>
            <div class="banner-title">
                {{$blog->title}}
            </div>
            <div class="banner-content">
                {{$blog->description}}
            </div>
            <div class="banner-more">
            <a href="{{ route('index.details',$blog->id) }}">READ MODE <i class='fas fa-angle-double-right'></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif


</div>


@include('front_end.index.layout.trending')
</section>
@include('front_end.index.layout.js')
</body>
</html>
