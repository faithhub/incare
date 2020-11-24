@extends('web.layouts.app')
@section('content')   

<!-- ================================post
    START HERO-WRAPPER AREA
================================= -->
<section class="hero-wrapper">
    <div class="hero-overlay"></div><!-- end hero-overlay -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-content-wrapper position-relative">
                    <div class="hero-heading text-center">
                        <div class="section-heading">
                            <h2 class="sec__title line-height-65">
                                The #1 Job Board for Hiring Trusted <br> Professional Caregivers
                            </h2>
                            <p class="sec__desc line-height-30 font-weight-medium color-white-rgba">
                                Each month, more than 3 million job seekers turn to website in their search for work, <br>
                                making over 140,000 applications every single day
                            </p>
                        </div>
                        <div class="btn-box margin-top-35px">
                            <a href="{{ url('jobs') }}" class="theme-btn mr-2">Find a Job</a>
                            <a href="{{ url('employer/post-new-job') }}" class="theme-btn bg-3">Post a Job</a>
                        </div>
                    </div><!-- end hero-heading -->
                    <div class="hero-form-wrap position-absolute">
                        <form method="POST" action="{{ url('search-job') }}">
                          @csrf               
                            <div class="main-search-input">
                                <div class="main-search-input-item">
                                    <div class="contact-form-action">
                                        <div class="form-group mb-0">
                                            <span class="la la-search form-icon"></span>
                                            <input class="form-control" type="text" name="job_title" placeholder="Job title, keywords">
                                        </div>
                                    </div>
                                </div><!-- end main-search-input-item -->
                                <div class="main-search-input-item category">
                                    <select class="category-option-field">
                                        <option value >Select Job Category</option>
                                        @foreach ($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>                    
                                        @endforeach
                                    </select>
                                </div><!-- end main-search-input-item -->
                                <div class="main-search-input-item location">
                                    <div class="main-search-input-item">
                                        <div class="contact-form-action">
                                            <div class="form-group mb-0">
                                                <span class="la la-map form-icon"></span>
                                                <input class="form-control" type="text" id="autocomplete" onFocus="geolocate()" name="address" placeholder="Lagos, Nigeria">
                                            </div>
                                        </div>
                                    </div><!-- end main-search-input-item -->
                                </div><!-- end main-search-input-item -->
                                <div class="main-search-input-btn">
                                    <button class="button theme-btn border-0 line-height-56" type="submit">Search Jobs</button>
                                </div><!-- end main-search-input-btn -->
                            </div><!-- end main-search-input -->
                        </form>
                    </div><!-- end hero-form-wrap -->
                </div><!-- end hero-content-wrapper -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hero-wrapper -->
<!-- ================================
    END HERO-WRAPPER AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START CAT AREA
================================= -->
<section class="cat-area padding-top-100px padding-bottom-110px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title">Find Jobs by Categories</h2>
                    <p class="sec__desc">
                        Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit <br>
                        facere possimus, omnis voluptas assumenda est, omnis
                    </p>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row mt-5 justify-content-center">
            @if (isset($cats) && $cats != null)
                @foreach ($cats as $cat)            
                    <div class="col-lg-3 column-td-6">
                        <div class="category-item">
                            <a href="{{ url('jobs') }}" class="cat-fig-box d-block p-4">
                                <div class="icon-element mb-3">
                                    <i class="la la la-line-chart"></i>
                                </div>
                                <div class="cat-content">
                                    <h4 class="cat__title mb-2">{{$cat->name}}</h4>
                                    {{-- <span class="font-weight-medium">(3040)</span> --}}
                                </div>
                            </a>
                        </div><!-- end category-item -->
                    </div><!-- end col-lg-3 -->                    
                @endforeach                
            @else
            <h2 class="sec__title">No Category available yet</h2>
            @endif
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-box text-center mt-4">
                    <a href="{{ url('jobs') }}" class="theme-btn">View all jobs</a>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cat-area -->
<!-- ================================
    END CAT AREA
================================= -->

<!-- ================================
    START HIW AREA
================================= -->
<section class="hiw-area text-center section-bg padding-top-100px padding-bottom-85px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title">How Zobstar Works for You?</h2>
                    <p class="sec__desc">
                        Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit <br>
                        facere possimus, omnis voluptas assumenda est, omnis
                    </p>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row mt-5">
            <div class="col-lg-4 column-td-6">
                <div class="icon-box">
                    <div class="icon-element">
                        <i class="la la-search-plus"></i>
                        <span class="info-number">1</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                       <h4 class="info__title mb-3">Find the Right Job</h4>
                        <p class="info__desc">
                            Sed quia lipsum dolor sit atur adipiscing elit is nunc quis
                            tellus sed ligula porta ultricies quis nec nec magna
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 column-td-6">
                <div class="icon-box">
                    <div class="icon-element">
                        <i class="las la-comment-dollar"></i>
                        <span class="info-number">2</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                        <h4 class="info__title mb-3">Research Companies</h4>
                        <p class="info__desc">
                            Sed quia lipsum dolor sit atur adipiscing elit is nunc quis
                            tellus sed ligula porta ultricies quis nec nec magna
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 column-td-6">
                <div class="icon-box">
                    <div class="icon-element">
                        <i class="la la-rocket"></i>
                        <span class="info-number">3</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                        <h4 class="info__title mb-3">Save & Apply</h4>
                        <p class="info__desc">
                            Sed quia lipsum dolor sit atur adipiscing elit is nunc quis
                            tellus sed ligula porta ultricies quis nec nec magna
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hiw-area -->
<!-- ================================
    END HIW AREA
================================= -->

<!-- ================================
    START FUN-FACT AREA
================================= -->
<section class="funfact-area section-bg-2 padding-top-100px padding-bottom-60px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title text-white">The Proof is in the Numbers!</h2>
                    <p class="sec__desc color-white-rgba">
                        Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit <br>
                        facere possimus, omnis voluptas assumenda est, omnis
                    </p>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row mt-5">
            <div class="col-lg-3 column-td-6">
                <div class="counter-item">
                    <div class="icon-element">
                        <i class="la la-briefcase"></i>
                    </div>
                    <div class="counter-number">
                        <span data-purecounter-duration="2.5" data-purecounter-end="19000" class="counter purecounter">0</span>
                    </div><!-- end counter-number -->
                    <div class="counter-content mt-3">
                        <p class="counter__title">Jobs Posted</p>
                    </div><!-- end counter-content -->
                </div><!-- end counter-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-td-6">
                <div class="counter-item">
                    <div class="icon-element">
                        <i class="la la-users"></i>
                    </div>
                    <div class="counter-number">
                        <span data-purecounter-duration="2.5" data-purecounter-end="8090" class="counter purecounter">0</span>
                    </div><!-- end counter-number -->
                    <div class="counter-content mt-3">
                        <p class="counter__title">Candidates</p>
                    </div><!-- end counter-content -->
                </div><!-- end counter-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-td-6">
                <div class="counter-item">
                    <div class="icon-element">
                        <i class="la la-black-tie"></i>
                    </div>
                    <div class="counter-number">
                        <span data-purecounter-duration="2.5" data-purecounter-end="15095" class="counter purecounter">0</span>
                    </div><!-- end counter-number -->
                    <div class="counter-content mt-3">
                        <p class="counter__title">Companies</p>
                    </div><!-- end counter-content -->
                </div><!-- end counter-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-td-6">
                <div class="counter-item">
                    <div class="icon-element">
                        <i class="la la-file-text-o"></i>
                    </div>
                    <div class="counter-number">
                        <span data-purecounter-duration="2.5" data-purecounter-end="2350" class="counter purecounter">0</span>
                    </div><!-- end counter-number -->
                    <div class="counter-content mt-3">
                        <p class="counter__title">Resumes</p>
                    </div><!-- end counter-content -->
                </div><!-- end counter-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end funfact-area -->
<!-- ================================
    END FUN-FACT AREA
================================= -->

<!-- ================================
       START TESTIMONIAL AREA
================================= -->
<section class="testimonial-area padding-top-100px padding-bottom-100px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title">Kind Words From Our <br> Happy Candidates</h2>
                    <p class="sec__desc">
                        Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit <br>
                        facere possimus, omnis voluptas assumenda est, omnis
                    </p>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="testimonial-carousel carousel-item-wrap">
                    <div class="testimonial-item">
                        <div class="testi-content mb-3">
                            <img src="{{ asset('web/images/small-team1.jpg') }}" class="testi__img" alt="testimonial image">
                            <h4 class="tesi__title mt-4">Richard Doe</h4>
                            <span class="testi__meta">Web Designer</span>
                        </div>
                        <div class="testi-comment">
                            <p class="testi__desc">
                                Excepteur sint occaecat cupidatat non proident sunt in culpa
                                officia deserunt mollit anim laborum sint occaecat cupidatat non
                                proident.
                            </p>
                        </div>
                    </div><!-- end testimonial-item -->
                    <div class="testimonial-item">
                        <div class="testi-content mb-3">
                            <img src="{{ asset('web/images/small-team2.jpg') }}" class="testi__img" alt="testimonial image">
                            <h4 class="tesi__title mt-4">Denwen Evil</h4>
                            <span class="testi__meta">UI/UX Designer</span>
                        </div>
                        <div class="testi-comment">
                            <p class="testi__desc">
                                Excepteur sint occaecat cupidatat non proident sunt in culpa
                                officia deserunt mollit anim laborum sint occaecat cupidatat non
                                proident.
                            </p>
                        </div>
                    </div><!-- end testimonial-item -->
                    <div class="testimonial-item">
                        <div class="testi-content mb-3">
                            <img src="{{ asset('web/images/small-team3.jpg') }}" class="testi__img" alt="testimonial image">
                            <h4 class="tesi__title mt-4">Collis Pong</h4>
                            <span class="testi__meta">Engineer</span>
                        </div>
                        <div class="testi-comment">
                            <p class="testi__desc">
                                Excepteur sint occaecat cupidatat non proident sunt in culpa
                                officia deserunt mollit anim laborum sint occaecat cupidatat non
                                proident.
                            </p>
                        </div>
                    </div><!-- end testimonial-item -->
                    <div class="testimonial-item">
                        <div class="testi-content mb-3">
                            <img src="{{ asset('web/images/small-team1.jpg') }}" class="testi__img" alt="testimonial image">
                            <h4 class="tesi__title mt-4">Richard Doe</h4>
                            <span class="testi__meta">Web Designer</span>
                        </div>
                        <div class="testi-comment">
                            <p class="testi__desc">
                                Excepteur sint occaecat cupidatat non proident sunt in culpa
                                officia deserunt mollit anim laborum sint occaecat cupidatat non
                                proident.
                            </p>
                        </div>
                    </div><!-- end testimonial-item -->
                    <div class="testimonial-item">
                        <div class="testi-content mb-3">
                            <img src="{{ asset('web/images/small-team2.jpg') }}" class="testi__img" alt="testimonial image">
                            <h4 class="tesi__title mt-4">Denwen Evil</h4>
                            <span class="testi__meta">UI/UX Designer</span>
                        </div>
                        <div class="testi-comment">
                            <p class="testi__desc">
                                Excepteur sint occaecat cupidatat non proident sunt in culpa
                                officia deserunt mollit anim laborum sint occaecat cupidatat non
                                proident.
                            </p>
                        </div>
                    </div><!-- end testimonial-item -->
                    <div class="testimonial-item">
                        <div class="testi-content mb-3">
                            <img src="{{ asset('web/images/small-team3.jpg') }}" class="testi__img" alt="testimonial image">
                            <h4 class="tesi__title mt-4">Collis Pong</h4>
                            <span class="testi__meta">Engineer</span>
                        </div>
                        <div class="testi-comment">
                            <p class="testi__desc">
                                Excepteur sint occaecat cupidatat non proident sunt in culpa
                                officia deserunt mollit anim laborum sint occaecat cupidatat non
                                proident.
                            </p>
                        </div>
                    </div><!-- end testimonial-item -->
                </div><!-- end testimonial-carousel -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end testimonial-area -->
<!-- ================================
       START TESTIMONIAL AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area section-bg column-sm-center padding-top-80px padding-bottom-80px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="section-heading">
                    <h2 class="sec__title mb-2 font-size-26 line-height-35">Incare is the Best Way to Find & Discover <br> Great Local Jobs</h2>
                    <p class="sec__desc">
                        Morbi convallis bibendum urna ut viverra. Maecenas
                    </p>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-9 -->
            <div class="col-lg-3">
                <div class="btn-box">
                    <a href="{{ url('register') }}" class="theme-btn">Join with us</a>
                </div><!-- end btn-box -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cta-area -->
<!-- ================================
    END CTA AREA
================================= -->

<!-- ================================
    START MOBILE-APP AREA
================================= -->
<section class="mobile-app-area padding-top-100px padding-bottom-110px">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="mobile-img">
                    <img src="{{ asset('web/images/mobile.png') }}" alt="mobile-img">
                </div>
            </div><!-- end col-lg-5 -->
            <div class="col-lg-6 ml-auto">
                <div class="mobile-app-content">
                    <div class="section-heading margin-bottom-30px">
                        <h2 class="sec__title">Download Our Mobile App Search for Jobs on the Go</h2>
                    </div><!-- end section-heading -->
                    <ul class="info-list contact-links">
                        <li class="d-flex align-items-center mb-4">
                            <span class="flex-shrink-0 la la-search-plus"></span>
                            <div class="app-title-box">
                                <h4 class="widget-title pb-2 font-weight-bold">AR Job Search</h4>
                                <p class="color-text-3">
                                    Omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem
                                    quibusdam et aut officiis debitis aut rerum necessitatibus saepe
                                    urna ut viverra.
                                </p>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <span class="flex-shrink-0 la la-map-marker"></span>
                            <div class="app-title-box">
                                <h4 class="widget-title pb-2 font-weight-bold"> Search on the go</h4>
                                <p class="color-text-3">
                                    Omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem
                                    quibusdam et aut officiis debitis aut rerum necessitatibus saepe
                                    urna ut viverra.
                                </p>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <span class="flex-shrink-0 la la-bell-o"></span>
                            <div class="app-title-box">
                                <h4 class="widget-title pb-2 font-weight-bold"> Instant Notifications</h4>
                                <p class="color-text-3">
                                    Omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem
                                    quibusdam et aut officiis debitis aut rerum necessitatibus saepe
                                    urna ut viverra.
                                </p>
                            </div>
                        </li>
                    </ul>
                    <div class="btn-box d-flex text-left margin-top-40px">
                        <a href="#" class="theme-btn download-btn"><i class="la la-apple"></i>App Store</a>
                        <a href="#" class="theme-btn download-btn"><i class="la la-android"></i>Google Play</a>
                    </div><!-- end btn-box -->
                </div>
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end mobile-app-area -->
<!-- ================================
    END MOBILE-APP AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
       START BLOG AREA
================================= -->
<section class="blog-area padding-top-100px padding-bottom-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">See How You Can up Your Career <br> Status Tips & Articles</h2>
                    <p class="sec__desc">
                        Morbi convallis bibendum urna ut viverra. Maecenas quis consequat,<br>
                        a feugiat eros. Nunc ut lacinia tortors.
                    </p>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row mt-5">
            <div class="col-lg-4 column-td-6">
                <div class="card-item">
                    <div class="card-content-wrap">
                        <div class="card-badge-wrap">
                            <span class="card-badge">Jobs</span>
                            <div class="icon-element">
                                <i class="la la-share-alt"></i>
                                 <ul class="shared-list">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                     <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                     <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                 </ul>
                            </div>
                        </div>
                        <img src="{{ asset('web/images/img1.jpg') }}" alt="blog image" class="img-fluid">
                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="blog-single.html">3 things to know about the October 2019 jobs report</a>
                            </h4>
                            <p class="card-meta">
                                <img src="{{ asset('web/images/small-team1.jpg') }}" alt="" class="author-avatar">
                                <span class="font-weight-semi-bold">Kamran Adi</span> - 25 Jan, 2020
                            </p>
                        </div><!-- end card-content -->
                    </div><!-- end card-content-wrap -->
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 column-td-6">
                <div class="card-item">
                    <div class="card-content-wrap">
                        <div class="card-badge-wrap">
                            <span class="card-badge">Retail</span>
                            <div class="icon-element">
                                <i class="la la-share-alt"></i>
                                 <ul class="shared-list">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                     <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                     <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                 </ul>
                            </div>
                        </div>
                        <img src="{{ asset('web/images/img2.jpg') }}" alt="blog image" class="img-fluid">
                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="blog-single.html">8 tips for the perfect retail sales resume</a>
                            </h4>
                            <p class="card-meta">
                                <img src="{{ asset('web/images/small-team2.jpg') }}" alt="" class="author-avatar">
                                <span class="font-weight-semi-bold">David Wise</span> - 25 Jan, 2020
                            </p>
                        </div><!-- end card-content -->
                    </div><!-- end card-content-wrap -->
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 column-td-6">
                <div class="card-item">
                    <div class="card-content-wrap">
                        <div class="card-badge-wrap">
                            <span class="card-badge">Health</span>
                            <div class="icon-element">
                                <i class="la la-share-alt"></i>
                                 <ul class="shared-list">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                     <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                     <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                 </ul>
                            </div>
                        </div>
                        <img src="{{ asset('web/images/img3.jpg') }}" alt="blog image" class="img-fluid">
                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="blog-single.html">10 high-paying health care jobs (besides doctors)</a>
                            </h4>
                            <p class="card-meta">
                                <img src="{{ asset('web/images/small-team3.jpg') }}" alt="" class="author-avatar">
                                <span class="font-weight-semi-bold">Mike Doe</span> - 25 Jan, 2020
                            </p>
                        </div><!-- end card-content -->
                    </div><!-- end card-content-wrap -->
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
        <div class="row">
            {{-- <div class="col-lg-12">
                <div class="btn-box text-center mt-4">
                    <a href="blog-grid.html" class="theme-btn">Read More Articles</a>
                </div>
            </div> --}}
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->
<!-- ================================
       START BLOG AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area cta-area-2 column-sm-center section-bg-2 padding-top-70px padding-bottom-70px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="section-heading">
                    <h2 class="sec__title mb-2 text-white font-size-26 line-height-40">
                        Advertise your new job to thousands of qualified
                        <br> candidates in just a few clicks
                    </h2>
                    <p class="sec__desc color-white-rgba">
                        Morbi convallis bibendum urna ut viverra. Maecenas
                    </p>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-9 -->
            <div class="col-lg-3">
                <div class="btn-box">
                    <a href="{{ url('employer/post-new-job') }}" class="theme-btn">Post a Job</a>
                </div><!-- end btn-box -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cta-area -->
<!-- ================================
    END CTA AREA
================================= -->

<script
src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_AUTOCOMPLETE_API_KEY')}}&callback=initAutocomplete&libraries=places&v=weekly"
defer
></script>
<script>
    // This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
let placeSearch;
let autocomplete;
const componentForm = {
  street_number: "short_name",
  route: "long_name",
  locality: "long_name",
  administrative_area_level_1: "short_name",
  country: "long_name",
  postal_code: "short_name",
};
console.log(componentForm)

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
    document.getElementById("autocomplete"),
    { types: ["geocode"] }
  );
  const place = autocomplete.getPlace();

      let cus_location = {
        lat: place.geometry.location.lat(),
        long: place.geometry.location.lng()
      }
    console.log(cus_location)
  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(["address_component"]);
  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener("place_changed", fillInAddress);
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition((position) => {
      const geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
      };
      const circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy,
      });
    //   console.log(circle);
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
</script>
@endsection