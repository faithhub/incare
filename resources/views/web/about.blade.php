@extends('web.layouts.app')
@section('content')

<!-- Popular -->

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
                            <h2 class="sec__title mb-0">About Us</h2>
                        </div><!-- end section-heading -->
                        <ul class="list-items d-flex align-items-center">
                            <li class="active__list-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="active__list-item">About Us</li>
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

<section class="service-area text-center padding-top-120px padding-bottom-85px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title">Our Services</h2>
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
                        <i class="la la-dashboard"></i>
                        <span class="info-number">1</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                        <h4 class="info__title mb-3"><a href="#" class="color-text-2">Advertise a job</a></h4>
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
                        <i class="las la-search-plus"></i>
                        <span class="info-number">2</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                        <h4 class="info__title mb-3"><a href="#" class="color-text-2">CV search</a></h4>
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
                        <i class="la la-balance-scale"></i>
                        <span class="info-number">3</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                        <h4 class="info__title mb-3"><a href="#" class="color-text-2">Recruiter profiles</a></h4>
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
                        <i class="la la-line-chart"></i>
                        <span class="info-number">4</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                        <h4 class="info__title mb-3"><a href="#" class="color-text-2">Temp Search</a></h4>
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
                        <i class="la la-globe"></i>
                        <span class="info-number">5</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                        <h4 class="info__title mb-3"><a href="#" class="color-text-2">Display jobs</a></h4>
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
                        <i class="la la-briefcase"></i>
                        <span class="info-number">6</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                        <h4 class="info__title mb-3"><a href="#" class="color-text-2">For Agencies</a></h4>
                        <p class="info__desc">
                            Sed quia lipsum dolor sit atur adipiscing elit is nunc quis
                            tellus sed ligula porta ultricies quis nec nec magna
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>


<section class="cta-area padding-top-100px padding-bottom-80px cta-area-2 text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">Let us help you get started</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row mt-5">
            <div class="col-lg-4 column-td-6">
                <div class="post-card section-bg pb-5 pr-4 pl-4 pt-4">
                    <div class="post-card-content">
                        <img src="{{ asset('web/images/search.svg') }}" alt="" class="img-fluid">
                        <h2 class="widget-title mt-3">Are You Looking for a Job?</h2>
                        <p>
                            Objectively innovate empowered manufactured products whereas parallel platforms.
                        </p>
                    </div><!-- end post-card-content -->
                    <div class="btn-box mt-4 text-center">
                        <a href="{{ url('register') }}" class="theme-btn">Find a Job</a>
                    </div><!-- end btn-box -->
                </div>
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 column-td-6">
                <div class="post-card section-bg pb-5 pr-4 pl-4 pt-4">
                    <div class="post-card-content">
                        <img src="{{ asset('web/images/podcast.svg') }}" alt="" class="img-fluid">
                        <h2 class="widget-title mt-3">Employers Looking to Post a Job?</h2>
                        <p>
                            Objectively innovate empowered manufactured products whereas parallel platforms.
                        </p>
                    </div><!-- end post-card-content -->
                    <div class="btn-box mt-4 text-center">
                        <a href="{{ url('register') }}" class="theme-btn">Post a Job</a>
                    </div><!-- end btn-box -->
                </div>
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 column-td-6">
                <div class="post-card section-bg pb-5 pr-4 pl-4 pt-4">
                    <div class="post-card-content">
                        <img src="{{ asset('web/images/data-points.svg') }}" alt="" class="img-fluid">
                        <h2 class="widget-title mt-3">Job Market Data</h2>
                        <p>
                            Objectively innovate empowered manufactured products whereas parallel platforms.
                        </p>
                    </div><!-- end post-card-content -->
                    <div class="btn-box mt-4 text-center">
                        <a href="{{ url('register') }}" class="theme-btn">Get Data</a>
                    </div><!-- end btn-box -->
                </div>
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection