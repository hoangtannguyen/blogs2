<div class="trending-all">
    <div class="trending-title">
        Liên hệ Email
    </div>
    <div class="trending-input">
        <form id="contact-input" action="{{route('index.contact')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title-email">
                Tên
            </div>
            <div>
                <input type="text" name="name" id="name" placeholder="Nhập tên !" required>
            </div>
            <div class="title-email">
                Email
            </div>
            <div class="input-email">
                <input type="email" name="email" id="email" placeholder="Nhập email !" required>
            </div>
            <div class="title-email">
                Nội dung
            </div>
            <div class="input-email">
                <textarea type="text" rows="5"  name="content" required></textarea>
            </div>
            <div class="input-email">
                <button class="button-top" type="submit">Submit</button>
            </div>
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

