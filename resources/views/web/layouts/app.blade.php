<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Incare - {{$title ?? request()->segment(1)}}</title>
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">

    <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,500,700,900&amp;display=swap" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <!-- Template CSS Files -->
    @include('web.layouts.includes.style')
</head>
<body>
<!-- start per-loader -->
{{-- <div class="loader-container">
    <div class="loader-circle">
        <div class="loader">
            <div class="loader-dot"></div>
            <div class="loader-dot"></div>
            <div class="loader-dot"></div>
            <div class="loader-dot"></div>
            <div class="loader-dot"></div>
            <div class="loader-dot"></div>
        </div>
    </div>
</div> --}}
<!-- end per-loader -->


<!-- ================================
            START HEADER AREA
================================= -->
@include('web.layouts.includes.header')	
@include('web.layouts.includes.alert')
<!-- ================================
         END HEADER AREA
================================= -->


@yield('content')


<!-- ================================
       START FOOTER AREA
================================= -->
@include('web.layouts.includes.footer')
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->

<!-- Template JS Files -->
@include('web.layouts.includes.script')

<!-- Mirrored from techydevs.com/demos/themes/html/zobstar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Oct 2020 09:15:44 GMT -->
</html>