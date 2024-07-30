@extends('layout.master1')

@section('dynblock')

<!-- Register section start -->
<div class="about_section layout_padding">
    <div class="container pt-5 h-150">
      <div class="row justify-content-center align-items-center h-150">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
            <div style="text-align: center">
                <a href="/"><img class="mb-4" src="asset/images/HBSLaw-New-Logo.png" alt="" width="72" height="57"></a>
                <h1 class="h3 mb-3 fw-normal">Lawyer Sign In Form</h1>
            </div>
              <form action="{{ route('loginLawyer') }}" method="post">
              @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
              @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <!--Email-->
                <div class="form-floating">
                    <input type="email" name="emailAddress" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                    <span class="text-danger">@error('emailAddress'){{$message}} @enderror</span>
                </div>
                <!--Password-->
                <div class="form-floating">
                    <input type="password" name="Password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <span class="text-danger">@error('Password'){{$message}} @enderror</span>
                </div>
                <!--Remeber me Checkbox-->
                {{-- <div class="checkbox mb-3">
                    <label>
                    <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div> --}}

                <div class="d-flex justify-content-center">
                  <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
                <br>
                <div class="d-flex justify-content-center">
                <a class="btn btn-link" href="/register_lawyer">
                  Register as lawyer
                </a>
                <a class="btn btn-link" href="/signin">
                    Sign in as Client
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Register section end -->

@stop
