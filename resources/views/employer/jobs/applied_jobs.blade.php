@extends('employer.layouts.app')
@section('user')

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
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Alert Details</th>
                                <th>Email Frequency</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="manage-candidate-wrap">
                                            <h2 class="widget-title pb-1 font-size-17">Director</h2>
                                            <p class="font-size-14">
                                                <span class="font-weight-medium">Search Keywords:</span>
                                                2, 60, Toronto ON Canada
                                            </p>
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td>Never</td>
                                    <td class="text-center">
                                        <div class="manage-candidate-wrap">
                                            <div class="bread-action pt-0">
                                                <ul class="info-list">
                                                    <li class="d-inline-block"><a href="#"><i class="la la-eye" data-toggle="tooltip" data-placement="top" title="View"></i></a></li>
                                                    <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="manage-candidate-wrap">
                                            <h2 class="widget-title pb-1 font-size-17">rtalbedge</h2>
                                            <p class="font-size-14">
                                                <span class="font-weight-medium">Search Keywords:</span>
                                                 United States
                                            </p>
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td>Never</td>
                                    <td class="text-center">
                                        <div class="manage-candidate-wrap">
                                            <div class="bread-action pt-0">
                                                <ul class="info-list">
                                                    <li class="d-inline-block"><a href="#"><i class="la la-eye" data-toggle="tooltip" data-placement="top" title="View"></i></a></li>
                                                    <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="manage-candidate-wrap">
                                            <h2 class="widget-title pb-1 font-size-17">Engineer</h2>
                                            <p class="font-size-14">
                                                <span class="font-weight-medium">Search Keywords:</span>
                                                engineer, United Kingdom
                                            </p>
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td>Never</td>
                                    <td class="text-center">
                                        <div class="manage-candidate-wrap">
                                            <div class="bread-action pt-0">
                                                <ul class="info-list">
                                                    <li class="d-inline-block"><a href="#"><i class="la la-eye" data-toggle="tooltip" data-placement="top" title="View"></i></a></li>
                                                    <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="manage-candidate-wrap">
                                            <h2 class="widget-title pb-1 font-size-17">Database Alert</h2>
                                            <p class="font-size-14">
                                                <span class="font-weight-medium">Search Keywords:</span>
                                                database
                                            </p>
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td>Never</td>
                                    <td class="text-center">
                                        <div class="manage-candidate-wrap">
                                            <div class="bread-action pt-0">
                                                <ul class="info-list">
                                                    <li class="d-inline-block"><a href="#"><i class="la la-eye" data-toggle="tooltip" data-placement="top" title="View"></i></a></li>
                                                    <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end billing-content -->
        </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection