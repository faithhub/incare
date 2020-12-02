@extends('care_giver.layouts.app')
@section('care_giver')

<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title">Create Withdrawwals</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="#">Home</a></li>
                <li class="active__list-item"><a href="#">Dashboard</a></li>
                <li>Create Withdrawwals</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0">Create Withdrawwals</h3>
                <div class="title-shape margin-top-10px"></div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content pb-0">
                <div class="manage-job-wrap">                    
                    <div class="contact-form-action">
                        <form method="POST" action="{{ url('care-giver/create-withdrawal') }}">
                            @csrf                            
                            <div class="row mb-3">
                                <div class="col-lg-6 column-lg-full">
                                    <div class="input-box">
                                        <label class="label-text">Amount</label>
                                        <div class="form-group">
                                            <span class="la la-briefcase form-icon"></span>
                                            <input class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" type="number" name="amount" placeholder="Enter Amount to withdraw">
                                            @error('amount')
                                                <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 column-lg-full">
                                    <div class="input-box">
                                        <label class="label-text">Bank Name</label>
                                        <div class="form-group">
                                            <span class="la la-briefcase form-icon"></span>
                                            <input class="form-control @error('bank') is-invalid @enderror" value="{{ old('bank') }}" type="text" name="bank" placeholder="Enter Bank Name">
                                            @error('bank')
                                                <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 column-lg-full">
                                    <div class="input-box">
                                        <label class="label-text">Account Name</label>
                                        <div class="form-group">
                                            <span class="la la-briefcase form-icon"></span>
                                            <input class="form-control @error('account_name') is-invalid @enderror" value="{{ old('account_name') }}" type="text" name="account_name" placeholder="Enter Account Name">
                                            @error('account_name')
                                                <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 column-lg-full">
                                    <div class="input-box">
                                        <label class="label-text">Account Number</label>
                                        <div class="form-group">
                                            <span class="la la-briefcase form-icon"></span>
                                            <input class="form-control @error('account_number') is-invalid @enderror" value="{{ old('account_number') }}" type="number" name="account_number" placeholder="Enter Account Number">
                                            @error('account_number')
                                                <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->
                            <div class="btn-box mt-4 mb-3">
                                <button type="submit" class="theme-btn border-0"><i class="la la-plus"></i> Submit Withdraw</button>
                            </div><!-- end btn-box -->
                        </form>               
                    </div>
                </div>
            </div><!-- end billing-content -->
        </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection