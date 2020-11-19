@extends('web.layouts.app')
@section('content')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('web/styles/courses_responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('web/styles/courses_styles.css') }}"> --}}

{{-- <div class="home">
    <div class="home_background_container prlx_parent">
        <div class="home_background prlx" style="background-image:url({{ asset('web/images/courses_background.jpg') }})"></div>
    </div>
    <div class="home_content">
        <h1>About</h1>
    </div>
</div> --}}

<!-- Popular -->

<div class="popular page_section" style="margin-top: 4rem">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Contact US</h1>
                </div>
            </div>
        </div>

        <div class="row course_boxes">
            <!-- Popular Course Item -->
            <div class="col-lg-8">
                <div class="card p-3">
                    <form>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" rows="4" placeholder="Your Message here!"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block" style="background-color: #006600; color:white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Popular Course Item -->
            <div class="col-lg-4">
                <div class="">
                    <h3>Join Courses</h3>
                    <p>
                        In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, 
                        vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, 
                        finibus tortor fermentum. Etiam eu purus nec eros varius luctus. 
                        Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.
                    </p>
                    <ul>
                        <li class="contact_info_item m-3" style="display: inline-flex">
                            <span class="fa fa-address-book m-1"></span>
                            {{-- <div class="contact_info_icon">
                                <img src="{{ asset('web/im  ages/placeholder.svg') }}" alt="https://www.flaticon.com/authors/lucy-g" style="width: 20px; height: auto; color:#006600 !important">
                            </div> --}}
                            Blvd Libertad, 34 m05200 Arévalo
                        </li>
                        <li class="contact_info_item m-3" style="display: inline-flex">
                            <span class="fa fa-phone m-1"></span>
                            {{-- <div class="contact_info_icon">
                                <img src="{{ asset('web/images/smartphone.svg') }}" alt="https://www.flaticon.com/authors/lucy-g" style="width: 20px; height: auto;">
                            </div> --}}
                            +234 081 6818 1969
                        </li>
                        <li class="contact_info_item m-3" style="display: inline-flex">
                            <span class="fa fa-envelope m-1"></span>
                            {{-- <div class="contact_info_icon">
                                <img src="{{ asset('web/images/envelope.svg') }}" alt="https://www.flaticon.com/authors/lucy-g" style="width: 20px; height: auto;">
                            </div> --}}
                            davidshine4jesus@gmail.com
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </div>		
</div>
@endsection