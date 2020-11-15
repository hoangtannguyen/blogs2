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
        
    <div class="banner-one">
        <div class="banner-langding">
        <img class="banner-image" src="{{$blogs->image}}" alt="">
            <div class="banner-work">
                <div class="banner-date">
                    {{$blogs->created_at}} / in <span class="text-action">Game</span>
                </div>
                <div class="banner-action">
                    <div>
                        <span class="text-action"><i class="fa fa-eye"></i> {{$blogs->view}} </span>
                    </div>
                    <div>
                        <a href="/post-link" class="text-action">
                            <i class='fas fa-comment'></i>
                            <span class="fb-comments-count" data-href="{{ route('index.details',$blogs->id) }}">0</span>
                        </a>
                    </div> 
                    <div>
                        <span class="text-action"><i class='far fa-edit'></i>
                            {{$blogs->users->name}} </span>
                    </div>
                </div>
                <div class="banner-title">
                    {{$blogs->title}} 
                </div>
                <div class="banner-content">
                    {{$blogs->description}} 
                </div>
                <div class="banner-more">
                <a href="{{ route('index.details',$blogs->id) }}">READ MODE <i class='fas fa-angle-double-right'></i></a>
                </div>
            </div>        
        </div>     
    </div>
 </div>
    


@include('front_end.index.layout.trending')

</section>

@include('front_end.index.layout.js')





</body>
</html>