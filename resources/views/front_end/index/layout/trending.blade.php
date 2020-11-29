<div class="trending-all">
    <div class="trending-title">
        Liên hệ
    </div>
    <div class="trending-input">
        <form action="{{route('index.contact')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" size="10" placeholder="Name">
            {{-- <input type="text" name="content"  placeholder="Content">
            <input type="email" name="email"  placeholder="Gửi mail cho gô !">
            <button type="submit">email</button> --}}
        </form>
    </div>
    <div class="trending-banner-title">
        BÀI VIẾT MỚI
    </div>
<div  id="table_data">
    @foreach ( $blog_common as $common)
    <a  href="{{ route('index.details',$common->id) }}">
        <div class="banner-trending">
            <img class="trending-image-cate"  src="{{$common->image}}" alt="">
            <div class="trending-work">
                <div class="trending-date">{{$common->created_at}}</div>
                <div class="trending-title">{{$common->title}}</div>
            </div>
        </div>
    </a>
    @endforeach
    {{-- {{$blog_common->links()}} --}}
</div>

    <div class="category-all">
        <div class="trending-category">
                THỂ LOẠI
        </div>
        <div class="trending-p">
            @foreach ($categorys as $category)
                <p>{{$category->name}} ({{count($category->blogs)}})</p>
            @endforeach
        </div>
    </div>
    <div class="trending-like">
        THÍCH & CHIA SẼ
    </div>
    <div class="trending-icons">
        <img class="trending-icons-images" src="/images/facebook.png" alt="">
        <img class="trending-icons-images" src="/images/instagram.png" alt="">
        <img class="trending-icons-images" src="/images/linkedin.png" alt="">
        <img class="trending-icons-images" src="/images/twitter.png" alt="">
        <img class="trending-icons-images" src="/images/gp.png" alt="">
    </div>
    <div>
        <img class="trending-image" src="/images/share.png" alt="">
    </div>
    <div>
        <img class="trending-image" src="/images/3.jpg" alt="">
    </div>
</div>
