<div class="trending-all">
    <div class="trending-title">
        TRENDING
    </div>
    <div class="trending-input">
        <form action="{{route('index.search')}}" method="GET" enctype="multipart/form-data">
            <input type="text" name="key" value="{{$keyword}}" aria-label="Search" placeholder="Type key work end hit enter">
        </form>
    </div>
    <div class="trending-like">
        Like Share
    </div>
    <div class="trending-icons">
        <i class='fas fa-dragon'></i>
        <i class='fas fa-hippo'></i>
        <i class='fas fa-fish'></i>
        <i class='fas fa-dove'></i>
    </div>
    <div class="trending-banner-title">
        Newest write
    </div>
    @foreach ( $blog_common as $common)
        <div class="banner-trending">
            <img class="trending-image-cate"  src="{{$common->image}}" alt="">
            <div class="trending-work">
                <div class="trending-date">{{$common->created_at}}</div>
                <div class="trending-title">{{$common->title}}</div>
            </div>
        </div>
    @endforeach

    <div class="category-all">
        <div class="trending-category">
                CATEGORIES
        </div>
        <div class="trending-p">
            <p>Games</p>
            <p>Gaming Tips & Tricks</p>
            <p>Online Games</p>
            <p>Team Games</p>
            <p>Community</p>
            <p>
                Uncategorized</p>
        </div>
    </div>
    <div>

    </div>
    <div>
        <img class="trending-image" src="/images/3.jpg" alt="">
    </div>
</div>
