@extends('employer.layouts.app')
@section('user')
@if (isset($mode) && $mode == 'Edit')    
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title">Edit Job</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="index.html">Home</a></li>
                <li class="active__list-item">Dashboard</li>
                <li>Edit Job</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->

<form method="POST" action="{{ url('employer/post-new-job') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $job[0]['id'] }}">
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="billing-form-item">
                <div class="billing-title-wrap">
                    <h3 class="widget-title pb-0">General Information</h3>
                    <div class="title-shape margin-top-10px"></div>
                </div><!-- billing-title-wrap -->
                <div class="billing-content">
                    <div class="contact-form-action">
                        <div class="row">
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box company-logo-wrap">
                                    <label class="label-text">Job image</label>
                                    <div class="form-group">
                                        <div class="">
                                            <input type="file" name="avatar" class="form-control-file">
                                            @error('avatar')
                                                <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Job Title</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input class="form-control @error('job_title') is-invalid @enderror" value="{{ $job[0]['job_title'] }}" type="text" name="job_title" placeholder="Enter job title">
                                        @error('job_title')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Job Category</label>
                                    <div class="form-group">
                                        <select class="job-category-option-field @error('job_category') is-invalid @enderror" id="job_category" name="job_category">
                                            <option value>Select Job Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{ $job[0]['job_category'] == $category->id ? 'selected' : '' }}>{{$category->name}}</option>                                                
                                            @endforeach
                                        </select>
                                        @error('job_category')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Job Sub Category</label>
                                    <div class="form-group">
                                        <select class="job-category-option-field" name="job_sub_category" id="job_sub_category">
                                            {{-- <option value>Choose One</option>
                                            @foreach ($sub_categories as $sub_category)
                                                <option value="{{$sub_category->id}}" {{ old('job_sub_category') == $sub_category->id ? 'selected' : '' }}>{{$sub_category->name}}</option>                                                
                                            @endforeach --}}
                                        </select>
                                        @error('job_sub_category')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- end form-group -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Offered Amount Per Hour</label>
                                    <div class="form-group">
                                        <span class="la la-naira-sign form-icon">#</span>
                                        <input class="form-control @error('amount') is-invalid @enderror" value="{{ $job[0]['amount'] }}" name="amount" type="number" placeholder="Amount">
                                        @error('amount')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Application Deadline Date</label>
                                    <div class="form-group">
                                        <span class="la la-calendar form-icon"></span>
                                        <input class="date-range form-control @error('date_end') is-invalid @enderror" value="{{ $job[0]['date_end'] }}" type="date" name="date_end" value="2/25/2020">
                                        @error('date_end')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Job Description</label>
                                    <div class="form-group mb-0">
                                        <span class="la la-pencil form-icon"></span>
                                        <textarea class="message-control form-control @error('job_description') is-invalid @enderror" name="job_description" placeholder="Write your job description">{{ $job[0]['job_description'] }}</textarea>
                                        @error('job_description')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-12 -->
                        </div><!-- end row -->
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
                        <div class="row">
                            <div class="col-lg-6 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Phone Number</label>
                                    <div class="form-group">
                                        <i class="la la-phone form-icon"></i>
                                        <input class="form-control  @error('mobile') is-invalid @enderror" type="text" value="{{ $job[0]['mobile'] }}" name="mobile" placeholder="Phone number">
                                        @error('mobile')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-6 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">City</label>
                                    <div class="form-group">
                                        <span class="la la-map form-icon"></span>
                                        <input class="form-control  @error('city') is-invalid @enderror" value="{{ $job[0]['city'] }}" type="text" name="city" placeholder="Enter city name">
                                        @error('city')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Address</label>
                                    <div class="form-group">
                                        <span class="la la-map form-icon"></span>
                                        <input class="form-control  @error('address') is-invalid @enderror" id="autocomplete" onFocus="geolocate()" value="{{ $job[0]['address'] }}" type="text" name="address" placeholder="lekki phase 1,  Lagos ">
                                        @error('address')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                        </div><!-- end row -->
                    </div><!-- end contact-form-action -->
                </div><!-- end billing-content -->
            </div><!-- end billing-form-item -->
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="btn-box mt-4">
                <button type="submit" class="theme-btn border-0"><i class="la la-plus"></i> Submit Your Job</button>
            </div><!-- end btn-box -->
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCj8O5LlBKBIof-MjY0TWRRwvRFgOnwwRU&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>
    <script defer src="{{ asset('js/post_job.js') }}"></script>
</form>

@else
   
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

<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="billing-form-item">
                <div class="billing-title-wrap">
                    <h3 class="widget-title pb-0">General Information</h3>
                    <div class="title-shape margin-top-10px"></div>
                </div><!-- billing-title-wrap -->
                <div class="billing-content">
                    <div class="contact-form-action">
                        <div class="row">
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box company-logo-wrap">
                                    <label class="label-text">Job image</label>
                                    <div class="form-group">
                                        <div class="">
                                            <input type="file" name="avatar" class="form-control-file">
                                            @error('avatar')
                                                <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Job Title</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input class="form-control @error('job_title') is-invalid @enderror" value="{{ old('job_title') }}" type="text" name="job_title" placeholder="Enter job title">
                                        @error('job_title')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Job Category</label>
                                    <div class="form-group">
                                        <select class="job-category-option-field @error('job_category') is-invalid @enderror" id="job_category" name="job_category">
                                            <option value>Select Job Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{ old('job_category') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>                                                
                                            @endforeach
                                        </select>
                                        @error('job_category')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Job Sub Category</label>
                                    <div class="form-group">
                                        <select class="job-category-option-field" name="job_sub_category" id="job_sub_category">
                                            {{-- <option value>Choose One</option>
                                            @foreach ($sub_categories as $sub_category)
                                                <option value="{{$sub_category->id}}" {{ old('job_sub_category') == $sub_category->id ? 'selected' : '' }}>{{$sub_category->name}}</option>                                                
                                            @endforeach --}}
                                        </select>
                                        @error('job_sub_category')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- end form-group -->
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Offered Amount Per Hour</label>
                                    <div class="form-group">
                                        <span class="la la-naira-sign form-icon">#</span>
                                        <input class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" name="amount" type="number" placeholder="Amount">
                                        @error('amount')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Application Deadline Date</label>
                                    <div class="form-group">
                                        <span class="la la-calendar form-icon"></span>
                                        <input class="date-range form-control @error('date_end') is-invalid @enderror" value="{{ old('date_end') }}" type="date" name="date_end" value="2/25/2020">
                                        @error('date_end')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Job Description</label>
                                    <div class="form-group mb-0">
                                        <span class="la la-pencil form-icon"></span>
                                        <textarea class="message-control form-control @error('job_description') is-invalid @enderror" name="job_description" placeholder="Write your job description">{{ old('job_description') }}</textarea>
                                        @error('job_description')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-12 -->
                        </div><!-- end row -->
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
                        <div class="row">
                            <div class="col-lg-6 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">Phone Number</label>
                                    <div class="form-group">
                                        <i class="la la-phone form-icon"></i>
                                        <input class="form-control  @error('mobile') is-invalid @enderror" type="text" value="{{ old('mobile') }}" name="mobile" placeholder="Phone number">
                                        @error('mobile')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-6 column-lg-full">
                                <div class="input-box">
                                    <label class="label-text">City</label>
                                    <div class="form-group">
                                        <span class="la la-map form-icon"></span>
                                        <input class="form-control  @error('city') is-invalid @enderror" value="{{ old('city') }}" type="text" name="city" placeholder="Enter city name">
                                        @error('city')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Address</label>
                                    <div class="form-group">
                                        <span class="la la-map form-icon"></span>
                                        <input class="form-control  @error('address') is-invalid @enderror" id="autocomplete" onFocus="geolocate()" value="{{ old('address') }}" type="text" name="address" placeholder="lekki phase 1,  Lagos ">
                                        @error('address')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="input-box">
                                    <label class="label-text">Latitude</label>
                                    <div class="form-group">
                                        <span class="la la-map form-icon"></span>
                                        <input class="form-control  @error('lat') is-invalid @enderror" value="{{ old('lat') }}" type="text" name="lat" placeholder="9.081999">
                                        @error('lat')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-box">
                                    <label class="label-text">Longitude</label>
                                    <div class="form-group">
                                        <span class="la la-map form-icon"></span>
                                        <input class="form-control  @error('lag') is-invalid @enderror" value="{{ old('lag') }}" type="text" name="lag" placeholder="4.081999">
                                        @error('lag')
                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
                        </div><!-- end row -->
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
                        <input type="checkbox" id="chb1" class="@error('terms') is-invalid @enderror" name="terms" value="terms" {{ old('terms') == 'terms' ? 'checked' : '' }}>
                        <label for="chb1">By Submitting Job You Confirm That You Accept The
                            <a href="terms-and-condition.html" class="color-text">Terms & Conditions</a> And <a href="#" class="color-text">Privacy Policy</a>
                        </label>
                        @error('terms')
                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="btn-box mt-4">
                <button type="submit" class="theme-btn border-0"><i class="la la-plus"></i> Submit Your Job</button>
            </div><!-- end btn-box -->
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCj8O5LlBKBIof-MjY0TWRRwvRFgOnwwRU&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>
    <script defer src="{{ asset('js/post_job.js') }}"></script>
</form> 
@endif


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