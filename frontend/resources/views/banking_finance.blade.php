@extends('layout.master')


@section('dynblock')

<div class="row">
    <img src="asset/images/banking.jpg" alt="" class="img-fluid full"  style="object-fit: cover;">
</div>

<div class="about_section layout_padding3">
    <div class="container">
        <div class="row">
            <h1 class="about_text">▎BANKING & FINANCE</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="lorem_text">
                    Our Banking and Finance team have unparalleled knowledge of local business and regulatory environments. We offer considerable experience of a wide range of financing transactions from consumer loans and multi-million syndicated loans to specialised trade, project and acquisition finance in a wide range of industry sectors, including power and energy, infrastructure, hotel, beverages.</p>
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

