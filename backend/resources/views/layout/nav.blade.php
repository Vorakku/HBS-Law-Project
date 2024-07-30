{{-- Default Navbar --}}
<div class="header_section">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="text-align: center;" >
        <div class="logo" style="margin-right: 37px;"><a href="/"><img src="asset/images/HBSLaw-New-Logo.png"></a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">ABOUT US</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    OUR EXPERTISE
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('aircraft-leasing') }}">AIRCRAFT LEASING & PURCHASE</a>
                  <a class="dropdown-item" href="{{ route('banking-finance') }}">BANKING & FINANCE</a>
                  <a class="dropdown-item" href="{{ route('construction-realestate') }}">CONSTRUCTION & REAL ESTATE DEVELOPMENT</a>
                  <a class="dropdown-item" href="{{ route('custom-tax') }}">CUSTOMS AND TAX</a>
                  <a class="dropdown-item" href="{{ route('dispute-resolution') }}">DISPUTE RESOLUTION AND LITIGATION</a>
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/annoucement">ANNOUCEMENT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">CONTACT US</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sign In
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/signin">Sign in as Client</a>
                  <a class="dropdown-item" href="/signinLawyer">Sign in as Lawyer</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Register
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/register_client">Register as Client</a>
                  <a class="dropdown-item" href="/register_lawyer">Register as Lawyer</a>
                </div>
            </li>
          </ul>
        </div>
    </nav>
</div>
