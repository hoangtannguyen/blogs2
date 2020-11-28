<section id="banner">

    <div class="header-top">
        <div class="logo">
            <i class="fa fa-search"></i>
        </div>
    </div>
<form action="{{route('index.search')}}" method="GET" enctype="multipart/form-data">
    <div class="all-search-top">
        <input class="header-search-top"  name="key" value="{{$keyword}}" type="text" placeholder=" Seach ...">
        <button class="button-search-top" > <i class="fa fa-close"></i></button>
    </div>
</form>

<header>

    <ul class="ul-enty">
    <li class="menu-li" id="home"><a href="{{ route('index.index')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
        <li  class="on menu" id="home" ><a href="#"><i class="fa fa-bars"></i></a> Menu</li>
        <li class="dropdown menu-li" ><a href=""> Thông tin bài viết </a> <i  class='fa fa-hand-o-down'></i>
            <ul class="dropdown-1">
                <div class="ul-title ul-title-one">
                    <li ><a href="">Yone</a></li>
                    <li ><a href="">Diana</a></li>
                    <li><a href="">Leona</a></li>
                    <li><a href="">Hecrim</a></li>
                </div>
                <div class="dropdown-grid">
                <div>
                    <li>
                    <a href=""><img style="width: 150px" src="/images/avatar.png" alt=""></a>
                        <div class="title-down">
                            Image You
                        </div>
                        <div class="title-date">

                        </div>
                    </li>
                </div>
                <div>
                    <li>
                    <a href=""><img style="width: 150px" src="/images/avatar.png" alt=""></a>
                        <div class="title-down">
                            Image You
                        </div>
                        <div class="title-date">

                        </div>
                    </li>
                </div>
                <div>
                    <li>
                    <a href=""><img style="width: 150px" src="/images/avatar.png" alt=""></a>
                        <div class="title-down">
                            Image You
                        </div>
                        <div class="title-date">

                        </div>
                    </li>
                </div>
                </div>
            </ul>
        </li>
        @if (Auth::check())
         <li class="dropdown" ><a href="">
            <img src="{{ Auth::user()->image }}" style="width:20px;height:20px;border-radius:50%"></a>
            <i class='fas fa-address-book'></i>
            <ul class="dropdown-1">
                <div class="ul-title ul-title-one">
                    <li ><a href="">Thông tin</a></li>
                    <li ><a href="">Ảnh của bạn</a></li>
                    <li ><a href="{{ route('logout')}}">Đăng xuất</a></li>
                </div>
                <div class="dropdown-grid">
                <div>
                    <li>
                    <a href=""><img style="width: 150px;border-radius:50%" src="{{ Auth::user()->image }}" alt=""></a>
                        <div class="title-down">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="title-date">
                        </div>
                    </li>
                </div>
                </div>
            </ul>
        </li>
        @else
            <li class="dropdown" ><a href="{{ route('UserPost.create') }}"> Đăng bài viết </a>
            </li>
        @endif
    </ul>

</header>

    <div class="header-text">
        <div class="header-text-title">
            YOUPLAY
        </div>
        <div class="header-text-description">
            <span class="living"></span>
        </div>
        <div>
            <button id="button-header" type="submit"> <i class="fa fa-eye"></i>Show</button>
        </div>
    </div>
</section>

<section class="menu-reponse">
    <div class="menu-center on">
        <i class="fa fa-close"></i>
        Menu
    </div>
    @if (Auth::check())
    <li class="menu-border">
        <a class="open" href="#" style="display: flex"><img src="{{ Auth::user()->image }}" style="width:20px;height:20px;border-radius:50%"> {{ Auth::user()->name }}<i class="fa fa-caret-down"></i></a>
        <ul class="sub-menu">
            <li><a href="{{ route('logout') }}">Thông tin</a></li>
            <li><a href="{{ route('logout') }}">Ảnh của bạn</a></li>
            <li><a href="{{ route('logout') }}">Đăng Xuất</a></li>
        </ul>
    </li>
    @else
        <li class="menu-border">
            <a class="open" href="{{ route('UserPost.create') }}">Đăng nhập<i class="fa fa-caret-down"></i></a>
        </li>
    @endif
    <ul class="menu-down">
        <li class="menu-border">
            <a class="open" href="#">Bài viết<i class="fa fa-caret-down"></i></a>
            <ul class="sub-menu">
                <li><a href="{{ route('UserPost.create') }}">Post</a></li>
            </ul>
        </li>
    </ul>
  </section>

<div class="scroll-up-btn">
    <i class="fas fa-angle-up"></i>
</div>


