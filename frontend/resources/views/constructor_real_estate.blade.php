@extends('layout.master')


@section('dynblock')

<div class="row">
    <img src="asset/images/Construction-Banner.jpg" alt="" class="img-fluid full"  style="object-fit: cover;">
</div>

<div class="about_section layout_padding3">
    <div class="container">
        <div class="row">
            <h1 class="about_text">▎CONSTRUCTION & REAL ESTATE DEVELOPEMENT</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="lorem_text">
                    Cambodia’s economy has constantly achieved a steady and prosperous growth of around 7% per annum in the last five years. The growth has been primarily driven by a rapid surge in Foreign Direct Investments, among others, in real estate and construction developments.</p>
                <p class="lorem_text">As real estate and construction transactions have become more increasingly sophisticated and complex, HBS Law’s Real Estate and Construction Practice Group has in-depth knowledge in the legal frameworks, market trends, local practices and other drivers affecting our client’s businesses in the sectors.</p>
            </div>
        </div>

        <div class="row">
            @foreach($lawyers as $lawyer)
            <div class="col-6 col-sm-6">
                <div class="card h-100 d-flex">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <a href="{{ route('lawyershow', ['id' => $lawyer->id]) }}" title="Show Lawyer">
                                <img class="card-img-top img-fluid" src="asset/images/blank_canvas.png" alt="lawyer image">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <a href="{{ route('lawyershow', ['id' => $lawyer->id]) }}">
                                    <h5 class="laywer_text">▎{{$lawyer->first_name}} {{$lawyer->last_name}}</h5>
                                </a>
                                <p class="lorem_text">{{ $lawyer->accomplishment }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
  <!-- about section end -->
@stop

