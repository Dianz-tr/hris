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
                    <h3 class="page-title">Policies</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Policies</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_policy"><i class="fa fa-plus"></i> Add Policy</a>
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
                                <th>Policy Name </th>
                                <th>Department </th>
                                <th>Description </th>
                                <th>Created </th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($policies as $pc)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $pc->pol_name }}</td>
                                <td>{{ $pc->depart or 'not'}}</td>
                                <td>{{ $pc->description }}</td>
                                <td>{{ $pc->created_at }}</td>
                                <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            {{-- <a class="dropdown-item" href="#"><i class="fa fa-download m-r-5"></i> Download</a> --}}
                                            <a class="dropdown-item" href="#{{ route('editPolicies', ['id' => $pc->id])}}" data-bs-toggle="modal" data-bs-target="#edit_policy{{$pc->id}}"><i class="fa fa-pencil m-r-5" style="color: black"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_policy"><i class="fa fa-trash-o m-r-5" style="color: black"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('policies.edit')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Add Policy Modal -->
    <div id="add_policy" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Policy</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storePolicies') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Policy Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="pol_name">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Department</label>
                            <select class="select" name="depart">
                                @foreach($department as $dp)
                                    <option value="{{$dp->name}}">{{$dp->name}}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="4" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Created <span class="text-danger">*</span></label>
                            <input class="form-control datetimepicker" type="date" name="created_at"></input>
                        </div>
                        {{-- <div class="form-group">
                            <label>Upload Policy <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="policy_upload">{{url('uploadFile')}}
                        </div> --}}
                        
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Policy Modal -->
    
    <!-- Delete Policy Modal -->
    <div class="modal custom-modal fade" id="delete_policy" role="dialog">
        @foreach ($policies as $pc)
        <div class="modal-dialog modal-dialog-centered">
            
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('deletePolicies', ['id'=> $pc->id ])}}" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        @endforeach
    </div>
    <!-- /Delete Policy Modal -->

</div>
<!-- /Page Wrapper -->

@endsection