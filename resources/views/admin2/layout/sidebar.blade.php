 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
         <a href="{{ route('index.index') }}" class="nav-link">Home</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <div class="dropdown">
          <button style="color: rgba(0,0,0,.5)" class="btn btn-link  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Employuser
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('UserPost.edit',Auth::user()->id) }}"><i class='far fa-address-book'></i> Information</a>
            <a class="dropdown-item" href="{{ route('UserPost.index') }}" ><i class='fas fa-book'></i> Your brother</a>
            <a class="dropdown-item" href="{{ route('logout')}}"> Exits</a>
          </div>
        </div>
      </li>
  </ul>

  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->image }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard Amin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>



          {{-- @if(  $role_user->role_id = "1" ) --}}
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('UserPost.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Post</p>
                    <i class='fas fa-baby'></i>
                  </a>
                </li>
            </ul>
          {{-- @else --}}
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('blog.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blogs</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('category.view')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.view')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('role_user.view')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Decentralization</p>
                    </a>
                  </li>
            </ul>
          {{-- @endif --}}
        </li>



  </aside>
