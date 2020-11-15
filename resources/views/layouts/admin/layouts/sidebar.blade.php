  
  
  
  <input type="checkbox" name="" id="check">
    <label for="check">
        <i class="fa fa-bars" id="btn"></i>
    </label>

<section class="sidebar">
<!-- <header>my app</header> -->
<ul>
    <li><a href=""  class="sidebar-bottom" > Dashboard </a></li>
    <!-- <a href="#" class="accordion"> Dashboard </a></li>
    <div class="panel">
        <p style="color: black;">Lorem ipsum.</p>
    </div>       -->
    <li><a href="{{ route('blog.index')}}"><i class='fab fa-adn'></i> Blogs Table </a></li>
    <li><a href="{{ route('category.view')}}"><i class='fab fa-adn'></i> Category Table </a></li>
    <li><a href="{{ route('category.view')}}"><i class='fab fa-adn'></i> User Table </a></li>
</ul>

</section>