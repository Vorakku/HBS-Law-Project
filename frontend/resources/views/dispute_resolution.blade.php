@extends('layout.master')


@section('dynblock')

<div class="row">
    <img src="asset/images/Dispute-Resolution.jpg" alt="" class="img-fluid full"  style="object-fit: cover;">
</div>

<div class="about_section layout_padding3">
    <div class="container">
        <div class="row">
            <h1 class="about_text">▎DISPUTE RESOLUTION AND LITIGATION</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="lorem_text">
                    HBS handles complex commercial dispute resolution scenarios and is able to provide legal and strategic advice through all stages of the process. We also provide advice and legal representation in the civil and criminal courts, relating to a wide variety of disputes, and have represented clients in both domestic and international arbitration, as well as other forms of alternative dispute resolution.</p>
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

