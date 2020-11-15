
<!DOCTYPE html>
<html>
<head>
    @include('admin2.layout.header')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
    @include('admin2.layout.sidebar')


    @yield('content')



    @include('admin2.layout.footer')
</body>
</html>
