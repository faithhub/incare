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
                            <h2 class="sec__title mb-0">Contact Us</h2>
                        </div><!-- end section-heading -->
                        <ul class="list-items d-flex align-items-center">
                            <li class="active__list-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="active__list-item">Contact Us</li>
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
<section class="contact-area padding-top-100px padding-bottom-85px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading mb-5">
                    <h2 class="sec__title font-size-28 line-height-35">How can we help you today?</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
            <div class="col-lg-4">
                <div class="icon-box">
                    <h4 class="info__title mb-3">Are you an employer?</h4>
                    <p class="info__desc">
                        If so, <a href="employer-dashboard-post-job.html" class="color-text">click here</a> to post a job, ask questions about your account, or get support.
                    </p>
                </div>
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="icon-box">
                    <h4 class="info__title mb-3">Are you a candidate?</h4>
                    <p class="info__desc">
                        If so, <a href="candidate-add-resume.html" class="color-text">click here</a> to add resume, ask questions about your account, or get support.
                    </p>
                </div>
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="icon-box">
                    <h4 class="info__title mb-3">Forgot your password?</h4>
                    <p class="info__desc">Don't worry, it happens to everyone <a href="recover.html" class="color-text">Click here to reset your password</a></p>
                </div>
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="icon-box">
                    <h4 class="info__title mb-3">Want to stop getting our emails?</h4>
                    <p class="info__desc">We'll miss you, but you can <a href="#" class="color-text"> click here to unsubscribe</a></p>
                </div>
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="icon-box">
                    <h4 class="info__title mb-3">Have lingering questions?</h4>
                    <p class="info__desc">Find answers in our <a href="faq.html" class="color-text">FAQ</a> page or contact our
                        <a href="contact.html" class="color-text">help center</a>
                    </p>
                </div>
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="icon-box">
                    <h4 class="info__title mb-3">Media</h4>
                    <p class="info__desc">If you are a member of the media, please reach out to <a href="mailto:info@Zobstar123.com" class="color-text">info@Zobstar123.com</a></p>
                </div>
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
        <div class="section-block margin-top-70px margin-bottom-100px"></div>
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-form-item">
                    <div class="billing-title-wrap">
                        <h3 class="widget-title pb-0">Fill the form. It's easy.</h3>
                        <div class="title-shape margin-top-10px"></div>
                    </div><!-- billing-title-wrap -->
                    <div class="billing-content">
                        <div class="contact-form-action">
                            <form method="post" action="{{ url('contact') }}">
                                @csrf
                                <div class="input-box">
                                    <label class="label-text">Name</label>
                                    <div class="form-group">
                                        <span class="la la-user form-icon"></span>
                                        <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name" placeholder="Name">
                                        @error('name')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Email</label>
                                    <div class="form-group">
                                        <span class="la la-envelope-o form-icon"></span>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email address">
                                        @error('email')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Phone</label>
                                    <div class="form-group">
                                        <span class="la la-phone form-icon"></span>
                                        <input class="form-control @error('mobile') is-invalid @enderror" type="text" name="mobile" placeholder="Phone number">
                                        @error('mobile')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- end input-box -->
                                 <div class="input-box">
                                    <label class="label-text">Reason for contact</label>
                                    <div class="form-group">
                                        <select class="reason-option-field select2-hidden-accessible @error('reason') is-invalid @enderror" data-select2-id="1" tabindex="-1" name="reason" aria-hidden="true">
                                            <option value="" data-select2-id="3">Reason for contact</option>
                                            <option value="Accessing My Account">Accessing My Account</option>
                                            <option value="Account Settings">Account Settings</option>
                                            <option value="Question About a Job">Question About a Job</option>
                                            <option value="Other">Other</option>
                                            <option value="Technical Issue">Technical Issue</option>
                                            <option value="Delete Account">Delete Account</option>
                                        </select>
                                        @error('reason')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">What is 7 + 5? Spam Protection</label>
                                    <div class="form-group">
                                        <span class="la la-sync form-icon"></span>
                                        <input class="form-control @error('bot') is-invalid @enderror" type="text" name="bot" placeholder="I'm not a robot">
                                        @error('bot')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Preferred method of communication</label>
                                    <div class="form-group">
                                        <div class="radio-option d-inline-block mr-4 @error('communicate') is-invalid @enderror">
                                            <label for="radio-6" class="radio-trigger font-weight-medium">
                                                <input type="radio" id="radio-6" value="Email" name="communicate" checked="">
                                                <span class="checkmark"></span>
                                                <span class="color-text-3">Email</span>
                                            </label>
                                        </div>
                                        <div class="radio-option d-inline-block @error('communicate') is-invalid @enderror">
                                            <label for="radio-7" class="radio-trigger font-weight-medium">
                                                <input type="radio" id="radio-7" value="Phone" name="communicate">
                                                <span class="checkmark"></span>
                                                <span class="color-text-3">Phone</span>
                                            </label>
                                        </div>
                                    </div>
                                    @error('communicate')
                                        <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Additional information</label>
                                    <div class="form-group">
                                        <span class="la la-pencil form-icon"></span>
                                        <textarea class="message-control form-control @error('message') is-invalid @enderror" name="message" placeholder="Write message"></textarea>
                                        @error('message')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <button type="submit" class="theme-btn border-0">Send Message</button>
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div><!-- end billing-content -->
                </div><!-- end billing-form-item -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="contact-details margin-bottom-30px">
                    <div class="contact-details-inner">
                        <div class="contact-item d-flex align-items-center">
                            <div class="contact-icon mr-3">
                                <i class="la la-map-marker icon-element font-size-24"></i>
                            </div>
                            <div class="contact-address">
                                <h4 class="widget-title text-white pb-2">Address</h4>
                                <p class="color-white-rgba font-weight-medium">Mada Center 8th floor, 379 Hudson St, New York, NY 10018 US</p>
                            </div>
                        </div>
                        <div class="contact-item d-flex align-items-center">
                            <div class="contact-icon mr-3">
                                <i class="la la-phone icon-element font-size-24"></i>
                            </div>
                            <div class="contact-address">
                                <h4 class="widget-title text-white pb-2">Lets Talk</h4>
                                <p class="color-white-rgba font-weight-medium">+1 800 1236879</p>
                                <p class="color-white-rgba font-weight-medium">+99 06 1234 566 88</p>
                            </div>
                        </div>
                        <div class="contact-item d-flex align-items-center">
                            <div class="contact-icon mr-3">
                                <i class="la la-envelope icon-element font-size-24"></i>
                            </div>
                            <div class="contact-address">
                                <h4 class="widget-title text-white pb-2">General Support</h4>
                                <p class="color-white-rgba font-weight-medium"><a href="mailto:supportjob@gmail.com" class="color-white-rgba">supportZobstar@gmail.com</a></p>
                                <p class="color-white-rgba font-weight-medium"><a href="mailto:contact@example.com" class="color-white-rgba">contact@example.com</a></p>
                            </div>
                        </div>
                    </div>
                </div><!-- end contact-details -->
                <div class="billing-form-item presentation-box">
                    <div class="billing-title-wrap">
                        <h3 class="widget-title">Need Presentation?</h3>
                        <div class="title-shape"></div>
                    </div>
                    <div class="billing-content">
                        <p>
                            You like what we do, but you need to demonstrate your team as well. Easy!
                            Directly download, or share the link to a PDF with your colleagues.
                        </p>
                        <a href="javascript:void(0)" class="border-0 color-text-2 mt-4 d-flex align-items-center"><i class="la la-download icon-element"></i> Company profile.pdf (6.3 MB)</a>
                    </div>
                </div><!-- end billing-form-item -->
                 <div class="billing-form-item">
                    <div class="billing-title-wrap">
                        <h3 class="widget-title">Follow &amp; Connect</h3>
                        <div class="title-shape"></div>
                    </div>
                    <div class="billing-content">
                        <ul class="social-profile">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end billing-form-item -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection