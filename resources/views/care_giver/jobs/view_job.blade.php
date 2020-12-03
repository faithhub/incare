@extends('care_giver.layouts.app')
@section('care_giver')
<div class="row">
  <div class="col-lg-12">
    <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
      <div class="section-heading">
        <h2 class="sec__title">Job Details</h2>
      </div><!-- end section-heading -->
      <ul class="list-items d-flex align-items-center">
        <li class="active__list-item"><a href="#">Home</a></li>
        <li class="active__list-item"><a href="#">Dashboard</a></li>
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
          @if ($job_apply->count() > 0)
          @if ($job_apply[0]['status'] == 'Approved')
          <h3 class="widget-title font-size-30 text-black pb-1 mb-2">Start Work Now</h3>
          <div class="text-right">
            <div class="bread-action">
              <ul class="info-list">
                <li class="d-inline-block mb-0">
                  @if ($job[0]['status'] == 'Delivered')
                  <button disabled style="cursor: no-drop" class="btn btn-success mb-2">Start Work</button>
                  @else
                  <form method="POST" action="{{ url('care-giver/start-job') }}">
                    @csrf
                    <input type="hidden" name="employer_id" value="{{ $job[0]['employer_id'] }}">
                    <input type="hidden" name="job_id" value="{{ $job[0]['id'] }}">
                    <input type="hidden" name="amount" value="{{ $job[0]['amount'] }}">
                    <button type="submit" class="btn btn-success mb-2">Start Work</button>
                  </form>
                  @endif
                </li>
                <li class="d-inline-block mb-0">
                  @if ($job[0]['status'] == 'Delivered')
                  <button disabled style="cursor: no-drop" class="btn btn-success mb-2">Delivered</button>
                  @else
                  <form method="POST" action="{{ url('care-giver/deliver-work') }}">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job[0]['id'] }}">
                    <button type="submit" class="btn btn-success mb-2">Deliver Work</button>
                  </form>
                  @endif
                </li>
              </ul>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col-12">
              @if ($job_start->count() > 0)
              <div class="manage-candidate-wrap pb-4">
                <div class="bread-details d-flex">
                  <div class="table-responsive">
                    <table class="table" width="100%">
                      <thead>
                        <td>S/N</td>
                        <td>Time Started</td>
                        <td>End Wort At</td>
                        <td>Working Hours Used</td>
                        <td>Amount Worked</td>
                        <td>Payment Status</td>
                        <td>Stop Work</td>
                        <td>Cancel Work</td>
                      </thead>
                      <tbody>
                        @foreach ($job_start as $start)
                        <tr class="text-center">
                          <td>{{$sn++}}</td>
                          <td>{{ date('D, M j, Y \a\t h:i:s A', strtotime($start->created_at))}}</td>
                          <td>
                            @if ($start->done == 'Yes')
                            {{ date('D, M j, Y \a\t h:i:s A', strtotime($start->date_end))}}
                            @else
                            <span class="btn-sm btn-success">Running</span>
                            @endif
                          </td>
                          <td>
                            @if ($start->done == 'Yes')
                            {{ date('H:i:s', $start->created_at->diffInSeconds($start->date_end))}}
                            @else
                            <span class="btn-sm btn-success">Running</span>
                            @endif
                          </td>
                          <td>
                            @if ($start->done == 'Yes')
                            ₦{{$start->amount_worked}}
                            @else
                            <span class="btn-sm btn-success">Running</span>
                            @endif
                          </td>
                          <td>
                            @if ($start->done == 'Yes')
                            @if ($start->paid == 'Yes')
                            <span class="btn-sm btn-success">Paid</span>
                            @else
                            <span class="btn-sm btn-warning">Not Paid</span>
                            @endif
                            @else
                            <span class="btn-sm btn-success">Running</span>
                            @endif
                          </td>
                          <td>
                            @if ($start->done == 'Yes')
                            <button disabled style="cursor: no-drop" class="btn btn-sm btn-danger mb-1">Work Ended</button><br>
                            @else
                            <form method="POST" action="{{ url('care-giver/end-job') }}">
                              @csrf
                              <input type="hidden" name="employer_id" value="{{ $job[0]['employer_id'] }}">
                              <input type="hidden" name="job_id" value="{{ $job[0]['id'] }}">
                              <input type="hidden" name="amount" value="{{ $job[0]['amount'] }}">
                              <input type="hidden" name="id" value="{{ $start->id }}">
                              <button type="submit" class="btn btn-sm btn-danger mb-1">End Work</button><br>
                            </form>
                            @endif
                          </td>
                          <td>
                            <div class="manage-candidate-wrap">
                              <div class="bread-action pt-0">
                                <ul class="info-list">
                                  <li class="d-inline-block"><a href="#"><i data-toggle="modal" data-target="#delete-work-history{{$start->id}}" class="la la-trash" data-toggle="tooltip" data-placement="top" title="Delete Work"></i></a></li>
                                </ul>
                              </div>
                            </div>
                          </td>
                        </tr>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="delete-work-history{{$start->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-body mt-2 mb-2 text-center">
                                <h3 style="color: black">Are you sure you want to delete this work history?</h3>
                                <form method="POST" action="{{ url('care-giver/delete-work-done') }}">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $start->id }}">
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
              </div>
              @else
              @endif
            </div>
          </div>
          @endif
          @endif
          <div class="card mt-4">
            <div class="card-header">
              Reviews
            </div>
            <div class="card-body">
              @if($reviews->count() > 0)
              @else
              <form method="POST" action="{{ url('care_giver/review') }}">
                @csrf
                <input type="text" name="employer_id" value="{{$user->id}}" hidden>
                <input type="text" name="job" value="{{$job[0]->id}}" hidden>
                <div class="form-group">
                  <textarea name="review" id="" class="form-control" cols="30" rows="5"></textarea>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-success">Send</button>
                </div>
              </form>
              @endif
              <!-- @foreach ($reviews as $review)
                  @if($review->employer_id == Auth::User()->id)
                  <div class="media mb-4">
                    <div class="media-left media-middle">
                      <a href="#">
                        <img class="media-object mr-3" style="width: auto; height: 50px;" src="{{ Auth::User()->avatar != null ? asset('uploads/profile_pictures/'.Auth::User()->avatar) : asset('web/images/avatar.png') }}" alt="{{Auth::User()->first_name}}">
                      </a>
                    </div>
                    <div class="media-body">
                      <h5 class="media-heading">{{Auth::User()->first_name}} {{Auth::User()->last_name}}</h5>
                      <p>{{$review->review}}</p>
                      <small><i>{{ $review->created_at->diffForHumans() }}</i></small>
                    </div>
                  </div>
                  @else
                  <div class="media mb-4">
                    <div class="media-left media-middle">
                      <a href="#">
                        <img class="media-object mr-3" style="width: auto; height: 50px;" src="{{ $user->avatar != null ? asset('uploads/profile_pictures/'.$user->avatar) : asset('web/images/avatar.png') }}" alt="{{$user->first_name}}" alt="{{$user->first_name}}">
                      </a>
                    </div>
                    <div class="media-body">
                      <h5 class="media-heading">{{$user->first_name}} {{$user->last_name}} </h5>
                      <p>{{$review->review}}</p>
                      <small><i>{{ $review->created_at->diffForHumans() }}</i></small>
                    </div>
                  </div>
                  @endif
                  @endforeach -->
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
                                        </li> --}}
                    <li>
                      @if ($check > 0)
                      <button type="button" disabled class="btn border-0 p-3 btn-success" style="cursor: no-drop">Applied</button>
                      @else
                      <form method="POST" action="{{ url('care-giver/apply-job') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$job[0]['id']}}">
                        <button type="submit" class="btn border-0 p-3 btn-success">Apply Now</button>
                      </form>
                      @endif

                    </li>
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
                    {{$job[0]['job_description']}}
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
                          @if ($job_apply->count() > 0)
                          <li class="mb-3 d-flex align-items-center">
                            <p><i class="la la-tint"></i> <span class="color-text-2 font-weight-medium mr-1">Job Status:</span>
                              @if ($job_apply[0]['status'] == 'Approved')
                              <span class="badge badge-success p-1">{{$job_apply[0]['status']}}</span>
                              @elseif ($job_apply[0]['status'] == 'Denied')
                              <span class="badge badge-danger p-1">{{$job_apply[0]['status']}}</span>
                              @else
                              <span class="badge badge-warning p-1">{{$job_apply[0]['status']}}</span>
                              @endif
                            </p>
                          </li>
                          @endif
                          <li class="mb-3 d-flex align-items-center">
                            <p><i class="la la-tint"></i> <span class="color-text-2 font-weight-medium mr-1">Job Title:</span> {{$job[0]['job_title']}}</p>
                          </li>
                          <li class="mb-3 d-flex align-items-center">
                            <p><i class="la la-briefcase"></i> <span class="color-text-2 font-weight-medium mr-1">Job Category:</span> {{$job[0]['cat']['name']}}</p>
                          </li>
                          <li class="mb-3 d-flex align-items-center">
                            <p><i class="la la-briefcase"></i> <span class="color-text-2 font-weight-medium mr-1">Job Sub Category:</span> {{$job[0]['sub']['name']}}</p>
                          </li>
                          <li class="mb-3 d-flex align-items-center">
                            <p><i class="la la-map-marker"></i> <span class="color-text-2 font-weight-medium mr-1">City:</span> {{$job[0]['city']}}</p>
                          </li>
                          <li class="mb-3 d-flex align-items-center">
                            <p><i class="la la-map-marker"></i> <span class="color-text-2 font-weight-medium mr-1">Location:</span> {{$job[0]['address']}}</p>
                          </li>
                          <li class="mb-3 d-flex align-items-center">
                            <p><i class="la la-phone"></i> <span class="color-text-2 font-weight-medium mr-1">Mobile:</span> {{$job[0]['mobile']}}</p>
                          </li>
                          <li class="mb-3 d-flex align-items-center">
                            <p><i class="la la-users"></i> <span class="color-text-2 font-weight-medium mr-1">Offered Amount Per Hour:</span> ₦{{$job[0]['amount']}}</p>
                          </li>
                          <li class="mb-3 d-flex align-items-center">
                            <p><i class="la la-calendar"></i> <span class="color-text-2 font-weight-medium mr-1">Posted Date:</span> {{ date('D, M j, Y \a\t g:ia', strtotime($job[0]['created_at']))}}</p>
                          </li>
                          <li class="mb-3 d-flex align-items-center">
                            <p><i class="la la-bullhorn"></i> <span class="color-text-2 font-weight-medium mr-1">Application Ends On:</span> {{ date('D, M j, Y \a\t g:ia', strtotime($job[0]['date_end']))}}</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div><!-- end sidebar-widget -->
              </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
          </div>
        </div>
      </div><!-- end billing-content -->
    </div><!-- end billing-form-item -->
  </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection