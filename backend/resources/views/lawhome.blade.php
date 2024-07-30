@extends('layout.master1')


@section('dynblock')

<nav>
        @include('layout.navlawyer')
    </nav>
<!-- search section start -->
<div class="about_section layout_padding">
    <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="search">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control" placeholder="Search Profession">
                <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- search section end -->

  <!-- banner section start -->
  <div class="banner_section layout_padding">
    <div class="container">
      <div id="my_slider" class="carousel slide" data-ride="carousel" data-interval="4000">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-6">
                <h1 class="video_text">AIRCRAFT LEASING &</h1>
                <h1 class="controller_text">PURCHASE</h1>
                <p class="banner_text">The Practice Group Aviation is responsible for, inter alia, the preparation, reviewing and execution of aircraft operating lease agreements (Wet and Dry Lease), the related conditions precedent documents and the issuance of legal opinions for various airlines in order to come to a closing on the lease of commercial aircrafts. </p>
              </div>
              <div class="col-md-6">
                <div class="image_1"><img src="asset/images/plane.jpg"></div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="row">
              <div class="col-md-6">
                <h1 class="video_text">BANKING &</h1>
                <h1 class="controller_text">FINANCE</h1>
                <p class="banner_text">Our Banking and Finance team have unparalleled knowledge of local business and regulatory environments. We offer considerable experience of a wide range of financing transactions from consumer loans and multi-million syndicated loans to specialised trade, project and acquisition finance in a wide range of industry sectors, including power and energy, infrastructure, hotel, beverages.</p>
              </div>
              <div class="col-md-6">
                <div class="image_1"><img src="asset/images/money.jpg"></div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="row">
              <div class="col-md-6">
                <h1 class="video_text">CONSTRUCTION &</h1>
                <h1 class="controller_text">REAL ESTATE</h1>
                <p class="banner_text">As real estate and construction transactions have become more increasingly sophisticated and complex, HBS Law’s Real Estate and Construction Practice Group has in-depth knowledge in the legal frameworks, market trends, local practices and other drivers affecting our client’s businesses in the sectors.</p>
              </div>
              <div class="col-md-6">
                <div class="image_1"><img src="asset/images/house.jpg"></div>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- banner section end -->

@stop
