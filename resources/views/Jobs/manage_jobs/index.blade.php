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
								<h3 class="page-title">Jobs</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Jobs</li>
								</ul>
							</div>
							<div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_job"><i class="fa fa-plus"></i> Add Job</a>
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
											<th>#</th>
											<th>Job Title</th>
											<th>Department</th>
											<th>Start Date</th>
											<th>Expire Date</th>
											<th class="text-center">Job Type</th>
											<th class="text-center">Status</th>
											<th class="text-end">Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($managejobs as $mj)
										<tr>
											<td>{{$loop -> index + 1}}</td>
											<td>{{$mj->job_title}}</td>
											<td>{{$mj->departmen}}</td>
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
												{{-- <div class="dropdown action-label">
													<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-danger"></i> Open
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Open</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Closed</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Cancelled</a>
													</div>
												</div> --}}
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
											<td class="text-end">
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
				<!-- /Page Content -->
				
				<!-- Add Job Modal -->
				<div id="add_job" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Job</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('storeManagejobs')}}" method="POST">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Job Title</label>
												<input class="form-control" type="text" name="job-title" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Department</label>
												<select class="select" name="departmen">
													{{-- <option>-</option> --}}
													{{-- <option value="Web Development">Web Development</option>
													<option value="Application Development">Application Development</option>
													<option value="IT Management">IT Management</option>
													<option value="Accounts Management">Accounts Management</option>
													<option value="Support Management">Support Management</option>
													<option value="Marketing">Marketing</option> --}}
													{{-- @foreach ($departmen as $depart)
														<option value="{{$depart->}}"></option>
													@endforeach --}}
													@foreach($departmen as $dp)
														<option value="{{$dp->name}}">{{$dp->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Job Location</label>
												<input class="form-control" type="text" name="job_location" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>No of Vacancies</label>
												<input class="form-control" type="text" name="no_vacancies" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Experience</label>
												<input class="form-control" type="text" name="experience" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Age</label>
												<input class="form-control" type="text" name="age" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Salary From</label>
												<input type="text" class="form-control" name="salary_from" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Salary To</label>
												<input type="text" class="form-control" name="salary_to" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Job Type</label>
												<select class="select" name="job_type">
													<option value="Full Time">Full Time</option>
													<option value="Part Time">Part Time</option>
													<option value="Internship">Internship</option>
													<option value="Temporary">Temporary</option>
													<option value="Remote">Remote</option>
													<option value="Others">Others</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Status</label>
												<select class="select" name="status">
													<option value="Open">Open</option>
													<option value="Closed">Closed</option>
													<option value="Cancelled">Cancelled</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Start Date <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" type="" name="start_date"></div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>End Date <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" type="" name="end_date"></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Description</label>
												<textarea class="form-control" name="description" required></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Candidate</label>
												<select class="select" name="candidate">
													@foreach($candidate as $can)
														<option value="{{$can->fname}} {{$can->lname}}">{{$can->fname}} {{$can->lname}}</option>
													@endforeach
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
				<!-- /Add Job Modal -->

            </div>
			<!-- /Page Wrapper -->

@endsection