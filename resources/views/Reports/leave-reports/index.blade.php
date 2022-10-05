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
                        <h3 class="page-title">Leave Report</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Leave Report</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="btn btn-primary">PDF</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            {{-- <!-- Search Filter -->
            <div class="row filter-row mb-4">
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <input class="form-control floating" type="text">
                        <label class="focus-label">Employee</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        <select class="select floating"> 
                            <option>Select Department</option>
                            <option>Designing</option>
                            <option>Development</option>
                            <option>Finance</option>
                            <option>Hr & Finance</option>
                        </select>
                        <label class="focus-label">Department</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">  
                    <a href="#" class="btn btn-success w-100"> Search </a>  
                </div>     
            </div>
            <!-- /Search Filter --> --}}
            
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Date</th>
                                    <th>Department</th>
                                    <th>Leave Type</th>
                                    <th>No.of Days</th>
                                    <th>Remaining Leave</th>
                                    <th>Total Leaves</th>
                                    <th>Total Leave Taken</th>
                                    <th>Leave Carry Forward</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $item)
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            <a href="profile.html">{{$item->name}} <span>{{$item->employee_id}}</span></a>
                                        </h2>
                                    </td>
                                    <td>{{date('d F y',strtotime($item->updated_at))}}</td>
                                    <td>{{$item->slug}}</td>
                                    <td class="text-center">
                                        @if ($item->leave_type == 'Casual Leave 12 Days')
                                            <button class="btn btn-outline-info btn-sm">Casual Leave 12 Days</button>
                                        @elseif ($item->leave_type == 'Medical Leave')
                                            <button class="btn btn-outline-warning btn-sm">Medical Leave</button>
                                        @else
                                            <button class="btn btn-outline-danger btn-sm">Emercency Leave</button>
                                        @endif
                                    </td>
                                    <td class="text-center"><span class="btn btn-danger btn-sm">05</span></td>
                                    <td class="text-center"><span class="btn btn-warning btn-sm"><b>08</b></span></td>
                                    <td class="text-center"><span class="btn btn-success btn-sm"><b>20</b></span></td>
                                    <td class="text-center">12</td>
                                    <td class="text-center">08</td>
                                </tr>
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