<!DOCTYPE html>
<html lang="en">
<head>

@include('admin.layouts.heade')
   
</head>
<body>

<nav class="one-table">

  <div class="home-table">
    <a href=""><i class="fas fa-dragon"></i>
      Admin Table
    </a> 
  </div>

  <div>
      <ul class="home-ul-hover">
        <li><a href="">
          <img  class="home-image" src="../images/wukong.jpg" alt="">
          <i class="fa fa-angle-down"></i>
        </a> 
          <ul class="dropdown-home">
            <li><a href="">Hello 
             <span>
               {{ Auth::user()->name }}
            </span> 
            </a></li>
          <li><a href="{{route('logout')}}">Logout</a></li>
          </ul>
        </li>
      </ul>
  </div>
</nav>



@include('admin.layouts.sidebar')


<section class="table-page">

 
@yield('content')




</section> 





<script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      });
    }
    </script>

</body>
</html>