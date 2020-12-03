@extends('care_giver.layouts.app')
@section('care_giver')
<div class="row">
  <div class="col-lg-12">
    <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
      <div class="section-heading">
        <h2 class="sec__title">Running Job</h2>
      </div><!-- end section-heading -->
      <ul class="list-items d-flex align-items-center">
        <li class="active__list-item"><a href="#">Home</a></li>
        <li class="active__list-item"><a href="#">Dashboard</a></li>
        <li>Running Job</li>
      </ul>
    </div><!-- end breadcrumb-content -->
  </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0">Running Job</h3>
                <div class="title-shape margin-top-10px"></div>
            </div><!-- billing-title-wrap -->
            @if ($jobs->count() == 0)
                <div class="text-center mb-3 mt-2">
                    <h2 style="color: black; font-family: Georgia, 'Times New Roman', Times, serif">No Running Job yet</h2>
                </div>                
            @else
            <div class="billing-content pb-0">
                <div class="manage-job-wrap">                    
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
                                        <img class="img-fluid" alt="" src="{{ asset('uploads/jobs/'.$job->job->avatar) }}" style="width: 200px; height: 150px;">
                                    </td>
                                    <td>                                        
                                        <div class="manage-candidate-wrap">
                                            <h2 class="widget-title pb-1" style="font-size: 28px"><a href="#" class="color-text-2">{{$job->job->job_title}}</a></h2>
                                            <p>
                                                <span><i class="la la-meetup mr-1"></i>Posted On: <b style="color: black">{{  date('D, M j, Y', strtotime($job->created_at))}}</b></span>
                                            </p>
                                            <p>
                                                <span><i class="la la-meetup mr-1"></i>Closes On: <b style="color: black">{{  date('D, M j, Y', strtotime($job->job->date_end))}}</b></span>
                                            </p>
                                            <p>
                                                <span><i class="la la-meetup mr-1"></i>Applied On: <b style="color: black">{{  date('D, M j, Y', strtotime($job->job->created_at))}}</b></span>
                                            </p>
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td>
                                        @if ($job->status == 'Approved')
                                            <span class="badge badge-success p-1">{{$job->status}}</span>                                            
                                        @elseif ($job->status == 'Denied')
                                        <span class="badge badge-danger p-1">{{$job->status}}</span>
                                        @else
                                        <span class="badge badge-warning p-1">{{$job->status}}</span>                                            
                                        @endif
                                    </td>
                                    <td><span class="text-success"><b>₦{{$job->job->amount}}</b></span></td>                                    
                                    <td class="text-center">
                                        <div class="manage-candidate-wrap">
                                            <div class="bread-action pt-0">
                                                <ul class="info-list">
                                                    <li class="d-inline-block"><a href="{{ url('care-giver/view-job', $job->job->id) }}"><i class="la la-eye" data-toggle="tooltip" data-placement="top" title="View"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div><!-- end billing-content -->
@endsection