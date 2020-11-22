@extends('employer.layouts.app')
@section('user')
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title">Manage Care Giver</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="index.html">Home</a></li>
                <li class="active__list-item"><a href="index.html">Dashboard</a></li>
                <li>Manage Care Giver</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row mt-5">
    <div class="col-lg-12">
        
        <div class="billing-content pb-0">
            <div class="manage-job-wrap">
                <div class="table-responsive">
                    <table class="table" id="myTable" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)                                
                            <tr>
                                <td>
                                    <div class="bread-details d-flex">
                                        <div class="bread-img flex-shrink-0">
                                            <a href="candidate-details.html" class="d-block">
                                                <img src="{{ asset('uploads/profile_pictures/'.$user->avatar) }}" alt="{{$user->first_name  }}">
                                            </a>
                                        </div>
                                        <div class="manage-candidate-content">
                                            <h2 class="widget-title pb-2"><a href="candidate-details.html" class="color-text-2">{{$user->first_name}} {{$user->last_name}}</a></h2>
                                            <p class="font-size-15">
                                                <span class="mr-2"><i class="la la-envelope-o mr-1"></i><a href="mailto:{{$user->email}}" class="color-text-3">{{$user->email}}</a></span>
                                                <span class="mr-2"><i class="la la-phone mr-1"></i>{{$user->mobile}}</span>
                                            </p>
                                            <p class="mt-1 font-size-15">
                                                <span class="mr-2"><i class="la la-map mr-1"></i>{{$user->address}}</span>
                                            </p>
                                        </div><!-- end manage-candidate-content -->
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="manage-candidate-wrap">
                                        <div class="bread-action pt-0">
                                            <ul class="info-list">
                                                <li class="d-inline-block"><a href="{{ url('employer/message', $user->id) }}" ><i class="la la-envelope" data-toggle="tooltip" data-placement="top" title="Message"></i></a></li>
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
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection