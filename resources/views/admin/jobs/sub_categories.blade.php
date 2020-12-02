@extends('admin.layouts.app')
@section('admin')    
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
            <div class="section-heading">
                <h2 class="sec__title line-height-45">Job Sub Categories</h2>
            </div><!-- end section-heading -->
            <ul class="list-items d-flex align-items-center">
                <li class="active__list-item"><a href="#">Home</a></li>
                <li class="active__list-item">Dashboard</li>
                <li>Job Sub Categories</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="billing-form-item">
            <div class="billing-title-wrap">
                <h3 class="widget-title pb-0"> All Job Sub Categories</h3>
                <div class="title-shape margin-top-10px"></div>
            </div><!-- billing-title-wrap -->
            <div class="billing-content pb-0">
                <div class="manage-job-wrap">
                    <div class="table-responsive">
                        <table class="table" id="myTable" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date Added</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($sub_categories as $sub_category)
                                    <tr>
                                        <td>{{ $sub_category->name }}</td>
                                        <td>{{  date('D, M j, Y \a\t g:ia', strtotime($sub_category->created_at))}}</td>
                                        <td class="text-center">
                                            <div class="manage-candidate-wrap">
                                                <div class="bread-action pt-0">
                                                    <ul class="info-list">
                                                        <li class="d-inline-block"><a href="#"><i class="la la-eye" data-toggle="modal" data-target="#edit{{$sub_category->id}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"></i></a></li>
                                                        <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="modal" data-target="#delete{{$sub_category->id}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="edit{{$sub_category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Job Sub Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <form method="POST" action="{{ url('admin/job-sub-categories') }}">
                                                        @csrf                                                    
                                                        <div class="modal-body text-left">
                                                            <input type="hidden" name="id" value="{{ $sub_category->id }}">
                                                            <label>Name</label>
                                                            <input class="form-control" type="text" name="name" value="{{ $sub_category->name }}" placeholder="Job Sub Category">
                                                            @error('name')
                                                            <span class="invalid-feedback mb-2" role="alert" style="display: block">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="delete{{$sub_category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body mt-2 mb-2">
                                                        <h2>Are you sure you want to delete?</h2>
                                                    <form method="POST" action="{{ url('admin/delete-job-sub') }}">
                                                        @csrf                                                        
                                                        <input type="hidden" name="id" value="{{ $sub_category->id }}">
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
            </div>
        </div><!-- end billing-form-item -->
    </div><!-- end col-lg-12 -->
</div><!-- end row -->

@endsection