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
                    <h1>About</h1>
                </div>
            </div>
        </div>

        <div class="row course_boxes">

            <!-- Popular Course Item -->
            <div class="col-lg-8 course_box">
                <div class="card">
                   <p>
                    In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, 
                    vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, 
                    finibus tortor fermentum. Etiam eu purus nec eros varius luctus. 
                    Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.
                   </p>
                   <p>
                    In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, 
                    vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, 
                    finibus tortor fermentum. Etiam eu purus nec eros varius luctus. 
                    Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.
                    </p>
                </div>
            </div>

            <!-- Popular Course Item -->
            <div class="col-lg-4 course_box">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('web/images/course_9.jpg') }}" alt="https://unsplash.com/@kimberlyfarmer">
                    <div class="card-body text-center">
                        <div class="card-title"><a href="courses.html">Advanced Photoshop</a></div>
                        <div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
                    </div>
                    {{-- <div class="price_box d-flex flex-row align-items-center">
                        <div class="course_author_image">
                            <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                        </div>
                        <div class="course_author_name">Michael Smith, <span>Author</span></div>
                        <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>		
</div>
@endsection