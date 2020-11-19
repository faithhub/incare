
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
                            <a href="index.html"><img src="{{ asset('web/images/logo2.png') }}" alt="logo"></a>
                        </div><!-- end logo -->
                        <div class="main-menu-content">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{{ url('home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Employers <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="employer-listing.html">Employer Listing</a></li>
                                            <li><a href="employer-details.html">Employer Details</a></li>
                                            <li><a href="employer-dashboard.html">Employer Dashboard</a></li>
                                            <li><a href="employer-dashboard-edit-profile.html">Edit Profile</a></li>
                                            <li><a href="employer-dashboard-post-job.html">Post a Job</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Candidates <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="candidate-listing.html">Candidate Listing</a></li>
                                            <li><a href="candidate-details.html">Candidate Details</a></li>
                                            <li><a href="candidate-dashboard.html">Candidate Dashboard</a></li>
                                            <li><a href="candidate-dashboard-edit-profile.html">Edit Profile</a></li>
                                            <li><a href="candidate-add-resume.html">Add a Resume</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Pages <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="invoice.html">Invoice</a></li>
                                            <li><a href="pricing.html">Pricing</a></li>
                                            <li><a href="how-it-works.html">How It Works</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="payment-complete.html">Payment Complete</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="page-404.html">404 Page</a></li>
                                            <li><a href="terms-and-condition.html">Terms And Condition</a></li>
                                            <li><a href="recover.html">Recover Password</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Blog <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                            <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                                            <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                            <li><a href="blog-single.html">Blog Detail</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Jobs <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="job-listing.html">Job Listing</a></li>
                                            <li><a href="job-grid-view.html">Job Grid View</a></li>
                                            <li><a href="job-details.html">Job Details </a></li>
                                        </ul>
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
                                     <a href="employer-dashboard-post-job.html" class="theme-btn">
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
                    <a href="#">Home <i class="la la-caret-down btn-toggle"></i></a>
                    <ul class="dropdown-menu-item">
                        <li><a href="index.html">Home 1</a></li>
                        <li><a href="index2.html">Home 2</a></li>
                        <li><a href="index3.html">Home 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Employers <i class="la la-caret-down btn-toggle"></i></a>
                    <ul class="dropdown-menu-item">
                        <li><a href="employer-listing.html">Employer Listing</a></li>
                        <li><a href="employer-details.html">Employer Details</a></li>
                        <li><a href="employer-dashboard.html">Employer Dashboard</a></li>
                        <li><a href="employer-dashboard-edit-profile.html">Edit Profile</a></li>
                        <li><a href="employer-dashboard-post-job.html">Post a Job</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Candidates <i class="la la-caret-down btn-toggle"></i></a>
                    <ul class="dropdown-menu-item">
                        <li><a href="candidate-listing.html">Candidate Listing</a></li>
                        <li><a href="candidate-details.html">Candidate Details</a></li>
                        <li><a href="candidate-dashboard.html">Candidate Dashboard</a></li>
                        <li><a href="candidate-dashboard-edit-profile.html">Edit Profile</a></li>
                        <li><a href="candidate-add-resume.html">Add a Resume</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Pages <i class="la la-caret-down btn-toggle"></i></a>
                    <ul class="dropdown-menu-item">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="invoice.html">Invoice</a></li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="how-it-works.html">How It Works</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="payment-complete.html">Payment Complete</a></li>
                        <li><a href="faq.html">Faq</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="page-404.html">404 Page</a></li>
                        <li><a href="terms-and-condition.html">Terms And Condition</a></li>
                        <li><a href="recover.html">Recover Password</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Blog <i class="la la-caret-down btn-toggle"></i></a>
                    <ul class="dropdown-menu-item">
                        <li><a href="blog-grid.html">Blog Grid</a></li>
                        <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                        <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                        <li><a href="blog-single.html">Blog Detail</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Jobs <i class="la la-caret-down btn-toggle"></i></a>
                    <ul class="dropdown-menu-item">
                        <li><a href="job-listing.html">Job Listing</a></li>
                        <li><a href="job-grid-view.html">Job Grid View</a></li>
                        <li><a href="job-details.html">Job Details </a></li>
                    </ul>
                </li>
            </ul>
            <div class="side-nav-button">
                <a href="login.html">Login</a>
                <span class="or-text">or</span>
                <a href="sign-up.html">Sign up</a>
                <a href="employer-dashboard-post-job.html" class="theme-btn">Post a Job</a>
            </div><!-- end side-nav-button -->
        </div><!-- end side-menu-wrap -->
    </div><!-- end side-nav-container -->
</header>
<!-- ================================
         END HEADER AREA
================================= -->

	
	<!-- Menu -->
	{{-- <div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="{{ url('home') }}">Home</a></li>
					<li class="menu_item menu_mm"><a href="{{ url('about') }}">About us</a></li>
					<li class="menu_item menu_mm"><a href="{{ url('courses') }}">Courses</a></li>
					<li class="menu_item menu_mm"><a href="{{ url('contact') }}">Contact</a></li>
					<li class="menu_item menu_mm"><a href="{{ url('login') }}">Sign In</a></li>
					<li class="menu_item menu_mm"><a href="{{ url('register') }}">Sign up</a></li>
				</ul>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
			</div>

		</div>

	</div> --}}