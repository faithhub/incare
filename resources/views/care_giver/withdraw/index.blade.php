@extends('care_giver.layouts.app')
@section('care_giver')

<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title">Transactions</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="index.html">Home</a></li>
                <li class="active__list-item"><a href="index.html">Dashboard</a></li>
                <li>Transactions</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0">My Transactions</h3>
                <div class="title-shape margin-top-10px"></div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content pb-0">
                <div class="manage-job-wrap">
                    <div class="table-responsive">
                        <table class="table" id="myTable" width="100%">
                            <thead>
                            <tr>
                                <th>Plan Name</th>
                                <th>Amount Paid</th>
                                <th>Plan Duration</th>                                
                                <th>Status</th>                              
                                <th>Reference ID</th>
                                <th>TRXREF</th>
                                <th>Payment Date</th>
                            </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($trans as $transaction)
                                <tr>
                                    <td>
                                        <div class="manage-candidate-wrap">
                                        <h2 class="widget-title pb-0 font-size-15">{{$transaction->plan->plan_name}}</h2>
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td class="font-weight-semi-bold">
                                        ₦{{$transaction->amount}}
                                    </td>
                                    <td>{{$transaction->plan->plan_type}}</td>
                                    <td class="text-center"><span class="badge badge-success p-1">{{$transaction->status}}</span></td>
                                    <td>{{$transaction->reference}}</td>
                                    <td>{{ $transaction->trxref}}</td>
                                    <td>{{ date('D, M j, Y \a\t g:ia', strtotime($transaction->created_at)) }}</td>
                                </tr>
                                @endforeach
                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div><!-- end billing-content -->
        </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection