@extends('layout.master1')

@section('dynblock')
    <nav>
        @include('layout.navlawyer')
    </nav>

  <!-- about section start -->
<div class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img class= "img-fluid full" src="asset/images/Mustafa-Koca.jpg" alt="lawyer image" style="object-fit: cover;">
            </div>
            <div class="col-md-6">
            <h1 class="laywer_text">▎{{$lawyer->first_name}} {{ $lawyer->last_name }}</h1>
                <p class="lorem_text">{{ $lawyer->accomplishment }}</p>
            </div>
            <div class="col-md-3">
                <h2>▎Education</h2>
                <ul>
                    <li>{{$lawyer->education}}</li><br>
                </ul>
                <br>
                <h2>▎Language</h2>
                <ul>
                    <li>{{ $lawyer->language }}</li>
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
  <!-- about section end -->

@stop
