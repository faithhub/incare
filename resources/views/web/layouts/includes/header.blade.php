
<!-- ================================
            START HEADER AREA
================================= -->
<header class="header-area">
    <div class="header-menu-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-full-width">
                        <div class="logo">
                            <a href="{{ url('home') }}"><img src="{{ asset('web/images/logo2.png') }}" alt="logo"></a>
                        </div><!-- end logo -->
                        <div class="main-menu-content">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{{ url('home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('about') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('contact') }}">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('jobs') }}">Jobs</a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- end main-menu-content -->
                        <div class="logo-right-content">
                            <ul class="author-access-list">
                                <li>
                                    <a href="{{ url('login') }}">Login</a>
                                    <span class="or-text">or</span>
                                    <a href="{{ url('register') }}">Sign up</a>
                                </li>
                                <li>
                                     <a href="{{ url('employer/post-new-job') }}" class="theme-btn">
                                        <span class="la la-plus"></span>
                                        Post a Job
                                    </a>
                                </li>
                            </ul>
                            <div class="side-menu-open">
                                <span class="menu__bar"></span>
                                <span class="menu__bar"></span>
                                <span class="menu__bar"></span>
                            </div><!-- end side-menu-open -->
                        </div><!-- end logo-right-content -->
                    </div><!-- end menu-full-width -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
    <div class="side-nav-container">
        <div class="humburger-menu">
            <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
        </div><!-- end humburger-menu -->
        <div class="side-menu-wrap">
            <ul class="side-menu-ul">
                <li>
                    <a href="{{ url('home') }}">Home</a>
                </li>
                <li>
                    <a href="{{ url('about') }}">About Us</a>
                </li>
                <li>
                    <a href="{{ url('contact') }}">Contact</a>
                </li>
                <li>
                    <a href="{{ url('jobs') }}">Jobs</a>
                </li>
            </ul>
            <div class="side-nav-button">
                <a href="{{ url('login') }}">Login</a>
                <span class="or-text">or</span>
                <a href="{{ url('register') }}">Sign up</a>
                <a href="{{ url('employer/post-new-job') }}" class="theme-btn">Post a Job</a>
            </div><!-- end side-nav-button -->
        </div><!-- end side-menu-wrap -->
    </div><!-- end side-nav-container -->
</header>
<!-- ================================
         END HEADER AREA
================================= -->