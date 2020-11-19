@extends('employer.layouts.app')
@section('user')

<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title">Post a Job</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="index.html">Home</a></li>
                <li class="active__list-item">Dashboard</li>
                <li>Post a Job</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->

<div class="row mt-5">
    <div class="col-lg-12">
        <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0">General Information</h3>
                <div class="title-shape margin-top-10px"></div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content">
                <div class="contact-form-action">
                    <form method="post">
                        <div class="row">
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box company-logo-wrap">
                                    <label class="label-text">Job image</label>
                                    <div class="form-group">
                                        <div class="upload-btn-box">
                                            <input type="file" name="files[]" id="filer_input" multiple="multiple">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Job Title</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input class="form-control" type="text" name="text" placeholder="Enter job title">
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <!-- <label class="label-text">Username</label>
                                    <div class="form-group">
                                        <span class="la la-pencil-square-o form-icon"></span>
                                        <input class="form-control" type="text" name="text" placeholder="Username">
                                    </div> -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Job Type</label>
                                    <div class="form-group">
                                        <select class="job-type-option-field">
                                            <option value>Select Job Type</option>
                                            <option value="1">Full Time</option>
                                            <option value="2">Part Time</option>
                                            <option value="3">Temporary</option>
                                            <option value="4">Internship</option>
                                            <option value="5">Permanent</option>
                                            <option value="6">Freelance</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Career Level</label>
                                    <div class="form-group">
                                        <select class="job-category-option-field">
                                            <option value>Choose One</option>
                                            <option value="1">Manager</option>
                                            <option value="2">Officer</option>
                                            <option value="3">Mobile Designer</option>
                                            <option value="4">Web Designer</option>
                                            <option value="5">Product Designer</option>
                                            <option value="6">Creative Director</option>
                                            <option value="7">Art Director</option>
                                            <option value="8">Interaction Designer</option>
                                            <option value="9">Motion Designer</option>
                                            <option value="10">Illustrator</option>
                                            <option value="11">Animator</option>
                                            <option value="12">Student</option>
                                            <option value="13">Executive</option>
                                            <option value="14">Brand Designer</option>
                                            <option value="15">Mobile Developer</option>
                                            <option value="16">Front-end Developer</option>
                                            <option value="17">Content Writer</option>
                                            <option value="18">Other</option>
                                        </select>
                                    </div><!-- end form-group -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">category</label>
                                    <div class="form-group">
                                        <select class="category-option-field">
                                            <option value >Select a category</option>
                                            <option value="1">All Category</option>
                                            <option value="2">Accounting / Finance</option>
                                            <option value="3">Education</option>
                                            <option value="4">Design & Creative</option>
                                            <option value="5">Health Care</option>
                                            <option value="6">Engineer & Architects</option>
                                            <option value="7">Marketing & Sales</option>
                                            <option value="8">Garments / Textile</option>
                                            <option value="9">Customer Support</option>
                                            <option value="10">Digital Media</option>
                                            <option value="11">Telecommunication</option>
                                        </select>
                                    </div><!-- end form-group -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Offered Amount</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <span class="la la-dollar-sign form-icon"></span>
                                                <input class="form-control" type="number" placeholder="Min">
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <span class="la la-dollar-sign form-icon"></span>
                                                <input class="form-control" type="number" placeholder="Max">
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                    </div><!-- end row -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <!-- <label class="label-text">Experience</label>
                                    <div class="form-group">
                                        <select class="experience-option-field">
                                            <option value>Choose Experience</option>
                                            <option value="1">No Experience</option>
                                            <option value="2">Less than 1 Year</option>
                                            <option value="3">1 to 2 Year(s)</option>
                                            <option value="4">2 to 4 Year(s)</option>
                                            <option value="5">3 to 5 Year(s)</option>
                                            <option value="3">2 Years</option>
                                            <option value="4">3 Years</option>
                                            <option value="5">4 Years</option>
                                            <option value="6">Over 5 Years</option>
                                        </select>
                                    </div> -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <!-- <label class="label-text">Qualification</label>
                                    <div class="form-group">
                                        <select class="qualification-option-field">
                                            <option value>Choose Qualification</option>
                                            <option value="1">No Experience</option>
                                            <option value="2">Matriculation</option>
                                            <option value="3">Intermediate</option>
                                            <option value="4">Diploma</option>
                                            <option value="5">Graduate</option>
                                            <option value="6">Certificate</option>
                                            <option value="7">Associate Degree</option>
                                            <option value="8">Bachelor's Degree</option>
                                            <option value="9">Master's Degree</option>
                                            <option value="10">Doctorate Degree</option>
                                        </select>
                                    </div> -->
                                </div>
                            </div><!-- end col-lg-4 -->
                             <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <!-- <label class="label-text">Gender</label>
                                    <div class="form-group">
                                        <select class="choose-gender-option-field">
                                            <option value>Choose Gender</option>
                                            <option value="1">Male or Female</option>
                                            <option value="2">Male</option>
                                            <option value="3">Female</option>
                                        </select>
                                    </div> -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <!-- <label class="label-text d-flex align-items-center ">Job Tags<span class="text-muted ml-1">(optional)</span>
                                        <i class="la la-question tip ml-1" data-toggle="tooltip" data-placement="top" title="Comma separate tags, such as required skills or technologies, for this job. Maximum of 5 keywords"></i>
                                    </label>
                                    <div class="form-group">
                                        <select class="tag-option-field" multiple="multiple">
                                            <option>UI & UX Design</option>
                                            <option>iOS</option>
                                            <option>Android</option>
                                            <option>PHP</option>
                                            <option>Development</option>
                                            <option>Laravel</option>
                                        </select>
                                    </div> -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <!-- <label class="label-text">Skill Requirements</label>
                                    <div class="form-group">
                                        <select class="skill-option-field" multiple="multiple">
                                            <option>HTML5</option>
                                            <option>CSS3</option>
                                            <option>PHP</option>
                                            <option>Javascript</option>
                                            <option>Laravel</option>
                                            <option>Photoshop</option>
                                            <option>WordPress</option>
                                            <option>Vuejs</option>
                                            <option>React</option>
                                        </select>
                                    </div> -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <!-- <label class="label-text">No. Of Vacancy</label>
                                    <div class="form-group">
                                        <span class="la la-clock-o form-icon"></span>
                                        <input class="form-control" type="text" name="text" placeholder="01, 02, 03">
                                    </div> -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Application Deadline Date</label>
                                    <div class="form-group">
                                        <span class="la la-calendar form-icon"></span>
                                        <input class="date-range form-control" type="text" name="daterange" value="2/25/2020">
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Job Description</label>
                                    <div class="form-group mb-0">
                                        <span class="la la-pencil form-icon"></span>
                                        <textarea class="message-control form-control" name="message" placeholder="Write your job description"></textarea>
                                    </div>
                                </div>
                            </div><!-- end col-lg-12 -->
                        </div><!-- end row -->
                    </form>
                </div><!-- end contact-form-action -->
            </div><!-- end billing-content -->
        </div><!-- end billing-form-item -->
        <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0">Your Contact Details</h3>
                <div class="title-shape margin-top-10px"></div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content">
                <div class="contact-form-action">
                    <form method="post">
                        <div class="row">
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <!-- <label class="label-text">Company Name</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input class="form-control" type="text" name="text" placeholder="Company name">
                                    </div> -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <!-- <label class="label-text">Website link (optional)</label>
                                    <div class="form-group">
                                        <span class="la la-globe form-icon"></span>
                                        <input class="form-control" type="text" name="text" placeholder="https://techydevs.com/">
                                    </div> -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <!-- <label class="label-text">Email address</label>
                                    <div class="form-group">
                                        <span class="la la-envelope-o form-icon"></span>
                                        <input class="form-control" type="text" name="text" placeholder="Enter email address">
                                    </div> -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Phone Number</label>
                                    <div class="form-group">
                                        <i class="la la-phone form-icon"></i>
                                        <input class="form-control" type="text" name="text" placeholder="Phone number">
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Location</label>
                                    <div class="form-group">
                                        <select class="location-option-field">                                            
                                            <option value>Location</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">City</label>
                                    <div class="form-group">
                                        <span class="la la-map form-icon"></span>
                                        <input class="form-control" type="text" name="text" placeholder="Enter city name">
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Complete Address</label>
                                    <div class="form-group">
                                        <span class="la la-map-marker form-icon"></span>
                                        <input class="form-control" type="text" name="text" placeholder="lekki phase 1,  Lagos">
                                    </div>
                                </div>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-4">
                                <div class="input-box">
                                    <label class="label-text">Address</label>
                                    <div class="form-group">
                                        <span class="la la-map form-icon"></span>
                                        <input class="form-control" type="text" name="text" placeholder="lekki phase 1,  Lagos ">
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            {{-- <div class="col-lg-4">
                                <div class="input-box">
                                    <label class="label-text">Latitude</label>
                                    <div class="form-group">
                                        <span class="la la-map form-icon"></span>
                                        <input class="form-control" type="text" name="text" placeholder="55.1589689">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-box">
                                    <label class="label-text">Longitude</label>
                                    <div class="form-group">
                                        <span class="la la-map form-icon"></span>
                                        <input class="form-control" type="text" name="text" placeholder="32.1589689">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="btn-box">
                                        <button class="theme-btn border-0">Search Location</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text ">Map location</label>
                                    <div class="form-group">
                                        <div class="gmaps">
                                            <div id="map" class="radius-round"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Tagline (optional)</label>
                                    <div class="form-group mb-0">
                                        <span class="la la-pencil form-icon"></span>
                                        <textarea class="message-control form-control" name="message" placeholder="Briefly describe about your Job"></textarea>
                                    </div>
                                </div>
                            </div><!-- end col-lg-12 -->
                        </div><!-- end row -->
                    </form>
                </div><!-- end contact-form-action -->
            </div><!-- end billing-content -->
        </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <div class="custom-checkbox mr-0">
                <div>
                    <input type="checkbox" id="chb1">
                    <label for="chb1">By Submitting Job You Confirm That You Accept The
                        <a href="terms-and-condition.html" class="color-text">Terms & Conditions</a> And <a href="#" class="color-text">Privacy Policy</a>
                    </label>
                </div>
            </div>
        </div>
        <div class="btn-box mt-4">
            <button type="submit" class="theme-btn border-0"><i class="la la-plus"></i> Submit Your Job</button>
        </div><!-- end btn-box -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection