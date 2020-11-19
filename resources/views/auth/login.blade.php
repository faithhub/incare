@extends('web.layouts.app')

@section('content')
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
                            <h2 class="sec__title mb-0">Login</h2>
                        </div><!-- end section-heading -->
                        <ul class="list-items d-flex align-items-center">
                            <li class="active__list-item"><a href="index.html">Home</a></li>
                            <li class="active__list-item">Pages</li>
                            <li>Login</li>
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
                                    <i class="la la-sign-in"></i> Login to Account
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link theme-btn" id="signup-tab" data-toggle="tab" href="#signup-nav" role="tab" aria-controls="signup-nav" aria-selected="false">
                                    <i class="la la-user"></i> Register Account
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login-nav" role="tabpanel" aria-labelledby="login-tab">
                            <div class="billing-form-item mb-0">
                                <div class="billing-title-wrap border-bottom-0 text-center">
                                    <h3 class="widget-title font-size-28 pb-2">Login to Your Account</h3>
                                    <p>with your social network, Note: Zobstar will never <br> post content to your social pages.</p>
                                </div><!-- billing-title-wrap -->
                                <div class="billing-content">
                                    <div class="contact-form-action">
                                        <form method="POST" action="{{ route('login') }}">
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
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <label class="label-text">Email Address</label>
                                                        <div class="form-group">
                                                            <i class="la la-user form-icon"></i>
                                                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Your email address">
                                                            @error('email')
                                                                <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <label class="label-text">Password</label>
                                                        <div class="form-group">
                                                            <i class="la la-lock form-icon"></i>
                                                            <input class="form-control @error('password') is-invalid @enderror" type="password"name="password" autocomplete="current-password" placeholder="Your password">
                                                            @error('password')
                                                                <span class="mb-2 invalid-feedback" role="alert" style="display: block">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <div class="custom-checkbox mr-0 d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                <label for="chb1">Keep me logged in</label>
                                                            </div>
                                                            
                                                            @if (Route::has('password.request'))
                                                                <div>
                                                                    <a href="{{ route('password.request') }}" class="color-text">Forgot password?</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12">
                                                    <div class="btn-box margin-top-20px margin-bottom-10px">
                                                        <button class="theme-btn border-0" type="submit">Login Account</button>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12">
                                                    <p>Don't have an account? <a href="{{ url('register') }}" class="color-text"> Create Account</a></p>
                                                </div><!-- end col-lg-12 -->
                                            </div><!-- end row -->
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
