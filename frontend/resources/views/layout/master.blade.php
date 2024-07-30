<!--MASTER is for all mains PAGE-->
<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.header')
</head>
<body>
	@php
  echo "ServerName:".gethostname()."<br>";
  echo "Server IP:".$_SERVER['SERVER_ADDR']
  @endphp 
  <!-- Navbar section start -->
    <nav>
        @include('layout.nav')
    </nav>
	<!-- Navbar section end -->

    <!-- Block Dynamic -->
    @yield('dynblock')
    <!-- Block Dynamic End -->

   <!-- footer section start -->
   <footer>
    @include('layout.footer')
   </footer>
  <!-- footer section end -->

</body>
</html>
