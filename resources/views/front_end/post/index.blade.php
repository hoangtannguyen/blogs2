@extends('front_end.index.index')
@section('content')

<div>
    <div class="banner-new">
        THEME BÀI VIẾT
    </div>
    <div class="banner-button">

    @foreach ($categorys as $category)
        <button class="button-new">{{$category->name}}</button>
    @endforeach

    </div>

@foreach ($categorys as $category)
<div class="banner-one">
    @foreach ($category->blogs as $blog)
    <div class="banner-langding">
    <img class="banner-image" src="{{$blog->image}}" alt="">
    {{-- <div class="overlay">
        <div class="text">Hello World</div>
    </div> --}}
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
@endforeach
</div>


@endsection

