@extends('employer.layouts.app')
@section('user')
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
        {{-- <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0">Job Feeds</h3>
                <div class="title-shape margin-top-10px"></div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content pb-0">
                <div class="manage-job-wrap">
                    <div class="table-responsive">
                        <table class="table" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Job Details</th>
                                    <th>Amount/Hour</th>
                                    <th>Create On</th>
                                    <th>Application Close On</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($jobs as $job)                                
                                <tr>
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
                                                    <span class="mr-2"><i class="la la-meetup mr-1"></i>Sub Category - {{$job->sub->name}}</span>
                                                </p>
                                            </div><!-- end manage-candidate-content -->
                                        </div>
                                    </td>
                                    <td><span class="text-success">₦{{$job->amount}}</span></td>
                                    <td>{{  date('D, M j, Y', strtotime($job->created_at))}}</td>
                                    <td>{{  date('D, M j, Y', strtotime($job->date_end))}}</td>
                                    <td>
                                        @if ($job->status == 'Active')
                                        <span class="badge badge-success p-1">{{$job->status}}</span>
                                        @elseif ($job->status == 'Blocked')
                                        <span class="badge badge-danger p-1">{{$job->status}}</span> 
                                        @elseif ($job->status == 'Delivered')
                                            <span class="badge badge-success p-1">{{$job->status}}</span> 
                                        @else
                                        <span class="badge badge-warning p-1">{{$job->status}}</span>                                            
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="manage-candidate-wrap">
                                            <div class="bread-action pt-0">
                                                <ul class="info-list">
                                                    <li class="d-inline-block"><a href="{{ url('employer/view-job', $job->id) }}" ><i class="la la-eye" data-toggle="tooltip" data-placement="top" title="View"></i></a></li>
                                                    <li class="d-inline-block"><a href="{{ url('employer/edit-job', $job->id) }}"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                                                    <li class="d-inline-block"><a href="#"><i data-toggle="modal" data-target="#delete{{$job->id}}" class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Modal Delete -->
                                <div class="modal fade" id="delete{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body mt-2 mb-2 text-center">
                                            <h2>Are you sure you want to delete?</h2>
                                        <form method="POST" action="{{ url('employer/delete-job') }}">
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
                </div>
            </div><!-- end billing-content -->
        </div><!-- end billing-form-item --> --}}
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection