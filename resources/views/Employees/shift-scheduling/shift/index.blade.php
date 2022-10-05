@extends('layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
    
        <!-- Page Content -->
        <div class="content container-fluid">
            
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Shift List</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Employees</a></li>
                            <li class="breadcrumb-item active">Shift List</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" class="btn add-btn m-r-5" data-bs-toggle="modal" data-bs-target="#add_shift">Add Shifts</a>
                        <a href="#" class="btn add-btn m-r-5" data-bs-toggle="modal" data-bs-target="#add_schedule"> Assign Shifts</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            @include('Employees.shift-scheduling.shift.create')
            @include('Employees.shift-scheduling.scheduling.create')
            
            <!-- Content Starts -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Shift Name</th>
                                    <th>Min Start Time</th>
                                    <th>Start Time</th>
                                    <th>Max Start Time</th>
                                    <th>Min End Time</th>
                                    <th>End Time</th>
                                    <th>Max End Time</th>
                                    <th>Break Time</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-end no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shift as $sf)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$sf->name}}</td>
                                    <td>{{date('h:i:s A', strtotime($sf->min_star_t))}}</td>
                                    <td>{{date('h:i:s A', strtotime($sf->star_t))}}</td>
                                    <td>{{date('h:i:s A', strtotime($sf->max_star_t))}}</td>
                                    <td>{{date('h:i:s A', strtotime($sf->min_end_t))}}</td>
                                    <td>{{date('h:i:s A', strtotime($sf->end_t))}}</td>
                                    <td>{{date('h:i:s A', strtotime($sf->max_end_t))}}</td>
                                    <td>{{$sf->break_t}} mins</td>
                                    <td class="text-center">
                                        <div class="action-label">
                                            <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                                <i class="fa fa-dot-circle-o text-success"></i> Active
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_shift{{$sf->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee{{$sf->id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('Employees.shift-scheduling.shift.edit')
                                @include('Employees.shift-scheduling.shift.delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Content End -->
            
        </div>
        <!-- /Page Content -->
        
    </div>
    <!-- /Page Wrapper -->
@endsection