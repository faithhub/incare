@extends('employer.layouts.app')
@section('user')
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title">Job Details</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="index.html">Home</a></li>
                <li class="active__list-item"><a href="index.html">Dashboard</a></li>
                <li>Job Details</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->

<div class="row mt-5">
    <div class="col-lg-12">
        <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0">Job Details</h3>
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
                    <div class="row mb-5">
                        <div class="col-lg-12 mb-2">
                            <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
                                <div class="bread-details d-flex">
                                    <div class="bread-img flex-shrink-0">
                                        <img src="{{ asset('uploads/jobs/'.$job[0]['avatar']) }}" alt="">
                                    </div>
                                    <div class="job-detail-content">
                                        <h2 class="widget-title font-size-30 text-black pb-1">{{$job[0]['job_title']}}</h2>
                                        <p class="font-size-16 mt-1 text-black">
                                            <span class="mr-2 mb-2 d-inline-block"><i class="la la-briefcase mr-1"></i>Category: {{$job[0]['cat']['name']}}</span>
                                            <br>
                                            <span class="mr-2 mb-2 d-inline-block"><i class="la la-briefcase mr-1"></i>Sub Category: {{$job[0]['sub']['name']}}</span>
                                        </p>
                                    </div><!-- end job-detail-content -->
                                </div><!-- end bread-details -->
                                <div class="bread-action">
                                    <ul class="listing-info">
                                        {{-- <li>
                                            <button type="button" class="theme-btn mr-1"><i class="la la-heart-o font-size-16"></i> Save</button>
                                        </li>
                                        <li>
                                            <button type="button" class="theme-btn border-0">Apply Now</button>
                                        </li> --}}
                                    </ul>
                                </div><!-- end bread-action -->
                            </div><!-- end breadcrumb-content -->
                        </div>
                        <div class="col-lg-7">
                            <div class="single-job-wrap">
                                <div class="job-description padding-bottom-35px">
                                    <h2 class="widget-title">Description:</h2>
                                    <div class="title-shape"></div>
                                    <p class="mt-3 mb-3">
                                        Repeatedly dreamed alas opossum but dramatically despite expeditiously that jeepers
                                        loosely yikes that as or eel underneath kept and slept compactly far purred sure abidingly up
                                        above fitting to strident wiped set waywardly far the and pangolin horse approving paid chuckled
                                        cassowary oh above a much opposite far much hypnotically more therefore wasp less that hey apart
                                        well like while superbly orca and far hence one.Far much that one rank beheld bluebird after
                                        outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy penguin insect additionally
                                        wow absolutely crud meretriciously hastily dalmatian a glowered inset one echidna cassowary some parrot and
                                        much as goodness some froze the sullen much connected bat wonderfully on
                                        instantaneously eel valiantly petted this along across
                                        highhandedly much dog out the much alas evasively neutral lazy reset
                                    </p>
                                    <p class="mb-3">
                                        Repeatedly dreamed alas opossum but dramatically despite expeditiously that
                                        jeepers loosely yikes that as or eel underneath kept and slept compactly far purred
                                        sure abidingly up above fitting to strident wiped set waywardly far the and
                                    </p>
                                    <p>
                                        Totam rem aperiam the eaque ipsa quae abillo
                                        was inventore veritatis keret quasi aperiam architecto
                                        beatae vitae dicta sunt explicabo.
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </p>
                                </div><!-- end job-description -->
                            </div><!-- end single-job-wrap -->
                        </div><!-- end col-lg-8 -->
                        <div class="col-lg-5">
                            <div class="sidebar mt-0">
                                <div class="sidebar-widget">
                                    <div class="billing-form-item mb-0">
                                        <div class="billing-title-wrap">
                                            <h3 class="widget-title">Job Details</h3>
                                            <div class="title-shape"></div>
                                        </div><!-- billing-title-wrap -->
                                        <div class="billing-content">
                                            <div class="info-list static-info">
                                                <ul>
                                                    <li class="mb-3 d-flex align-items-center"><p><i class="la la-tint"></i> <span class="color-text-2 font-weight-medium mr-1">Job Title:</span> {{$job[0]['job_title']}}</p></li>
                                                    <li class="mb-3 d-flex align-items-center"><p><i class="la la-briefcase"></i> <span class="color-text-2 font-weight-medium mr-1">Job Category:</span> {{$job[0]['cat']['name']}}</p></li>
                                                    <li class="mb-3 d-flex align-items-center"><p><i class="la la-briefcase"></i> <span class="color-text-2 font-weight-medium mr-1">Job Sub Category:</span> {{$job[0]['sub']['name']}}</p></li>
                                                    <li class="mb-3 d-flex align-items-center"><p><i class="la la-map-marker"></i> <span class="color-text-2 font-weight-medium mr-1">City:</span> {{$job[0]['city']}}</p></li>
                                                    <li class="mb-3 d-flex align-items-center"><p><i class="la la-map-marker"></i> <span class="color-text-2 font-weight-medium mr-1">Location:</span> {{$job[0]['address']}}</p></li>
                                                    <li class="mb-3 d-flex align-items-center"><p><i class="la la-phone"></i> <span class="color-text-2 font-weight-medium mr-1">Mobile:</span> {{$job[0]['mobile']}}</p></li>
                                                    <li class="mb-3 d-flex align-items-center"><p><i class="la la-users"></i> <span class="color-text-2 font-weight-medium mr-1">Offered Amount Per Hour:</span> #{{$job[0]['amount']}}</p></li>
                                                    <li class="mb-3 d-flex align-items-center"><p><i class="la la-calendar"></i> <span class="color-text-2 font-weight-medium mr-1">Posted Date:</span> {{  date('D, M j, Y \a\t g:ia', strtotime($job[0]['created_at']))}}</p></li>
                                                    <li class="mb-3 d-flex align-items-center"><p><i class="la la-bullhorn"></i> <span class="color-text-2 font-weight-medium mr-1">Application Ends On:</span> {{  date('D, M j, Y \a\t g:ia', strtotime($job[0]['date_end']))}}</p></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end sidebar-widget -->
                            </div><!-- end sidebar -->
                        </div><!-- end col-lg-4 -->
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
                            {{-- @foreach ($job as $job)                                
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
                                                    <li class="d-inline-block"><a href="#" ><i class="la la-eye" data-toggle="tooltip" data-placement="top" title="Active"></i></a></li>
                                                    <li class="d-inline-block"><a href="#"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                                                    <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end billing-content -->
        </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection