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
                        <h3 class="page-title">Leaves</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Leaves</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_leave"><i class="fa fa-plus"></i> Add Leave</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            @include('Employees.leaves.create')
            
            {{-- <!-- Leave Statistics -->
            <div class="row">
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Today Presents</h6>
                        <h4>12 / 60</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Planned Leaves</h6>
                        <h4>8 <span>Today</span></h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Unplanned Leaves</h6>
                        <h4>{{$unplanned->count()}} <span>Today</span></h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Pending Requests</h6>
                        <h4>{{ DB::table('tbl_leaves')->whereStatus('Pending')->count() }}</h4>
                    </div>
                </div>
            </div>
            <!-- /Leave Statistics --> --}}
            
            {{-- <!-- Search Filter -->
            <form action="{{route('leaves.admin')}}" method="get">
                {{csrf_field()}}
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">  
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" name="emp_name">
                        <label class="focus-label">Employee Name</label>
                    </div>
                </div>
                 <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                    <div class="form-group form-focus select-focus">
                        <select class="select floating"> 
                            <option> -- Select -- </option>
                            <option>Casual Leave</option>
                            <option>Medical Leave</option>
                            <option>Loss of Pay</option>
                        </select>
                        <label class="focus-label">Leave Type</label>
                    </div> 
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
                    <div class="form-group form-focus select-focus">
                        <select class="select floating"> 
                            <option> -- Select -- </option>
                            <option> Pending </option>
                            <option> Approved </option>
                            <option> Rejected </option>
                        </select>
                        <label class="focus-label">Leave Status</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text" name="from_date">
                        </div>
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text" name="to_date">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">  
                    <button type="submit" class="btn btn-success w-100"> Search </button>  
                </div>     
            </div>
            </form>
            <!-- /Search Filter --> --}}
            
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>No of Days</th>
                                    <th>Reason</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $ls)
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            {{-- <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a> --}}
                                            <a href="#">{{$ls->name}}<span></span></a>
                                        </h2>
                                    </td>
                                    <td>{{$ls->leave_type}}</td>
                                    <td>{{ date('d F Y', strtotime(($ls->from_date)))}}</td>
                                    <td>{{ date('d F Y', strtotime(($ls->to_date)))}}</td>
                                    <td>{{$ls->days}}</td>
                                    <td>{{$ls->leave_reason or '-'}}</td>
                                    <td class="text-center">
                                        <div class="dropdown action-label">
                                            @if ($ls->status == 'Pending')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-info"></i> {{$ls->status}}</a>
                                            @elseif ($ls->status == 'Approved')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-success"></i> {{$ls->status}}</a>
                                            @elseif ($ls->status == 'Declined')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-danger"></i> {{$ls->status}}</a>
                                            @else
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                            @endif
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#approve_leave{{$ls->id}}">
                                                    <i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#approve_leave{{$ls->id}}">
                                                    <i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#approve_leave{{$ls->id}}">
                                                    <i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_leave{{$ls->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_approve{{$ls->id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('Employees.leaves.approve')
                                @include('Employees.leaves.edit')
                                @include('Employees.leaves.delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        
    </div>
    <!-- /Page Wrapper -->
@endsection