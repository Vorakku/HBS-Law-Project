{{-- Nav Bar for Client and Lawyer when log in --}}
<div class="header_section">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="text-align: center">
        <div class="logo" style="margin-right: 40px;"><a href="/"><img src="asset/images/HBSLaw-New-Logo.png"></a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/uhome">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/uabout">ABOUT US</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    OUR EXPERTISE
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('aircraft-leasing') }}">AIRCRAFT LEASING & PURCHASE</a>
                  <a class="dropdown-item" href="{{ route('banking-finance') }}">BANKING & FINANCE</a>
                  <a class="dropdown-item" href="{{ route('construction-realestate') }}">CONSTRUCTION & REAL ESTATE DEVELOPEMENT</a>
                  <a class="dropdown-item" href="{{ route('custom-tax') }}">CUSTOMS AND TAX</a>
                  <a class="dropdown-item" href="{{ route('dispute-resolution') }}">DISPUTE RESOLUTION AND LITIGATION</a>
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/uannoucement">ANNOUNCEMENT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/ucontact">CONTACT US</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i><img src="asset/images/icon.png" alt="" width="40" height="40"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="/profile">Profile</a>
                </div>
            </li>
          </ul>
          <!-- jQuery library -->
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

          <!-- Bootstrap JavaScript -->
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </div>
    </nav>
</div>
