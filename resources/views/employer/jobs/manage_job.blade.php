@extends('employer.layouts.app')
@section('user')
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title">Manage Jobs</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="index.html">Home</a></li>
                <li class="active__list-item"><a href="index.html">Dashboard</a></li>
                <li>Manage Jobs</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->

<div class="row mt-5">
    <div class="col-lg-12">
        <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0">Manage Jobs</h3>
                <div class="title-shape margin-top-10px"></div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content pb-0">
                <div class="manage-job-wrap">
                    <div class="manage-job-header mt-3 mb-5">
                        <div class="manage-job-count">
                            <span class="font-weight-medium color-text-2 mr-1">12</span>
                            <span class="font-weight-medium">job(s) Posted</span>
                        </div>
                        <div class="manage-job-count">
                            <span class="font-weight-medium color-text-2 mr-1">8</span>
                            <span class="font-weight-medium">Application(s)</span>
                        </div>
                        <div class="manage-job-count">
                            <span class="font-weight-medium color-text-2 mr-1">6</span>
                            <span class="font-weight-medium">Active Job(s)</span>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Application</th>
                                    <th>Create date</th>
                                    <th>Application Close date</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($jobs as $job)                                
                                <tr>
                                    <td>
                                        <div class="manage-candidate-wrap">
                                            <h2 class="widget-title pb-1"><a href="job-details.html" class="color-text-2">{{$job->job_title}}</a></h2>
                                            <p>
                                                <span>Category - {{$job->cat->name}}</span>
                                            </p>
                                            <p>
                                                <span>Sub Category - {{$job->sub->name}}</span>
                                            </p>
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td>2 Application(s)</td>
                                    <td>{{  date('D, M j, Y', strtotime($job->created_at))}}</td>
                                    <td>{{  date('D, M j, Y', strtotime($job->date_end))}}</td>
                                    <td><span class="badge badge-success p-1">Active</span></td>
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
        </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection