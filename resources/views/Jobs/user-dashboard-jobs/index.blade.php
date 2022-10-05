@extends('layouts.master')

@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
    
        <!-- Page Content -->
        <div class="content container-fluid">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Job Dashboard</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item">Jobs</li>
                            <li class="breadcrumb-item active">Job Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
        
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-briefcase"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{ $id = DB::table('tbl_managejobs')->count() }}</h3>
                                <span>Jobs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{ $id = DB::table('tbl_candidates')->count() }}</h3>
                                <span>Job Seekers</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{ $id = DB::table('tbl_employees')->count() }}</h3>
                                <span>Employees</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-clipboard"></i></span>
                            <div class="dash-widget-info">
                                <h3>220</h3>
                                <span>Applications</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-center d-flex">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Overview</h3>
                                    <canvas id="lineChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title text-center">Latest Jobs</h3>
                                    <ul class="list-group">
                                        @foreach ($managejobs as $mj)
                                            <li class="list-group-item list-group-item-action">{{$mj->job_title}} <span class="float-end text-sm text-muted">{{ date('d F Y', strtotime($mj->start_date))}}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-table">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Applicants List</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Job Title</th>
                                            <th>Departments</th>
                                            <th>Start Date</th>
                                            <th>Expire Date</th>
                                            <th class="text-center">Job Types</th>
                                            <th class="text-center">Status</th>
                                            {{-- <th class="text-center">Resume</th> --}}
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($managejobs as $mj)
                                        <tr>
                                            <td>{{$loop-> index + 1}}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                                    <a href="profile.html">{{$mj->candidate}}</a>
                                                </h2>
                                            </td>
                                            <td><a href="job-details.html">{{$mj->job_title}}</a></td>
                                            <td>{{$mj->department}}</td>
                                            <td>{{$mj->start_date}}</td>
                                            <td>{{$mj->end_date}}</td>
											<td class="text-center">
												<div class=" action-label">
													@if ($mj->job_type == 'Full Time')
														<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
															<i class="fa fa-dot-circle-o text-info"></i> {{ $mj->job_type}} 
														</a>
													@elseif($mj->job_type == 'Part Time')
														<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
															<i class="fa fa-dot-circle-o text-success"></i> {{ $mj->job_type}} 
														</a>
													@elseif($mj->job_type == 'Internship')
														<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
															<i class="fa fa-dot-circle-o text-danger"></i> {{ $mj->job_type}} 
														</a>
													@elseif($mj->job_type == 'Temporary')
														<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
															<i class="fa fa-dot-circle-o text-warning"></i> {{ $mj->job_type}} 
														</a>
													@else
														<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
															<i class="fa fa-dot-circle-o text-warning"></i> {{ $mj->job_type}} 
														</a>
													@endif
												</div>
											</td>
											<td class="text-center">
												<div class=" action-label">
													@if ($mj->status == 'Open')
														<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
															<i class="fa fa-dot-circle-o text-info"></i> {{ $mj->status}} 
														</a>
													@elseif($mj->status == 'Closed')
														<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
															<i class="fa fa-dot-circle-o text-success"></i> {{ $mj->status}} 
														</a>
													@else
														<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
															<i class="fa fa-dot-circle-o text-danger"></i> {{ $mj->status}} 
														</a>
													@endif
												</div>
											</td>
                                            {{-- <td class="text-center"><a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="fa fa-download me-1"></i> Download</a></td> --}}
                                            <td class="text-center">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_job{{$mj->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete_job{{$mj->id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('Jobs.manage_jobs.edit')
                                        @include('Jobs.manage_jobs.delete')
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-table">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Shortlist Candidates</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Job Title</th>
                                            <th>Departments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($managejobs as $mj)
                                        <tr>
                                            <td>{{$loop-> index + 1}}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                                    <a href="profile.html">{{$mj->candidate}}</a>
                                                </h2>
                                            </td>
                                            <td><a href="job-details.html">{{$mj->job_title}}</a></td>
                                            <td>{{$mj->departmen}}</td>
                                            <td class="text-center">
                                                <div class=" action-label">
                                                    @if ($mj->status == 'Open')
                                                        <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-dot-circle-o text-info"></i> {{ $mj->status}} 
                                                        </a>
                                                    @elseif($mj->status == 'Closed')
                                                        <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-dot-circle-o text-success"></i> {{ $mj->status}} 
                                                        </a>
                                                    @else
                                                        <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-dot-circle-o text-danger"></i> {{ $mj->status}} 
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->

@endsection
