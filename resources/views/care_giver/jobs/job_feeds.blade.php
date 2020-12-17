@extends('care_giver.layouts.app')
@section('care_giver')
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title">Job Feeds</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="#">Home</a></li>
                <li class="active__list-item"><a href="#">Dashboard</a></li>
                <li>Job Feeds</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->

<div class="row mt-2">
    <div class="col-lg-12">        
      <div class="col-lg-12">
        <div class="jobs-wrapper">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade active show" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
              <div class="job-content">
                @if (isset($jobs) && $jobs->count() > 0)                    
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
                            <span>₦{{$job->amount}}/hr</span>
                          </p>
                        </div>
                      </div>
                      <div class="btn-box">
                        <a href="{{ url('job-details', $job->id) }}" class="theme-btn">Job Details</a>
                      </div>
                    </div>
                  </div><!-- end job-card -->
                @endforeach
                @else                    
                  <div class="text-center mb-4 mt-3">
                      <h2 class="text-black" style="color: black; font-family: Georgia, 'Times New Roman', Times, serif">No New Job yet, Check back later</h2>
                  </div>
                @endif
              </div><!-- end job-content -->
            </div><!-- end tab-pane -->
          </div><!-- end tab-content -->
        </div><!-- end jobs-wrapper -->
      </div><!-- end col-lg-9 -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection