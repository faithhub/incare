@extends('care_giver.layouts.app')
@section('care_giver')    
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title line-height-45">Welcome, Care Giver!</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="index.html">Home</a></li>
                <li class="active__list-item">Care Giver</li>
                <li>Dashboard</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row mt-5">
    <div class="col-lg-3 column-lg-6 column-md-6">
        <div class="overview-item">
            <div class="icon-box bg-1 mb-0 d-flex align-items-center">
                <div class="icon-element flex-shrink-0">
                    <i class="la la-money-bill"></i>
                </div><!-- end icon-element-->
                <div class="info-content">
                    <span class="info__count">{{$trans_count}}</span>
                    <h4 class="info__title font-size-16 mt-2">All Transaction</h4>
                </div><!-- end info-content-->
            </div>
        </div>
    </div><!-- end col-lg-3 -->
    <div class="col-lg-3 column-lg-6 column-md-6">
        <div class="overview-item">
            <div class="icon-box bg-3 mb-0 d-flex align-items-center">
                <div class="icon-element flex-shrink-0">
                    <i class="la la-file-text-o"></i>
                </div><!-- end icon-element-->
                <div class="info-content">
                    <span class="info__count">{{$job_count}}</span>
                    <h4 class="info__title font-size-16 mt-2">Applied Jobs</h4>
                </div><!-- end info-content-->
            </div>
        </div>
    </div><!-- end col-lg-3 -->
    <div class="col-lg-3 column-lg-6 column-md-6">
        <div class="overview-item">
            <div class="icon-box bg-2 mb-0 d-flex align-items-center">
                <div class="icon-element flex-shrink-0">
                    <i class="la la-file-text-o"></i>
                </div><!-- end icon-element-->
                <div class="info-content">
                    <span class="info__count">{{$approve_jobs}}</span>
                    <h4 class="info__title font-size-16 mt-2">Approved Jobs</h4>
                </div><!-- end info-content -->
            </div>
        </div>
    </div><!-- end col-lg-3 -->
    <div class="col-lg-3 column-lg-6 column-md-6">
        <div class="overview-item">
            <div class="icon-box bg-7 mb-0 d-flex align-items-center">
                <div class="icon-element flex-shrink-0">
                    <i class="la la-file-text-o"></i>
                </div><!-- end icon-element-->
                <div class="info-content">
                    <span class="info__count">{{$denied_jobs}}</span>
                    <h4 class="info__title font-size-16 mt-2">Denied Jobs</h4>
                </div><!-- end info-content -->
            </div>
        </div>
    </div><!-- end col-lg-3 -->
</div><!-- end row -->
<div class="row margin-top-30px">
    <div class="col-lg-6">
        <div class="dashboard-shared margin-top-30px">
            <div class="mess-dropdown">
                <div class="mess__title">
                    <img src="{{ asset('web/images/bg-title-2.jpg') }}" alt="" class="img-fluid">
                    <div class="mess__title-inner p-4 pb-3">
                        <h4 class="widget-title font-size-16 d-flex align-items-center">
                            <i class="font-size-20 la la-bell mr-1"></i> Last Five (5) Transactions
                        </h4>
                    </div>
                </div><!-- end mess__title -->
                <div class="mess__body" style="">
                    @foreach ($trans as $trans)
                    <a href="#" class="d-block">
                        <div class="mess__item">
                            <div class="icon-element">
                                <i class="la la-money"></i>
                            </div>
                            <div class="content">
                                <p class="text">Paid <span class="color-text" style="font-weight: bolder">₦{{$trans->amount}}</span> for <span class="color-text">{{$trans->plan->plan_name}}</span> On {{  date('D, M j, Y \a\t g:ia', strtotime($trans->created_at))}}, <br>with Reference Number <span class="time">{{$trans->reference}}</span></p>
                            </div>
                        </div><!-- end mess__item -->
                    </a>                        
                    @endforeach
                </div><!-- end mess__body -->
                <div class="mess__item border-bottom-0 text-center">
                    <a href="{{ url('care-giver/transactions') }}" class="theme-btn w-100">View All Transactions</a>
                </div><!-- end mess__item -->
            </div><!-- end mess-dropdown -->
        </div><!-- end dashboard-shared -->
    </div><!-- end col-lg-6 -->
    <div class="col-lg-6">
        <div class="dashboard-shared timeline-dashboard margin-top-30px">
            <div class="mess-dropdown">
                <div class="mess__title">
                    <img src="{{ asset('web/images/bg-title-1.jpg') }}" alt="" class="img-fluid">
                    <div class="mess__title-inner p-4">
                        <h4 class="widget-title font-size-16">
                            <i class="font-size-20 la la-bolt mr-1"></i> Last Five (5) Applied Jobs
                        </h4>
                    </div>
                </div>
                <div class="timeline-body">
                    <div class="mess__body">
                        @foreach ($jobs as $job)
                            <div class="mess__item">
                                <div class="ring-icon ring-bg-1"></div>
                                <div class="content">
                                    <img src="{{ asset('uploads/jobs/'.$job->job->avatar) }}" alt="" class="img-fluid" style="height: 100px">
                                    <p class="color-text-2">{{$job->job->job_title}}</p>
                                    <span class="time color-text-3">Status: {{$job->status}}</span><br>
                                    <span class="time color-text-3">Applied On: {{  date('D, M j, Y \a\t g:ia', strtotime($job->created_at))}}</span><br>
                                    <span class="time color-text-3">Posted On: {{  date('D, M j, Y \a\t g:ia', strtotime($job->job->created_at))}}</span><br>
                                    <span class="time color-text-3">Application Closes On: {{  date('D, M j, Y \a\t g:ia', strtotime($job->job->date_end))}}</span><br>
                                    <a href="{{ url('care-giver/view-job', $job->job->id) }}" class="color-text btn btn-success" style="color: white !important">View</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mess__item border-bottom-0 text-center">
                    <a href="{{ url('care-giver/applied-jobs') }}" class="theme-btn border-0 w-100">View All Applied Jobs</a>
                </div><!-- end mess__item -->
            </div><!-- end mess-dropdown -->
        </div><!-- end dashboard-shared -->
    </div><!-- end col-lg-6 -->
</div><!-- end row -->
@endsection