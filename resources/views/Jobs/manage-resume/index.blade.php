@extends('layouts.master')

@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col-12">
								<h3 class="page-title">Manage Resumes</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item">Jobs</li>
									<li class="breadcrumb-item active">Manage Resumes</li>
								</ul>
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
											<th>Name</th>
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
											<td>{{$loop-> index + 1}}</td>
											<td>
												<h2 class="table-avatar">
													<a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
													<a href="profile.html">{{$mj->candidate}}</a>
													{{-- <a href="profile.html">Web Designer</a> --}}
												</h2>
											</td>
											<td><a href="job-details.html">{{$mj->job_title}}</a></td>
											<td>{{$mj->departmen}}</td>
											<td>{{ date('d F Y', strtotime($mj->start_date))}}</td>
											<td>{{ date('d F Y', strtotime($mj->end_date))}}</td>
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
                                        @include('Jobs.manage_jobs.delete')
                                        @include('Jobs.manage_jobs.edit')
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
				
				<!-- Edit Job Modal -->
				<div id="edit_job" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Job</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Job Title</label>
												<input class="form-control" type="text" value="Web Developer">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Department</label>
												<select class="select">
													<option>-</option>
													<option selected>Web Development</option>
													<option>Application Development</option>
													<option>IT Management</option>
													<option>Accounts Management</option>
													<option>Support Management</option>
													<option>Marketing</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Job Location</label>
												<input class="form-control" type="text" value="California">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>No of Vacancies</label>
												<input class="form-control" type="text" value="5">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Experience</label>
												<input class="form-control" type="text" value="2 Years">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Age</label>
												<input class="form-control" type="text" value="-">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Salary From</label>
												<input type="text" class="form-control" value="32k">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Salary To</label>
												<input type="text" class="form-control" value="38k">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Job Type</label>
												<select class="select">
													<option selected>Full Time</option>
													<option>Part Time</option>
													<option>Internship</option>
													<option>Temporary</option>
													<option>Remote</option>
													<option>Others</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Status</label>
												<select class="select">
													<option selected>Open</option>
													<option>Closed</option>
													<option>Cancelled</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Start Date</label>
												<input type="text" class="form-control datetimepicker" value="3 Mar 2019">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Expired Date</label>
												<input type="text" class="form-control datetimepicker" value="31 May 2019">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Description</label>
												<textarea class="form-control"></textarea>
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Job Modal -->

				<!-- Delete Job Modal -->
				<div class="modal custom-modal fade" id="delete_job" role="dialog">
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
											<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Delete Job Modal -->
				
            </div>
			<!-- /Page Wrapper -->

@endsection