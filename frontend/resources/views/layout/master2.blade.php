<!--MASTER2 is for SIGN UP AND REGISTER PAGE-->
<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.header')
</head>
  <body>
    <!-- Navbar section start -->

    <!-- Navbar section end -->

      <!-- Block Dynamic -->

      @yield('dynblock')

      <!-- Block Dynamic End -->

      <!-- footer section start -->
      <footer>
        @include('layout.footer')
       </footer>
      <!-- footer section end -->
      <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
