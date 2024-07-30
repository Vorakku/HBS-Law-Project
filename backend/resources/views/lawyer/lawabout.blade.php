@extends('layout.master1')

@section('dynblock')
<nav>
        @include('layout.navlawyer')
    </nav>
  <!-- about section start -->
 <div class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <h1 class="about_text">▎ABOUT US</h1>
        </div>
      <div class="row">
        <div class="col-md-8">
          <p class="lorem_text">
            HBS Law has been established since 2005 and is a highly regarded multi-service law firm. We work with a broad client base, which includes major international and Asian companies. Our firm has a solid team of 50 experts to assist foreign and local clients in a wide range of sectors. Furthermore, we also work with education institutions, international organizations, government agencies, and senior government leaders.</p>
          <p class="lorem_text">Our philosophy of developing relationships with our clients based on trust and honesty is of utmost importance.</p>
          <p class="lorem_text">HBS Law is proud of its role as a corporate citizen. We have provided pro bono services for people who cannot afford legal services. We provide a learning forum for law graduates, junior lawyers, judicial officers and law enforcement officers throughout the country.</p>
          <p class="lorem_text">We look forward to welcoming new clients to benefit from the services of our resourceful, responsive and relationship-centric professional team. Our team is prepared to work closely with you towards your objectives.</p>
          <h4><a href="https://www.facebook.com/watch/?v=843545660145378">Click here to watch a video about HBS law</a></h4>
        </div>
          <div class="col-md-4">
            <h2>Our Expertise</h2>
            <ul>
                <li><a href="/expertise1">○ AIRCRAFT LEASING & PURCHASE</a></li>
                <li><a href="#">○ BANKING & FINANCE</a></li>
                <li><a href="#">○ CAPITAL MARKET AND M&A</a></li>
                <li><a href="#">○ CONSTRUCTION & REAL ESTATE DEVELOPEMENT</a></li>
                <li><a href="#">○ CUSTOMS AND TAX</a></li>
                <li><a href="#">○ DISPUTE RESOLUTION AND LITIGATION</a></li>
                <li><a href="#">○ ENERGY, INFASTRUCTURE & MINING</a></li>
                <li><a href="#">○ FOREIGN DESKS</a></li>
                <li><a href="#">○ GAMING, HOSPITALITY & TOURISM</a></li>
                <li><a href="#">○ GENERAL CORPORATE & INTVESTMENT</a></li>
                <li><a href="#">○ INSURANCE AND TRUST</a></li>
                <li><a href="#">○ INTELLETUAL PROPERTY RIGHTS</a></li>
                {{-- <li><a href="#">○ LABOR AND INDUSTRIAL RELATIONS</a></li>
                <li><a href="#">○ TELECOMMUNICATION AND TECHNOLOGY</a></li> --}}
            </ul>
          </div>
      </div>
    </div>
  </div>
  <!-- about section end -->

@stop
