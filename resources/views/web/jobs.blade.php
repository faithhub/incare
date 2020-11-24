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
              <h2 class="sec__title mb-0">Jobs</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
              <li class="active__list-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="active__list-item">Jobs</li>
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
<section class="card-area padding-top-100px padding-bottom-100px">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="sidebar mt-0">
         <form method="POST" action="{{ url('search-job') }}">
           @csrf
          <div class="sidebar-widget">
            <h3 class="widget-title">Job Title</h3>
            <div class="contact-form-action mb-4">
                <div class="form-group">
                  <span class="la la-search form-icon"></span>
                  <input class="form-control" type="text" name="job_title" placeholder="Job title, keywords">
                </div>
            </div>
            <div class="sidebar-option mb-4">
              <h3 class="widget-title">Category</h3>
              <select class="category-option-field select2-hidden-accessible" name="category" data-select2-id="4" tabindex="-1" aria-hidden="true">
                <option value="" data-select2-id="6">Select a category</option>
                @foreach ($cats as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>                    
                @endforeach
              </select>
              <!-- <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 182px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ftfq-container"><span class="select2-selection__rendered" id="select2-ftfq-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select category</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
            </div><!-- end sidebar-option -->
            <div class="sidebar-option mb-4">
              <h3 class="widget-title">Sub Category</h3>
              <select class="category-option-field select2-hidden-accessible" name="sub_category" data-select2-id="7" tabindex="-1" aria-hidden="true">
                <option value="" data-select2-id="8">Select a category</option>
                @foreach ($subs as $sub)
                <option value="{{$sub->id}}">{{$sub->name}}</option>                    
                @endforeach
              </select>
              <!-- <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 182px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ftfq-container"><span class="select2-selection__rendered" id="select2-ftfq-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select category</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
            </div><!-- end sidebar-option -->
            <div class="sidebar-widget">
              <h3 class="widget-title">Location</h3>
              <div class="contact-form-action mb-4">
                  <div class="form-group">
                    <span class="la la-address-book form-icon"></span>
                    <input class="form-control" type="text" id="autocomplete" onFocus="geolocate()" name="address" placeholder="Lagos, Nigeria">
                  </div>
              </div>
            </div>
            
            <div class="sidebar-option">
              <button type="submit" class="btn btn-success p-3">Search Job</button>
            </div>
          </div><!-- end sidebar-widget -->
         </form>
        </div><!-- end sidebar -->
      </div><!-- end col-lg-3 -->
      <div class="col-lg-9">
        <div class="jobs-wrapper">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade active show" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
              <div class="job-content">
                  @foreach ($jobs as $job)
                    <div class="job-card job-card-layout">
                      <div class="job-card-details d-flex align-items-center justify-content-between">
                        <div class="card-head d-flex align-items-center">
                          <div class="company-avatar mr-3">
                            <a href="{{ url('job-details', $job->id) }}" class="d-block">
                              <img src="{{ asset('uploads/jobs/'.$job->avatar) }}" alt="" class="img-fluid">
                            </a>
                          </div>
                          <div class="company-title-box">
                            <p class="card-sub mb-1 font-weight-medium">{{$job->created_at->diffForHumans()}}</p>
                            <h4 class="card-title mb-1"><a href="{{ url('job-details', $job->id) }}"> {{$job->job_title}}</a> </h4>
                            <p class="card-sub">
                              <span class="mr-2"><i class="la la-building-o color-text-2"></i> {{$job->cat->name}} - {{$job->sub->name}}</span>
                              <span class="mr-2"><i class="la la-map-marker color-text-2"></i> {{$job->address}}</span>
                              <span class="mr-2"><i class="la la-clock-o color-text-2"></i> </span>
                              <span>#{{$job->amount}}/hr</span>
                            </p>
                          </div>
                        </div>
                        <div class="btn-box">
                          <a href="{{ url('job-details', $job->id) }}" class="theme-btn">Job Details</a>
                        </div>
                      </div>
                    </div><!-- end job-card -->
                  @endforeach
              </div><!-- end job-content -->
            </div><!-- end tab-pane -->
          </div><!-- end tab-content -->
        </div><!-- end jobs-wrapper -->
      </div><!-- end col-lg-9 -->
    </div><!-- end row -->
  </div><!-- end container -->
</section>


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