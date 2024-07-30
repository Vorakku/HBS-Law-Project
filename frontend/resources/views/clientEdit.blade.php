@extends('layout.master1')

@section('dynblock')
<style>
    body{
        background-color: #f2f7fd;
    }
    .container {
        margin-top: 20px;
        text-align: center;
    }

    .about_text{
    width: 100%;
    float: right;
    font-size: 38px;
    color: #2d343e;
    font-weight: 600;
    /* text-transform: uppercase; */
    /* text-align: middle; */
    display: flex;
    justify-content: center;
    }

    .form-signin {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        background-color: #f8f9fa;
        max-width: 400px;
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

    .btn-primary {
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }
</style>

<div class="container">
    <h1 class="about_text">Edit Your Profile</h1>

    @if(session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif

    <div class="form-signin">
        <form action="{{ route('update') }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $user->id }}">

            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" value="{{ $user->first_name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" value="{{ $user->last_name }}" class="form-control">
            </div>

            <!-- <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="{{ $user->date_of_birth }}" class="form-control">
            </div> -->

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <!-- Add more form fields for other user attributes -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@stop
