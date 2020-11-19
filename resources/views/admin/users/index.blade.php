@extends('admin.layouts.app')
@section('admin')    
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title line-height-45">Users</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="index.html">Home</a></li>
                <li class="active__list-item">Dashboard</li>
                <li>Users</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0">Users Details </h3>
                <div class="title-shape margin-top-10px"></div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content pb-0">
                <div class="manage-job-wrap">
                    <div class="table-responsive">
                        <table class="table" id="myTable" width="100%">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Type</th>
                                <th>Date Registered</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="bread-details d-flex">
                                                <div class="bread-img flex-shrink-0">
                                                    <a href="candidate-details.html" class="d-block">
                                                        @if ($user->avatar != null)
                                                        <img src="{{ asset('uploads/profile_pictures/'.$user->avatar) }}" alt="">                                                            
                                                        @else
                                                        <img src="{{ asset('web/images/small-team4.jpg') }}" alt="">                                                            
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="manage-candidate-content">
                                                    <h2 class="widget-title pb-2"><a href="candidate-details.html" class="color-text-2">{{$user->first_name}} {{$user->last_name}}</a></h2>
                                                    <p class="font-size-15">
                                                        <span class="mr-2">{{$user->email}} </span>
                                                    </p>
                                                    <p class="mt-2 font-size-15">
                                                        <span class="mr-2"><i class="la la-map-marker mr-1"></i>{{$user->city}}, </span>
                                                        <span class="mr-2">{{$user->address}}</span>
                                                    </p>
                                                    <p class="mt-2 font-size-15">
                                                        @if ($user->type == 1)                                                        
                                                        Total Job Posted:
                                                        @elseif ($user->type == 2)
                                                        Total Job Applied:
                                                        @endif
                                                    </p>
                                                </div><!-- end manage-candidate-content -->
                                            </div>
                                        </td>
                                        <td>
                                            @if ($user->type == 1)
                                                <span class="badge badge-success note-badge note-badge-bg-2 p-2">Employer</span>
                                            @elseif ($user->type == 2)
                                                <span class="badge badge-success note-badge note-badge-bg-2 p-2">Care Giver</span>
                                            @endif
                                        </td>
                                        <td>{{  date('D, M j, Y \a\t g:ia', strtotime($user->created_at))}}</td>
                                        <td class="text-center">
                                            <div class="manage-candidate-wrap">
                                                <div class="bread-action pt-0">
                                                    <ul class="info-list">
                                                        <li class="d-inline-block"><a href="job-details.html"><i class="la la-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"></i></a></li>
                                                        {{-- <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"></i></a></li> --}}
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
        </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->

@endsection