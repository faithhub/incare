@extends('care_giver.layouts.app')
@section('care_giver')
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title">Latest Posted Jobs</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="#">Home</a></li>
                <li class="active__list-item"><a href="#">Dashboard</a></li>
                <li>Latest Posted Jobs</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->

<div class="row mt-5">
    <div class="col-lg-12">
        <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0">Latest Posted Jobs</h3>
                <div class="title-shape margin-top-10px"></div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content pb-0">
                <div class="manage-job-wrap">
                    <form method="POST" action="{{ url('care-giver/search-job') }}">
                        @csrf
                        <div class="row col-12">
                            <div class="col-lg-3 col-md-4">
                                <div class="manage-job-count">                            
                                    <div class="sidebar-widget">
                                        <h3 class="widget-title">Job Title</h3>
                                        <div class="contact-form-action mb-4">
                                            <div class="form-group">
                                                <span class="la la-search form-icon"></span>
                                                <input class="form-control" type="text" name="job_title" placeholder="Job title, keywords">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="manage-job-count">                            
                                    <div class="sidebar-option">
                                        <h3 class="widget-title">Category</h3>
                                        <select class="category-option-field select2-hidden-accessible" name="category" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                            <option value="" data-select2-id="6">Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>                                                
                                            @endforeach
                                        </select>
                                    </div><!-- end sidebar-option -->
                                </div>
                            </div>                        
                            <div class="col-lg-3 col-md-4">
                                <div class="manage-job-count">                            
                                    <div class="sidebar-option">
                                        <h3 class="widget-title">Sub Category</h3>
                                        <select class="category-option-field" name="sub_category" tabindex="-1" aria-hidden="true">
                                            <option value="" data-select2-id="6">Select a Sub category</option>
                                            @foreach ($sub_categories as $sub_category)
                                                <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>                                                
                                            @endforeach
                                        </select>
                                    </div><!-- end sidebar-option -->
                                </div>
                            </div>                        
                            <div class="col-lg-3 col-md-4">
                                <div class="manage-job-count">                            
                                    <div class="sidebar-widget">
                                        <h3 class="widget-title">Location</h3>
                                        <div class="contact-form-action mb-4">
                                            <div class="form-group">
                                                <span class="la la-location-arrow form-icon"></span>
                                                <input class="form-control" type="text" id="autocomplete" onFocus="geolocate()" name="address" placeholder="Lagos, Nigeria">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                            <div class="col-lg-3 col-md-4">
                                <div class="mt-3 mb-3">
                                    <button class="btn btn-success p-3" type="submit">Search Job</button>
                                </div>
                            </div>                       
                        </div>   
                    </form>                        
                </div>
                    @if (isset($mode) && $mode == 'Search')
                    @if ($results->count() > 0)
                        <div class="text-center mb-2">
                            <h2>Search Result</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="myTable" width="100%">
                                <thead>
                                    <tr>
                                        {{-- <th>Job Picture</th> --}}
                                        <th>Job Title</th>
                                        <th>Status</th>
                                        <th>Amount / Hour</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($results as $job)                                
                                    <tr>
                                        {{-- <td>                                        
                                            <img class="img-fluid" alt="" src="{{ asset('uploads/jobs/'.$job->avatar) }}" style="width: 200px; height: 150px;">
                                        </td> --}}
                                        <td>
                                            <div class="bread-details d-flex">
                                                <div class="bread-img flex-shrink-0">
                                                    <a href="#" class="d-block">
                                                        <img src="{{ asset('uploads/jobs/'.$job->avatar) }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="manage-candidate-content">
                                                    <h2 class="widget-title pb-2"><a href="#" class="color-text-2">{{$job->job_title}}</a></h2>
                                                    <p class="font-size-15">
                                                        <span class="mr-2"><i class="la la-meetup mr-1"></i>Category - {{$job->cat->name}}</span><br>
                                                        <span class="mr-2"><i class="la la-meetup mr-1"></i>Sub Category - {{$job->sub->name}}</span><br>
                                                        <span class="mr-2"><i class="la la-meetup mr-1"></i>Posted On:{{  date('D, M j, Y', strtotime($job->created_at))}}</span><br>
                                                        <span class="mr-2"><i class="la la-meetup mr-1"></i>Closes On:{{  date('D, M j, Y', strtotime($job->date_end))}}</span>
                                                    </p>
                                                </div><!-- end manage-candidate-content -->
                                            </div>
                                        </td>
                                        <td>
                                            @if ($job->status == 'Active')
                                                <span class="badge badge-success p-1">{{$job->status}}</span>                                            
                                            @elseif ($job->status == 'Blocked')
                                            <span class="badge badge-danger p-1">{{$job->status}}</span>
                                            @else
                                            <span class="badge badge-warning p-1">{{$job->status}}</span>                                            
                                            @endif
                                        </td>
                                        {{-- <td>2 Application(s)</td> --}}
                                        <td><span class="text-success"><b>₦{{$job->amount}}</b></span></td>
                                        <td>
                                            <a href="{{ url('care-giver/view-job', $job->id) }}" class="btn theme-btn">View</a>
                                        </td>
                                    </tr>                                
                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Search Job</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>                                
                                            <div class="modal-body">
                                            <form method="POST" action="{{ url('employer/delete-job') }}">
                                                <div class="form-group">
                                                    <label>Job Title</label>
                                                    <input class="form-control" type="text" placeholder="Job title, keywords">
                                                </div>                                            
                                                <div class="form-group">
                                                    <label>Job Category</label>
                                                    <input class="form-control" type="text" placeholder="Job title, keywords">
                                                </div>
                                                <div class="form-group">
                                                    <label>Job Address/Area</label>
                                                    <input class="form-control" type="text" placeholder="Job title, keywords">
                                                </div>
                                                @csrf                                                        
                                                <input type="hidden" name="id" value="{{ $job->id }}">
                                                <button type="submit" class="btn btn-success m-2">Yes</button> 
                                                <button type="button" class="btn btn-dark m-2" data-dismiss="modal" aria-label="Close">No</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center mb-2">
                            <h2>No Result Found</h2>
                        </div>
                    @endif
                    @else
                    @if ($jobs->count() > 0)
                        <div class="table-responsive">
                            <table class="table" id="myTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>Job Picture</th>
                                        <th>Job Title</th>
                                        <th>Status</th>
                                        <th>Amount / Hour</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($jobs as $job)                            
                                    <tr>
                                        <td>                                        
                                            <img class="img-fluid" alt="" src="{{ asset('uploads/jobs/'.$job->avatar) }}" style="width: 200px; height: 150px;">
                                        </td>
                                        <td>
                                           
                                            <div class="manage-candidate-content">
                                                <h2 class="widget-title pb-2"><a href="#" class="color-text-2">{{$job->job_title}}</a></h2>
                                                <p class="font-size-15">
                                                    <span class="mr-2"><i class="la la-meetup mr-1"></i>Category - {{$job->cat->name}}</span><br>
                                                    <span class="mr-2"><i class="la la-meetup mr-1"></i>Sub Category - {{$job->sub->name}}</span><br>
                                                    <span class="mr-2"><i class="la la-meetup mr-1"></i>Posted On:{{  date('D, M j, Y', strtotime($job->created_at))}}</span><br>
                                                    <span class="mr-2"><i class="la la-meetup mr-1"></i>Closes On:{{  date('D, M j, Y', strtotime($job->date_end))}}</span>
                                                </p>
                                            </div><!-- end manage-candidate-content -->
                                        </td>
                                        <td>
                                            @if ($job->status == 'Active')
                                                <span class="badge badge-success p-1">{{$job->status}}</span>                                            
                                            @elseif ($job->status == 'Blocked')
                                            <span class="badge badge-danger p-1">{{$job->status}}</span>
                                            @else
                                            <span class="badge badge-warning p-1">{{$job->status}}</span>                                            
                                            @endif
                                        </td>
                                        {{-- <td>2 Application(s)</td> --}}
                                        <td><span class="text-success">₦{{$job->amount}}</span></td>
                                        <td>
                                            <a href="{{ url('care-giver/view-job', $job->id) }}" class="btn theme-btn">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center mb-4 mt-3">
                            <h2 class="text-black" style="color: black; font-family: Georgia, 'Times New Roman', Times, serif">No New Job yet, Check back later</h2>
                        </div>
                    @endif
                    @endif
                </div>
            </div><!-- end billing-content -->
        </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->


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