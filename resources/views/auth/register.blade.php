@extends('web.layouts.app')

@section('content')
<style>
    .invalid-feedback{
        display: block;
    }
    </style>
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
                        <div class="section-heading">
                            <h2 class="sec__title mb-0">Sign Up</h2>
                        </div><!-- end section-heading -->
                        <ul class="list-items d-flex align-items-center">
                            <li class="active__list-item"><a href="index.html">Home</a></li>
                            <li class="active__list-item">Pages</li>
                            <li>Sign Up</li>
                        </ul>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->


<!-- ================================
       START FORM AREA
================================= -->
<section class="form-shared padding-top-100px padding-bottom-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="user-action-form">
                    {{-- <div class="tab-shared tab-shared-3">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link theme-btn active" id="login-tab" data-toggle="tab" href="#login-nav" role="tab" aria-controls="login-nav" aria-selected="true">
                                    <i class="la la-sign-in"></i> Employer
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link theme-btn" id="signup-tab" data-toggle="tab" href="#signup-nav" role="tab" aria-controls="signup-nav" aria-selected="false">
                                    <i class="la la-user"></i> Care Giver
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login-nav" role="tabpanel" aria-labelledby="login-tab">
                            <div class="billing-form-item mb-0">
                                <div class="billing-title-wrap border-bottom-0 text-center">
                                    <h3 class="widget-title font-size-28 pb-2">Create Your Account!</h3>
                                    <p>Create an account to create jobs or get job done
                                        <br> your resume and apply to multiple jobs in seconds! <br>
                                        <strong class="color-text-2 font-weight-medium">Already have an account? <a href="login.html" class="color-text">Sign In</a></strong>
                                    </p>
                                </div><!-- billing-title-wrap -->
                                <div class="billing-content">
                                    <div class="contact-form-action">                                        
                                        <form  method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-4 column-td-6">
                                                    <div class="form-group">
                                                        <button class="theme-btn bg-7 border-0 w-100" type="submit">
                                                            <i class="fa fa-google mr-2"></i> Google
                                                        </button>
                                                    </div>
                                                </div><!-- end col-lg-4 -->
                                                <div class="col-lg-4 column-td-6">
                                                    <div class="form-group">
                                                        <button class="theme-btn bg-5 border-0 w-100" type="submit">
                                                            <i class="fa fa-facebook-f mr-2"></i> Facebook
                                                        </button>
                                                    </div>
                                                </div><!-- end col-lg-4 -->
                                                <div class="col-lg-4 column-td-6">
                                                    <div class="form-group">
                                                        <button class="theme-btn bg-6 border-0 w-100" type="submit">
                                                            <i class="fa fa-twitter mr-2"></i> Twitter
                                                        </button>
                                                    </div>
                                                </div><!-- end col-lg-4 -->
                                                <div class="col-lg-12">
                                                    <div class="account-assist mt-4 mb-4 text-center">
                                                        <p class="account__desc">or</p>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                            </div><!-- end row -->
                                            <div class="input-box">
                                                <label class="label-text">First name</label>
                                                <div class="form-group">
                                                    <i class="la la-user form-icon"></i>
                                                    <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First name">
                                                    @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div><!-- input-box -->
                                            <div class="input-box">
                                                <label class="label-text">Last name</label>
                                                <div class="form-group">
                                                    <i class="la la-user form-icon"></i>
                                                    <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last name">
                                                    @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div><!-- input-box -->
                                            <div class="input-box">
                                                <label class="label-text">Email</label>
                                                <div class="form-group">
                                                    <i class="la la-envelope-o form-icon"></i>
                                                    <input class="form-control @error('email') is-invalid @enderror" type="email"  name="email" value="{{ old('email') }}" placeholder="Enter email address">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div><!-- input-box -->
                                            <div class="input-box">
                                                <label class="label-text">Password</label>
                                                <div class="form-group">
                                                    <i class="la la-lock form-icon"></i>
                                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">                
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <span class="mt-1">Must use 8-15 characters and one number or symbol.</span>
                                                </div>
                                            </div><!-- input-box -->
                                            <div class="input-box">
                                                <label class="label-text">Confirm Password</label>
                                                <div class="form-group">
                                                    <i class="la la-lock form-icon"></i>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                                </div>
                                            </div><!-- input-box -->
                                            <div class="input-box">
                                                <label class="label-text">Registering as?</label>
                                                <div class="form-group">
                                                    <div class="job-alert">
                                                        <div class="radio-option d-inline-block mr-4">
                                                            <label for="radio-1" class="radio-trigger font-weight-medium mb-3">
                                                                <input type="radio" id="radio-1" value="1" name="type" {{ old('type') == '1' ? 'checked' : '' }}>
                                                                <span class="checkmark"></span>
                                                                <span class="color-text-3">employer</span>
                                                            </label>
                                                        </div>
                                                        <div class="radio-option d-inline-block">
                                                            <label for="radio-2" class="radio-trigger font-weight-medium mb-3">
                                                                <input type="radio" id="radio-2" value="2" name="type" {{ old('type') == '2' ? 'checked' : '' }}>
                                                                <span class="checkmark"></span>
                                                                <span class="color-text-3">Care Giver</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @error('type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div><!-- input-box -->
                                            {{-- <div class="input-box">
                                                <label class="label-text">Email me career-related Zobstar updates and job opportunities</label>
                                                <div class="form-group">
                                                    <div class="job-alert">
                                                        <div class="radio-option d-inline-block mr-4">
                                                            <label for="radio-1" class="radio-trigger font-weight-medium mb-3">
                                                                <input type="radio" id="radio-1" name="radio" checked="">
                                                                <span class="checkmark"></span>
                                                                <span class="color-text-3">Yes</span>
                                                            </label>
                                                        </div>
                                                        <div class="radio-option d-inline-block">
                                                            <label for="radio-2" class="radio-trigger font-weight-medium mb-3">
                                                                <input type="radio" id="radio-2" name="radio">
                                                                <span class="checkmark"></span>
                                                                <span class="color-text-3">No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <span class="font-size-15">Zobstar will automatically email job postings that are relevant to you. You can unsubscribe on the Manage Saved Searches page or with the opt-out link in the email.</span>
                                                </div>
                                            </div><!-- input-box --> --}}
                                            <div class="input-box">
                                                <div class="form-group">
                                                    <div class="custom-checkbox d-block mr-0">
                                                        <input type="checkbox" id="chb3" name="policy" {{ old('policy') ? 'checked' : '' }}>
                                                        <label for="chb3">I Agree to Zobstar's <a href="#" class="color-text">Privacy Policy</a></label>
                                                        @error('policy')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div><!-- end custom-checkbox -->
                                                    <div class="custom-checkbox d-block mr-0">
                                                        <input type="checkbox" id="chb4" name="terms" {{ old('terms') ? 'checked' : '' }}>
                                                        <label for="chb4">I Agree to Zobstar's <a href="#" class="color-text">Terms of Services</a></label>
                                                        @error('terms')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div><!-- end custom-checkbox -->
                                                </div>
                                            </div><!-- input-box -->
                                            <div class="btn-box margin-top-30px">
                                                <button class="theme-btn border-0" type="submit">Create Account</button>
                                            </div>                                            
                                            <div class="col-lg-12">
                                                <p>Already have an account? <a href="{{ url('login') }}" class="color-text"> Login Here</a></p>
                                            </div><!-- end col-lg-12 -->
                                        </form>
                                    </div><!-- end contact-form-action -->
                                </div><!-- end billing-content -->
                            </div><!-- end billing-form-item -->
                        </div><!-- end tab-pane -->
                    </div><!-- end tab-content -->
                </div>
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end form-shared -->
<!-- ================================
       START FORM AREA
================================= -->
@endsection
