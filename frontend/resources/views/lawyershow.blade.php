{{-- Lawyer Dashboard Template--}}
@extends('layout.master2')

@section('dynblock')
    <!--Navigation Bar-->
    <nav>
        @include('layout.nav')
    </nav>

  <!-- Lawyer Show start -->
<div class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img class= "img-fluid full" src="{{asset('asset/images/blank_canvas.png')}}" alt="lawyer image" style="object-fit: maintain;">
            </div>
            <div class="col-md-6">
            <h1 class="laywer_text">▎{{$lawyer->first_name}} {{ $lawyer->last_name }}</h1>
                <p class="lorem_text">
                    {{ $lawyer->accomplishment }}
                </p>
            </div>
            <div class="col-md-3">
                <h2>▎Education</h2>
                <ul>
                    <li>{{$lawyer->education}}</li><br>
                </ul>
                <h2>▎Language</h2>
                <ul>
                    <li>{{ $lawyer->language }}</li>
                </ul>
                <br>
                <h2>▎Practice Area</h2>
                <ul>
                    <li>{{ $lawyer->Field }}</li>
                    <li>{{ $lawyer->Field2 }}</li>
                </ul>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-md-4">
                <h2 class="lawyer_text">Contact Details</h2>
                <ul>
                    <li>Phone: {{ $lawyer->phone_number }}</li>
                    <li>Email: {{ $lawyer->email }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
  <!-- Lawyer show section end -->

@stop

