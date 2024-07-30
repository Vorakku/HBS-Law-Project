@extends('layout.master1')

@section('dynblock')

<!-- Register section start -->
<div class="about_section layout_padding">
    <div class="container pt-10 h-150">
      <div class="row justify-content-center align-items-center h-150">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
            <div style="text-align: center">
                <a href="/"><img class="mb-4" src="asset/images/HBSLaw-New-Logo.png" alt="" width="72" height="57"></a>
                <h1 class="h3 mb-3 fw-normal">Lawyer Registration Form</h1>
            </div>


            <form action="{{ route('registerLawyer') }}" method="post">
            @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="firstName" name="firstName" class="form-control form-control-lg" />
                      <label class="form-label" for="firstName">First Name</label>
                      <span class="text-danger">@error('firstName'){{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="lastName" name="lastName" class="form-control form-control-lg" />
                      <label class="form-label" for="lastName">Last Name</label>
                      <span class="text-danger">@error('lastName'){{$message}} @enderror</span>

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4 d-flex align-items-center">
                    <div class="form-outline datepicker w-100">
                        <label for="dob">Date of birth:</label>
                        <span class="text-danger">@error('dob'){{$message}} @enderror</span>
                        <input type="date" id="dob" name="dob">
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">

                    <h6 class="mb-2 pb-1 ">Gender: </h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male" checked/>
                        <label class="form-check-label" for="maleGender">Male</label>
                      </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Female"/>
                      <label class="form-check-label" for="femaleGender">Female</label>
                    </div>

                  </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-outline">
                            <input type="text" id="language" name="Language"class="form-control form-control-lg" />
                            <label class="form-label" for="language">Language</label>
                            <span class="text-danger">@error('Language'){{$message}} @enderror</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-outline">
                        <input type="email" name="emailAddress" id="emailAddress" class="form-control form-control-lg" />
                        <label class="form-label" for="emailAddress">Email</label>
                        <span class="text-danger">@error('emailAddress'){{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-outline">
                        <input type="tel" id="password" name="Password" class="form-control form-control-lg" />
                        <label class="form-label" for="Password">Password</label>
                        <span class="text-danger">@error('Password'){{$message}} @enderror</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <select name="field" class="custom-select form-control form-control-auto">
                            <option value="AIRCRAFT LEASING & PURCHASE">AIRCRAFT LEASING & PURCHASE</option>
                            <option value="BANKING & FINANCE">BANKING & FINANCE</option>
                            <option value="CONSTRUCTION & REAL ESTATE DEVELOPEMENT">CONSTRUCTION & REAL ESTATE DEVELOPEMENT</option>
                            <option value="CUSTOMS AND TAX">CUSTOMS AND TAX</option>
                            <option value="DISPUTE RESOLUTION AND LITIGATION">DISPUTE RESOLUTION AND LITIGATION</option>
                        </select>
                        <label class="form-label select-label">Choose your field</label>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                      <select name="field2" class="custom-select form-control form-control-auto">
                          <option value="AIRCRAFT LEASING & PURCHASE">AIRCRAFT LEASING & PURCHASE</option>
                          <option value="BANKING & FINANCE">BANKING & FINANCE</option>
                          <option value="CONSTRUCTION & REAL ESTATE DEVELOPEMENT">CONSTRUCTION & REAL ESTATE DEVELOPEMENT</option>
                          <option value="CUSTOMS AND TAX">CUSTOMS AND TAX</option>
                          <option value="DISPUTE RESOLUTION AND LITIGATION">DISPUTE RESOLUTION AND LITIGATION</option>
                      </select>
                      <label class="form-label select-label">Choose your field</label>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mb-3">
                    <div class="form-outline">
                        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control form-control-lg" />
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <span class="text-danger">@error('phoneNumber'){{$message}} @enderror</span>
                      </div>
                  </div>
                </div>


                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-outline">
                          <textarea id="education-bg" name="education" class="form-control form-control-lg" rows="4"></textarea>
                          <label class="form-label" for="education-bg">Education Background</label>
                          <span class="text-danger">@error('education'){{$message}} @enderror</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-outline">
                          <textarea id="work-accomplishment" name="accomplishment" class="form-control form-control-lg" rows="4"></textarea>
                          <label class="form-label" for="work-accomplishment">Work Accomplishment</label>
                          <span class="text-danger">@error('accomplishment'){{$message}} @enderror</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                  <input class="btn btn-primary btn-lg mr-2" type="submit" value="Submit"/>
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
