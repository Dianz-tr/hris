@extends('layouts.master')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Goal Tracking</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Goal Tracking</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_goal"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Goal Type</th>
                                <th>Subject</th>
                                <th>Target Achievement</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Description </th>
                                <th>Status </th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($goal as $gl)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $gl->goal_type }}</td>
                                <td>{{ $gl->subject }}</td>
                                <td>{{ $gl->target_achievement }}</td>
                                <td>{{ $gl->start_date }}</td>
                                <td>{{ $gl->end_date }}</td>
                                <td>{{ $gl->description }}</td>
                                <td>{{ $gl->status }}</td>
                                {{-- <td><p class="mb-1">Completed 73%</p><div class="progress" style="height:5px"><div class="progress-bar bg-primary progress-sm" style="width: 73%;height:10px;"></div></div></td>								 --}}
                                <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#{{route('editGoal', ['id'=> $gl->id])}}" data-bs-toggle="modal" data-bs-target="#edit_goal{{$gl->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_goal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('Goals.goal.edit')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Add Goal Modal -->
    <div id="add_goal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Goal Tracking</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storeGoal') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{-- <label class="col-form-label">Goal Type</label> --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Goal Type</label>
                                        {{-- <input class="form-control" type="text" name="goal_type"> --}}
                                    
                                        <select class="select" name="goal_type">
                                            {{-- <option value="Invoice Goal">Invoice Goalsh</option> --}}
                                            {{-- <option value="Event Goal">Event Goal</option> --}}
                                            @foreach($goaltype as $gt)
                                                <option value="{{$gt->type}}">{{$gt->type}}</option>
                                             @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Subject</label>
                                    <input class="form-control" type="text" name="subject">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Target Achievement</label>
                                    <input class="form-control" type="text" name="target_achievement">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Start Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="start_date"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>End Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="end_date"></div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="4" name="description"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Status <span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" rows="4" name="status"></input> --}}
                                    {{-- <div class="dropdown-menu" name="status">
                                        <a class="dropdown-item" href="#" value="fa fa-dot-circle-o text-success" ><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                        <a class="dropdown-item" href="#" value="fa fa-dot-circle-o text-danger" ><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                    </div> --}}
                                    <select class="select" name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Goal Modal -->
    
    <!-- Delete Goal Modal -->
    <div class="modal custom-modal fade" id="delete_goal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            
            @foreach ($goal as $gl)
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Goal Tracking List</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('deleteGoal', ['id' => $gl->id]) }}" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /Delete Goal Modal -->

</div>
<!-- /Page Wrapper -->

@endsection