@extends('layout.master1')

@section('dynblock')
<!-- Add the following <style> block within the <head> section -->
<style>
    .container {
        margin-top: 20px;
        text-align: center;
    }

    .form-signin {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Add shadow effect */
        border-radius: 10px; /* Add border radius */
        background-color: grey; /* Add background color */
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
    }
</style>

<!-- Register section start -->
<div class="about_section layout_padding">
    <div class="container pt-10 h-150">
        <div class="row justify-content-center align-items-center h-150">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <div style="text-align: center">
                            <a href="/"><img class="mb-4" src="asset/images/HBSLaw-New-Logo.png" alt="" width="72" height="57"></a>
                            <h1 class="h3 mb-3 fw-normal">Lawyer Edit Form</h1>
                            @if(session('fail'))
                            <div class="alert alert-danger">{{ session('fail') }}</div>
                            @endif
                        </div>

                        <form action="{{ route('update1') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $law->id }}">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="firstName" name="firstName" value="{{ $law->first_name }}" class="form-control form-control-lg" placeholder="MUSTAFA" />
                                        <label class="form-label" for="firstName">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="lastName" value="{{ $law->last_name }}" name="lastName" class="form-control form-control-lg" placeholder="KOCADAG" />
                                        <label class="form-label" for="lastName">Last Name</label>
                                    </div>
                                </div>
                            </div>

                <div class="row">
                  <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" id="dob" name="dob" value="{{ $law->date_of_birth }}" class="form-control">
                        </div>
                  </div>
                  <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select id="gender" name="gender" class="form-control">
                                <option value="Male" {{ $law->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $law->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-outline">
                            <input type="text" value="{{ $law->language }}" id="language" name="Language"class="form-control form-control-lg" />
                            <label class="form-label" for="language">Language</label>
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-outline">
                        <input type="email" id="emailAddress" class="form-control form-control-lg" placeholder="mustafa.kocadag@hbslaw.asia"/>
                        <label class="form-label" for="emailAddress">Email</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-outline">
                        <input type="tel" id="password" class="form-control form-control-lg" placeholder="mustafakocadag123"/>
                        <label class="form-label" for="Password">Password</label>
                        </div>
                    </div>
                </div> -->

                <div class="row">
                    <!-- <div class="form-group col-md-6 mb-3">
                        <select class="custom-select form-control form-control-auto">
                            <option value="1" selected disabled>Choose...</option>
                            <option value="2" selected>AIRCRAFT LEASING & PURCHASE</option>
                            <option value="3">BANKING & FINANCE</option>
                            <option value="4">CAPITAL MARKET AND M&A</option>
                            <option value="5">CONSTRUCTION & REAL ESTATE DEVELOPEMENT</option>
                            <option value="6">CUSTOMS AND TAX</option>
                            <option value="7">DISPUTE RESOLUTION AND LITIGATION</option>
                            <option value="8">ENERGY, INFASTRUCTURE & MINING</option>
                            <option value="9">FOREIGN DESKS</option>
                            <option value="10">GAMING, HOSPITALITY & TOURISM</option>
                            <option value="11">GENERAL CORPORATE & INTVESTMENT</option>
                            <option value="12">INSURANCE AND TRUST</option>
                            <option value="13">INTELLETUAL PROPERTY RIGHTS</option>
                        </select>
                        <label class="form-label select-label">Choose your field</label>
                    </div> -->

                    <div class="col-md-6 mb-3">
                        <div class="form-outline">
                            <input type="text" id="phoneNumber" value="{{ $law->phone_number }}" name="phoneNumber" class="form-control form-control-lg" placeholder="085 555 777"/>
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                          </div>
                      </div>
                </div>

                <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-outline">
                                        <textarea id="education-bg" name="education" class="form-control form-control-lg" rows="4" placeholder="Education Background">{{ $law->education }}</textarea>
                                        <label class="form-label" for="education-bg">Education Background</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-outline">
                                        <textarea id="work-accomplishment" name="accomplishment" class="form-control form-control-lg" rows="4" placeholder="Work Accomplishment">{{ $law->accomplishment }}</textarea>
                                        <label class="form-label" for="work-accomplishment">Work Accomplishment</label>
                                    </div>
                                </div>
                            </div>

                <div class="d-flex justify-content-center">
                                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
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
