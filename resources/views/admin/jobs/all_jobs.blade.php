@extends('admin.layouts.app')
@section('admin')

<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title">Job Alerts</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="index.html">Home</a></li>
                <li class="active__list-item"><a href="index.html">Dashboard</a></li>
                <li>Job Alerts</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0">Job Alerts</h3>
                <div class="title-shape margin-top-10px"></div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content pb-0">
                <div class="manage-job-wrap">
                    <div class="table-responsive">
                        <table class="table" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Employer Details</th>
                                    <th>Job Details</th>
                                    <th>Amount/Hour</th>
                                    <th>Create On</th>
                                    <th>Application Close On</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($jobs as $job)                                
                                <tr>
                                    <td>
                                        <div class="bread-details d-flex">
                                            <div class="bread-img flex-shrink-0">
                                                <a class="d-block">
                                                    <img src="{{ asset('uploads/profile_pictures/'.$job->user->avatar) }}" alt="" style="max-width: auto; height: 100px;">
                                                </a>
                                            </div>
                                            <div class="manage-candidate-content">
                                                <h2 class="widget-title pb-2"><a class="color-text-2">{{$job->user->first_name}} {{$job->user->last_name}}</a></h2>
                                                <p class="font-size-15">
                                                    <span class="mr-2">{{$job->user->email}}</span><br>
                                                    <span class="mr-2">{{$job->user->mobile}}</span>
                                                </p>
                                            </div><!-- end manage-candidate-content -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="bread-details d-flex">
                                            <div class="bread-img flex-shrink-0">
                                                <a class="d-block">
                                                    <img src="{{ asset('uploads/jobs/'.$job->avatar) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="manage-candidate-content">
                                                <h2 class="widget-title pb-2"><a class="color-text-2">{{$job->job_title}}</a></h2>
                                                <p class="font-size-15">
                                                    <span class="mr-2"><i class="la la-meetup mr-1"></i>Category - {{$job->cat->name}}</span><br>
                                                    <span class="mr-2"><i class="la la-meetup mr-1"></i>Sub Category - {{$job->sub->name}}</span>
                                                </p>
                                            </div><!-- end manage-candidate-content -->
                                        </div>
                                    </td>
                                    <td>₦{{$job->amount}}</td>
                                    <td>{{  date('D, M j, Y', strtotime($job->created_at))}}</td>
                                    <td>{{  date('D, M j, Y', strtotime($job->date_end))}}</td>
                                    <td class="text-center">
                                        <div class="manage-candidate-wrap">
                                            <div class="bread-action pt-0">
                                                <ul class="info-list">
                                                    <li class="d-inline-block"><a href="{{ url('admin/view-job', $job->id) }}" ><i class="la la-eye" data-toggle="tooltip" data-placement="top" title="View"></i></a></li>
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
            </div><!-- end billing-content -->
        </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection