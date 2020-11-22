@extends('care_giver.layouts.app')
@section('care_giver')
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
                                    <th>Job Picture</th>
                                    <th>Job Title</th>
                                    <th>Status</th>
                                    <th>Applied On</th>
                                    <th>Posted On</th>
                                    <th>Application Close On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($jobs as $job)                            
                                <tr>
                                    <td>      
                                        <img class="img-fluid" alt="" src="{{ asset('uploads/jobs/'.$job->job->avatar) }}" style="width: 150px; height: auto;">
                                    </td>
                                    <td>
                                        <div class="manage-candidate-wrap">
                                            <h2 class="widget-title pb-1" style="font-size: 28px"><a href="job-details.html" class="color-text-2">{{$job->job->job_title}}</a></h2>
                                            {{-- <p>
                                                <span>Category: <b style="color: black">{{$job->name}}</b></span>
                                            </p>
                                            <p>
                                                <span>Sub Category: <b style="color: black">{{$job->name}}</b></span>
                                            </p> --}}
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td>
                                        @if ($job->status == 'Approved')
                                            <span class="badge badge-success p-1">{{$job->status}}</span>                                            
                                        @else
                                        <span class="badge badge-warning p-1">{{$job->status}}</span>                                            
                                        @endif
                                    </td>
                                    <td>{{  date('D, M j, Y', strtotime($job->created_at))}}</td>
                                    <td>{{  date('D, M j, Y', strtotime($job->job->created_at))}}</td>
                                    <td>{{  date('D, M j, Y', strtotime($job->job->date_end))}}</td>
                                    
                                    <td class="text-center">
                                        <div class="manage-candidate-wrap">
                                            <div class="bread-action pt-0">
                                                <ul class="info-list">
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
                                            <h2 style="color: black">Are you sure you want to delete?</h2>
                                        <form method="POST" action="{{ url('care-giver/delete-job') }}">
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
        </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection