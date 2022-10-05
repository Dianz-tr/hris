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
								<h3 class="page-title">Employee Report</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Employee Report</li>
								</ul>
							</div>
							<div class="col-auto">
								<a href="#" class="btn btn-primary">PDF</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
						<!-- Content Starts -->
						
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
							<div class="d-grid">
								<a href="#" class="btn btn-success"> Search </a>  
							</div>
						</div>     
                    </div>
					<!-- /Search Filter --> --}}
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>Employee Name</th>
											<th>Email</th>
											<th>Department</th>
											<th>Designation</th>
											<th>Joining Date</th>
											<th class="text-center">Status</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($employees as $emp)
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
													<a href="profile.html" class="text-primary"> {{$emp->f_name}} {{$emp->l_name}} <span>{{$emp->employee_id}}</span></a>
												</h2>
											</td>
											<td class="text-info">{{$emp->email}}</td>
											<td>{{$emp->department->name or 'Not'}}</td>
											<td>{{$emp->designation->name or "Not"}}</td> 
											<td>{{date('d F y', strtotime($emp->join))}}</td>
											<td><button class="btn btn-outline-success btn-sm">Active</button></td>
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