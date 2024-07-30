@extends('layout.master')


@section('dynblock')
<div class="about_section layout_padding">
    <ul class="search-results">
    @foreach ($lawyers as $lawyer)
        <li>
                <a href="{{ route('lawyershow', ['id' => $lawyer->id]) }}" title="Show Lawyer">
                <h1>{{ $lawyer->first_name }} {{ $lawyer->last_name }}</h1>
                {{-- <h2><b>Date of Birth:</b> <span>{{ $lawyer->date_of_birth }}</span></h2> --}}
                <h2><b>Gender:</b> <span>{{ $lawyer->gender }}</span></h2>
                <h2><b>Practice Area(s):</b> <span>{{ $lawyer->Field }}</span></h2>
                <h2><b></b> <span>{{ $lawyer->Field2 }}</span></h2>
                <h2><b>Phone Number:</b> <span>{{ $lawyer->phone_number }}</span></h2>
                <h2><b>Email Address:</b> <span>{{ $lawyer->email }}</span></h2>
                {{-- <h2><b>Education:</b> <span>{{ $lawyer->education }}</span></h2>
                <h2><b>Accomplishment:</b><span>{{ $lawyer->accomplishment }}</span></h2> --}}
                <h2><b>Language:</b><span>{{ $lawyer->language }}</span></h2>
            </a>
        </li>
    @endforeach
    </ul>
</div>
@stop
