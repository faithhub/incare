@extends('employer.layouts.app')
@section('user')    
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title line-height-45">Welcome {{Auth::user()->first_name}} {{Auth::user()->last_name}}</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="#">Home</a></li>
                <li class="active__list-item">Employers</li>
                <li>Dashboard</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row mt-5">
    <div class="col-lg-3 column-lg-6 column-md-6">
        <a href="">
            <div class="overview-item">
                <div class="icon-box bg-1 mb-0 d-flex align-items-center">
                    <div class="icon-element flex-shrink-0">
                        <i class="la la-file-text-o"></i>
                    </div><!-- end icon-element-->
                    <div class="info-content">
                        <span class="info__count">{{$job_count}}</span>
                        <h4 class="info__title font-size-16 mt-2">Job Posted</h4>
                    </div><!-- end info-content-->
                </div>
            </div>
        </a>
    </div><!-- end col-lg-3 -->
    <div class="col-lg-3 column-lg-6 column-md-6">
        <a href="">
            <div class="overview-item">
                <div class="icon-box bg-2 mb-0 d-flex align-items-center">
                    <div class="icon-element flex-shrink-0">
                        <i class="la la-file-text-o"></i>
                    </div><!-- end icon-element-->
                    <div class="info-content">
                        <span class="info__count">{{$running_job}}</span>
                        <h4 class="info__title font-size-16 mt-2">Running Jobs</h4>
                    </div><!-- end info-content-->
                </div>
            </div>
        </a>
    </div><!-- end col-lg-3 -->
    <div class="col-lg-3 column-lg-6 column-md-6">
        <a href="">
            <div class="overview-item">
                <div class="icon-box bg-3 mb-0 d-flex align-items-center">
                    <div class="icon-element flex-shrink-0">
                        <i class="la la-file-text-o"></i>
                    </div><!-- end icon-element-->
                    <div class="info-content">
                        <span class="info__count">{{$done_job}}</span>
                        <h4 class="info__title font-size-16 mt-2">Done Jobs</h4>
                    </div><!-- end info-content-->
                </div>
            </div>
        </a>
    </div><!-- end col-lg-3 -->
    <div class="col-lg-3 column-lg-6 column-md-6">
        <a href="{{ url('employer/transactions') }}">
            <div class="overview-item">
                <div class="icon-box bg-4 mb-0 d-flex align-items-center">
                    <div class="icon-element flex-shrink-0">
                        <i class="la la-money-bill"></i>
                    </div><!-- end icon-element-->
                    <div class="info-content">
                        <span class="info__count">{{$transaction}}</span>
                        <h4 class="info__title font-size-16 mt-2">Transactions</h4>
                    </div><!-- end info-content-->
                </div>
            </div>
        </a>
    </div><!-- end col-lg-3 -->
</div><!-- end row -->
<div class="row margin-top-30px">
    <div class="col-lg-12">
        <div class="dashboard-shared timeline-dashboard margin-top-30px">
            <div class="mess-dropdown">
                <div class="mess__title">
                    <img src="{{ asset('web/images/bg-title-1.jpg') }}" alt="" class="img-fluid">
                    <div class="mess__title-inner p-4">
                        <h4 class="widget-title font-size-16">
                            <i class="font-size-20 la la-bolt mr-1"></i> Last Five (5) Jobs Posted
                        </h4>
                    </div>
                </div>
                
            <div class="billing-content pb-0">
                <div class="manage-job-wrap">
                    <div class="table-responsive">
                        <table class="table" id="" width="100%">
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
                {{-- <div class="timeline-body">
                    <div class="mess__body">
                        @foreach ($jobs as $job)
                            <div class="mess__item">
                                <div class="ring-icon ring-bg-1"></div>
                                <div class="content">
                                    <img src="{{ asset('uploads/jobs/'.$job->avatar) }}" alt="" class="img-fluid" style="height: 100px">
                                    <p class="color-text-2">{{$job->job_title}}</p>
                                    <span class="time color-text-3">Applied On: {{  date('D, M j, Y \a\t g:ia', strtotime($job->created_at))}}</span><br>
                                    <span class="time color-text-3">Posted On: {{  date('D, M j, Y \a\t g:ia', strtotime($job->created_at))}}</span><br>
                                    <span class="time color-text-3">Application Closes On: {{  date('D, M j, Y \a\t g:ia', strtotime($job->date_end))}}</span><br>
                                    <a href="{{ url('employer/view-job', $job->id) }}" class="color-text btn btn-success" style="color: white !important">View</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> --}}
                <div class="mess__item border-bottom-0 text-center">
                    <a href="{{ url('employer/manage-jobs') }}" class="theme-btn border-0 w-100">View All Applied Jobs</a>
                </div><!-- end mess__item -->
            </div><!-- end mess-dropdown -->
        </div><!-- end dashboard-shared -->
    </div><!-- end col-lg-6 -->
</div><!-- end row -->
@endsection