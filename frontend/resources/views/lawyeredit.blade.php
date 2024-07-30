@extends('layout.master1')

@section('dynblock')
<!-- Add the following <style> block within the <head> section -->
    <style>
        body {
            background-color: #f2f7fd;
        }

        .container {
            margin-top: 20px;
            text-align: center;
        }

        .about_text{
        width: 100%;
        font-size: 38px;
        color: #2d343e;
        font-weight: 600;
        /* text-transform: uppercase; */
        text-align: center;
        }

        .form-signin {
            display: center;
            flex-direction: column;
            align-items: center;
            padding: 40px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #f8f9fa;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .textarea-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: vertical;
        }

        .btn-primary {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            float: center;
        }

    </style>

    <h1 class="about_text">Lawyer Edit Form</h1>
    @if(session('fail'))
    <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif


    <form action="{{ route('update1') }}" method="POST" class="form-signin">
        @csrf
        <input type="hidden" name="id" value="{{ $law->id }}">

        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="{{ $law->first_name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="lastName" value="{{ $law->last_name }}" name="lastName" class="form-control">
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="{{ $law->date_of_birth }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" class="form-control">
                <option value="Male" {{ $law->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $law->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="language">Language:</label>
            <input type="text" value="{{ $law->language }}" id="language" name="Language" class="form-control">
        </div>

        <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" id="phoneNumber" value="{{ $law->phone_number }}" name="phoneNumber" class="form-control">
        </div>

        <div class="form-group">
            <label for="education">Education:</label>
            <textarea id="education-bg" name="education" class="textarea-control" rows="6">{{ $law->education }}</textarea>
        </div>

        <div class="form-group">
            <label for="accomplishment">Work Accomplishment:</label>
            <textarea id="work-accomplishment" name="accomplishment" class="textarea-control" rows="6">{{ $law->accomplishment }}</textarea>
        </div>

        <div>
            <button type="submit" class="btn btn-primary" value="submit">Update</button>
        </div>


    </form>


<!-- Register section end -->
@stop
