@extends('layout.master')


@section('dynblock')

<div class="row">
    <img src="asset/images/1Aircraft-Banner.jpg" alt="" class="img-fluid full"  style="object-fit: cover;">
</div>

<div class="about_section layout_padding3">
    <div class="container">
        <div class="row">
            <h1 class="about_text">▎DISPUTE RESOLUTION AND LITIGATION</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="lorem_text">
                The Practg and execution of aircraft operating lease agreements (Wet and Dry Lease), the related conditions precedent documents and the issuance of legal opinions for various airlines in order to come to a closing on the lease of commercial aircrafts. Further, we liaise with legal counsels of lessors/lessees and the local aviation authority (SSCA) and provide legal advisory services relating to the local laws and regulations applicable to the aviation sector.</p>
            </div>
        </div>

        <div class="row">
        @foreach($lawyers as $lawyer)
            <div class="col-6 col-sm-6">
                <div class="card h-150">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <a href="{{ route('lawyershow', ['id' => $lawyer->id]) }}"><img class="card-img-top" src="asset/images/Mustafa-Koca.jpg" alt="lawyer image" style="object-fit: cover;"></a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <a href="{{ route('lawyershow', ['id' => $lawyer->id]) }}"><h5 class="laywer_text">▎{{$lawyer->first_name}} {{$lawyer->last_name}}</h5></a>
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

