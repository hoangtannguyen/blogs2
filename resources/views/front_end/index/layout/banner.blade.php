<section id="banner">

    <div class="header-top">

        <div class="header-login">
                {{-- <a href=""><i class="fa fa-bars"></i> Menu</a> --}}
        </div>
        
        <div class="logo">
            <h1>Legend of League</h1>
        </div>

    <div class="header-login">
            {{-- <a href="{{ route('login') }}">Login</a> --}}
    </div>

    </div>
    
<header>


    <ul class="ul-enty">
    <li class="menu-li" id="home"><a href="{{ route('index.index')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
        <li  class="on menu" id="home" ><a href="#"><i class="fa fa-bars"></i></a> Menu</li>
        <li class="dropdown menu-li" ><a href=""> Information </a> <i  class='fa fa-hand-o-down'></i>
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
                    <a href="">
                        {{-- <img style="width: 150px" src="{{ Auth::user()->image }}" alt=""> --}}
                    </a>
                        <div class="title-down">
                            {{-- {{ Auth::user()->name }} --}}
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
        <li class="menu-li"><a href="{{ route('UserPost.create') }}">Post Article</a></li>
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

    <div class="menu-center">
        Menu
    </div>
  
    <ul class="menu-down">
        <li class="menu-border">
            <a class="open" href="#">SildeBar <i class="fa fa-caret-down"></i></a>
            <ul class="sub-menu">
                <li><a href="#">SildeBar</a></li>
                <li><a href="#">SildeBar</a></li>
                <li><a href="#">SildeBar</a></li>
            </ul>
        </li> 
        <li class="menu-border">
            <a href="#">SildeBar</a>
        </li> 
        <li class="menu-border">
            <a class="open" href="#">SildeBar<i class="fa fa-caret-down"></i></a>
            <ul class="sub-menu">
                <li><a href="#">SildeBar</a></li>
                <li><a href="#">SildeBar</a></li>
                <li><a href="#">SildeBar</a></li>
            </ul>
        </li class="menu-border">  
        <li class="menu-border"><a href="#">SildeBar</a></li> 
    </ul>

    <div class="menu-image">
        <img style="#" src="/images/s2.jpg" alt="">
    </div>
  </section>



  
