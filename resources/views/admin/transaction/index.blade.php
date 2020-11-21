@extends('admin.layouts.app')
@section('admin')

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
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Package ID</th>
                                <th>Title</th>
                                <th>Payment Date</th>
                                <th>Payment Method</th>
                                <th>Amount</th>
                                <th class="text-center">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>127368367</td>
                                    <td>
                                        <div class="manage-candidate-wrap">
                                            <h2 class="widget-title pb-0 font-size-15">Advertise job - Supper Jobs</h2>
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td>10 May, 2019</td>
                                    <td>Payoneer</td>
                                    <td class="font-weight-semi-bold">
                                        $99.00
                                    </td>
                                    <td class="text-center"><span class="badge badge-success p-1">Approved</span></td>
                                </tr>
                                <tr>
                                    <td>357368367</td>
                                    <td>
                                        <div class="manage-candidate-wrap">
                                            <h2 class="widget-title pb-0 font-size-15">CV Search - Unlimited CV Pack</h2>
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td>10 May, 2020</td>
                                    <td>Pre Bank Transfer</td>
                                    <td class="font-weight-semi-bold">
                                        $99.00
                                    </td>
                                    <td class="text-center"><span class="badge badge-info p-1">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>447368367</td>
                                    <td>
                                        <div class="manage-candidate-wrap">
                                            <h2 class="widget-title pb-0 font-size-15">Advertise job - Silver Jobs package</h2>
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td>10 May, 2020</td>
                                    <td>Paypal</td>
                                    <td class="font-weight-semi-bold">
                                        $99.00
                                    </td>
                                    <td class="text-center"><span class="badge badge-info p-1">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>447368367</td>
                                    <td>
                                        <div class="manage-candidate-wrap">
                                            <h2 class="widget-title pb-0 font-size-15">Advertise job - Gold Jobs package</h2>
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td>10 May, 2020</td>
                                    <td>Skrill</td>
                                    <td class="font-weight-semi-bold">
                                        $99.00
                                    </td>
                                    <td class="text-center"><span class="badge badge-info p-1">Pending</span></td>
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