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
                        <h3 class="page-title">Daily Scheduling</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="employees.html">Employees</a></li>
                            <li class="breadcrumb-item active">Shift Scheduling</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="{{ route('shifts') }}" class="btn add-btn m-r-5">Shifts</a>
                        <a href="#" class="btn add-btn m-r-5" data-bs-toggle="modal" data-bs-target="#add_schedule"> Assign Shifts</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            @include('Employees.shift-scheduling.scheduling.create')
            
            <!-- Content Starts -->
            {{-- <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">  
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Employee</label>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-3"> 
                    <div class="form-group form-focus select-focus">
                        <select class="select floating"> 
                            <option>All Department</option>
                            <option value="1">Finance</option>
                            <option value="2">Finance and Management</option>
                            <option value="3">Hr & Finance</option>
                            <option value="4">ITech</option>
                        </select>
                        <label class="focus-label">Department</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">  
                    <div class="form-group form-focus focused">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">  
                    <div class="form-group form-focus focused">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">  
                    <a href="#" class="btn btn-success w-100"> Search </a>  
                </div>     
            </div>
            <!-- Search Filter --> --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Scheduled Shift</th>
                                    {{-- <th>{{ date('l j', strtotime($today)) }}</th>
                                    <th>{{ date('l j', strtotime($today->addDays(1))) }}</th>
                                    <th>{{ date('l j', strtotime($today->addDays(1))) }}</th>
                                    <th>{{ date('l j', strtotime($today->addDays(1))) }}</th>
                                    <th>{{ date('l j', strtotime($today->addDays(1))) }}</th>
                                    <th>{{ date('l j', strtotime($today->addDays(1))) }}</th>
                                    <th>{{ date('l j', strtotime($today->addDays(1))) }}</th>
                                    <th>{{ date('l j', strtotime($today->addDays(1))) }}</th>
                                    <th>{{ date('l j', strtotime($today->addDays(1))) }}</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedceduling as $item)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                                <a href="profile.html">{{$item[0]->f_name or 'Not'}} {{$item[0]->l_name or 'Not'}}<span> {{$item[0]->name or 'Not'}}</span></a>
                                            </h2>
                                        </td>
                                        @foreach ($item as $a)
                                            <td>
                                                <div class="user-add-shedule-list">
                                                    <h2>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_schedule{{$a->id}}" style="border:2px dashed #1eb53a">
                                                        <span class="username-info m-b-10">{{date('d F y', strtotime($a->date))}} - ( {{date('h:i A', strtotime($a->star_t))}} - {{date('h:i A', strtotime($a->end_t))}} )</span>
                                                        <span class="userrole-info">{{$a->slug or 'Not'}} - {{$a->name or 'Not'}}</span>
                                                        </a>
                                                    </h2>
                                                </div>
                                            </td> 
                                                @include('Employees.shift-scheduling.scheduling.edit')
                                        @endforeach
                                            {{-- @foreach ($item as $a)
                                                @if ($a->date === $sch2)
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <h2>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit_schedule{{$a->id}}" style="border:2px dashed #1eb53a">
                                                                <span class="username-info m-b-10">{{date('h:i A', strtotime($a->star_t))}} - {{date('h:i A', strtotime($a->end_t))}}</span>
                                                                <span class="userrole-info">{{$a->name or 'Not'}} - SMARTHR</span>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                    </td> 
                                                @include('Employees.shift-scheduling.scheduling.edit')
                                                @else
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_schedule">
                                                            <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                @endif
                                                @if ($a->date === $sch3)
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <h2>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit_schedule{{$a->id}}" style="border:2px dashed #1eb53a">
                                                                <span class="username-info m-b-10">{{date('h:i A', strtotime($a->star_t))}} - {{date('h:i A', strtotime($a->end_t))}}</span>
                                                                <span class="userrole-info">{{$a->name or 'Not'}} - SMARTHR</span>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                    </td> 
                                                @include('Employees.shift-scheduling.scheduling.edit')
                                                @else
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_schedule">
                                                            <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                @endif
                                                @if ($a->date === $sch4)
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <h2>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit_schedule{{$a->id}}" style="border:2px dashed #1eb53a">
                                                                <span class="username-info m-b-10">{{date('h:i A', strtotime($a->star_t))}} - {{date('h:i A', strtotime($a->end_t))}}</span>
                                                                <span class="userrole-info">{{$a->name or 'Not'}} - SMARTHR</span>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                    </td> 
                                                @include('Employees.shift-scheduling.scheduling.edit')
                                                @else
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_schedule">
                                                            <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                @endif
                                                @if ($a->date === $sch5)
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <h2>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit_schedule{{$a->id}}" style="border:2px dashed #1eb53a">
                                                                <span class="username-info m-b-10">{{date('h:i A', strtotime($a->star_t))}} - {{date('h:i A', strtotime($a->end_t))}}</span>
                                                                <span class="userrole-info">{{$a->name or 'Not'}} - SMARTHR</span>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                    </td> 
                                                @include('Employees.shift-scheduling.scheduling.edit')
                                                @else
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_schedule">
                                                            <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                @endif
                                                @if ($a->date === $sch6)
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <h2>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit_schedule{{$a->id}}" style="border:2px dashed #1eb53a">
                                                                <span class="username-info m-b-10">{{date('h:i A', strtotime($a->star_t))}} - {{date('h:i A', strtotime($a->end_t))}}</span>
                                                                <span class="userrole-info">{{$a->name or 'Not'}} - SMARTHR</span>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                    </td> 
                                                @include('Employees.shift-scheduling.scheduling.edit')
                                                @else
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_schedule">
                                                            <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                @endif
                                                @if ($a->date === $sch7)
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <h2>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit_schedule{{$a->id}}" style="border:2px dashed #1eb53a">
                                                                <span class="username-info m-b-10">{{date('h:i A', strtotime($a->star_t))}} - {{date('h:i A', strtotime($a->end_t))}}</span>
                                                                <span class="userrole-info">{{$a->name or 'Not'}} - SMARTHR</span>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                    </td> 
                                                @include('Employees.shift-scheduling.scheduling.edit')
                                                @else
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_schedule">
                                                            <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                @endif
                                                @if ($a->date === $sch8)
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <h2>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit_schedule{{$a->id}}" style="border:2px dashed #1eb53a">
                                                                <span class="username-info m-b-10">{{date('h:i A', strtotime($a->star_t))}} - {{date('h:i A', strtotime($a->end_t))}}</span>
                                                                <span class="userrole-info">{{$a->name or 'Not'}} - SMARTHR</span>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                    </td> 
                                                @include('Employees.shift-scheduling.scheduling.edit')
                                                @else
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_schedule">
                                                            <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                @endif
                                                @if ($a->date === $sch9)
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <h2>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit_schedule{{$a->id}}" style="border:2px dashed #1eb53a">
                                                                <span class="username-info m-b-10">{{date('h:i A', strtotime($a->star_t))}} - {{date('h:i A', strtotime($a->end_t))}}</span>
                                                                <span class="userrole-info">{{$a->name or 'Not'}} - SMARTHR</span>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                    </td> 
                                                @include('Employees.shift-scheduling.scheduling.edit')
                                                @else
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_schedule">
                                                            <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                @endif
                                                @if ($a->date === $sch10)
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <h2>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit_schedule{{$a->id}}" style="border:2px dashed #1eb53a">
                                                                <span class="username-info m-b-10">{{date('h:i A', strtotime($a->star_t))}} - {{date('h:i A', strtotime($a->end_t))}}</span>
                                                                <span class="userrole-info">{{$a->name or 'Not'}} - SMARTHR</span>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                    </td> 
                                                @include('Employees.shift-scheduling.scheduling.edit')
                                                @else
                                                    <td>
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_schedule">
                                                            <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                @endif
                                                @if($a->employee_id)
                                                    @break
                                                @endif
                                            @endforeach --}}
                                    </tr>
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