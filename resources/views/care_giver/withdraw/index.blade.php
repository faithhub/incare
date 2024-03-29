@extends('care_giver.layouts.app')
@section('care_giver')

<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title">Withdrawals</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="#">Home</a></li>
                <li class="active__list-item"><a href="#">Dashboard</a></li>
                <li>Withdrawals</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0">My Withdrawals</h3>
                <div class="title-shape margin-top-10px">
                </div>
                <div class="text-right">
                    <a href="{{ url('care-giver/create-withdrawal') }}" class="btn btn-success">Make withdraw</a>
                </div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content pb-0">
                <div class="manage-job-wrap">
                    <div class="table-responsive">
                        <table class="table" id="myTable" width="100%">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Bank</th>
                                <th>Amount</th>                       
                                <th>Status</th>                              
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($trans as $withdraw)
                                <tr>
                                    <td>
                                        {{$sn++}}
                                    </td>
                                    <td>
                                        <div class="manage-candidate-wrap">
                                        <h2 class="widget-title pb-0 font-size-15">{{$withdraw->bank}}</h2>
                                        </div><!-- end manage-candidate-wrap -->
                                    </td>
                                    <td class="font-weight-semi-bold">
                                        <span class="text-success">₦{{$withdraw->amount}}</span>
                                    </td>
                                    <td class="text-center">
                                        @if ($withdraw->status == 'Pending')
                                            <span class="badge badge-warning p-1">{{$withdraw->status}}</span>                                            
                                        @elseif ($withdraw->status == 'Approved')
                                            <span class="badge badge-success p-1">{{$withdraw->status}}</span>                                              
                                        @elseif ($withdraw->status == 'Cancel')
                                            <span class="badge badge-danger p-1">{{$withdraw->status}}</span>                                            
                                        @endif
                                    </td>
                                    <td>{{ date('D, M j, Y \a\t g:ia', strtotime($withdraw->created_at)) }}</td>
                                    <td>                                        
                                        <div class="manage-candidate-wrap">
                                            <div class="bread-action pt-0">
                                                <ul class="info-list">
                                                    <li class="d-inline-block"><a href="#"><i data-toggle="modal" data-target="#view{{$withdraw->id}}" class="la la-eye" data-toggle="tooltip" data-placement="top" title="View"></i></a></li>
                                                    @if ($withdraw->status == 'Pending')
                                                        <li class="d-inline-block"><a href="#"><i data-toggle="modal" data-target="#delete{{$withdraw->id}}" class="la la-remove" data-toggle="tooltip" data-placement="top" title="Cancel"></i></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="view{{$withdraw->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Withdrawal Details</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Amount</label>
                                                        <input type="" readonly class="form-control" value="₦{{$withdraw->amount}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bank</label>
                                                        <input type="" readonly class="form-control" value="{{$withdraw->bank}}">
                                                    </div>                                                    
                                                    <div class="form-group">
                                                        <label>Account Name</label>
                                                        <input type="" readonly class="form-control" value="{{$withdraw->account_name}}">
                                                    </div>                                                    
                                                    <div class="form-group">
                                                        <label>Account Number</label>
                                                        <input type="" readonly class="form-control" value="{{$withdraw->account_number}}">
                                                    </div>                                                                                                        
                                                    <div class="form-group">
                                                        <label>Status</label><br>
                                                        @if ($withdraw->status == 'Approved')
                                                            <span class="btn btn-success">{{$withdraw->status}}</span>                                                            
                                                        @elseif ($withdraw->status == 'Pending')
                                                            <span class="btn btn-warning">{{$withdraw->status}}</span>                                                         
                                                        @elseif ($withdraw->status == 'Cancel')
                                                            <span class="btn btn-danger">{{$withdraw->status}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        
                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="delete{{$withdraw->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body mt-2 mb-2 text-center">
                                                <h2 style="color: black">Are you sure you want to Cancel this Withdraw?</h2>
                                            <form method="POST" action="{{ url('care-giver/cancel-withdraw') }}">
                                                @csrf                                                        
                                                <input type="hidden" name="id" value="{{ $withdraw->id }}"> 
                                                <input type="hidden" name="amount" value="{{ $withdraw->amount }}">
                                                <button type="submit" class="btn btn-success m-2">Yes</button> 
                                                <button type="button" class="btn btn-dark m-2" data-dismiss="modal" aria-label="Close">No</button>
                                            </form>
                                            </div>
                                        </div>
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
        </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
@endsection