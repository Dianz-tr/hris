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
								<h3 class="page-title">Training</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Training</li>
								</ul>
							</div>
							<div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_training"><i class="fa fa-plus"></i> Add New </a>
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
											<th>Training Type</th>
											<th>Trainer</th>
											<th>Employee</th>
											<th>Time Duration</th>
											<th>Description </th>
											<th>Cost </th>
											<th>Status </th>
											<th class="text-end">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($training as $tra)
                                        <tr>
											<td>{{ $loop->index + 1}}</td>
                                            <td>{{ $tra->training_type }}</td>
											<td>
												<h2 class="table-avatar">
													<a href="#" class="avatar" title="{{$tra->trainer}}"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
													<a href="#">{{ $tra->trainer}} </a>
												</h2>
											</td>
											<td>
												<h2 class="table-avatar">
													<a href="#" class="avatar" title="{{$tra->employee}}"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
													<a href="#">{{ $tra->employee}} </a>
												</h2>
												{{-- <ul class="team-members">
													<li>
														<a href="#" title="{{ $tra->employee }}" data-bs-toggle="tooltip">
															<img alt="" src="assets/img/profiles/avatar-10.jpg">
														</a>
													</li> --}}
													{{-- <li>
														<a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
													</li>
													<li class="dropdown avatar-dropdown">
														<a href="#" class="all-users dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">+15</a>
														<div class="dropdown-menu dropdown-menu-right">
															<div class="avatar-group">
																<a class="avatar avatar-xs" href="#">
																	<img alt="" src="assets/img/profiles/avatar-02.jpg">
																</a>
																<a class="avatar avatar-xs" href="#">
																	<img alt="" src="assets/img/profiles/avatar-09.jpg">
																</a>
																<a class="avatar avatar-xs" href="#">
																	<img alt="" src="assets/img/profiles/avatar-10.jpg">
																</a>
																<a class="avatar avatar-xs" href="#">
																	<img alt="" src="assets/img/profiles/avatar-05.jpg">
																</a>
																<a class="avatar avatar-xs" href="#">
																	<img alt="" src="assets/img/profiles/avatar-11.jpg">
																</a>
																<a class="avatar avatar-xs" href="#">
																	<img alt="" src="assets/img/profiles/avatar-12.jpg">
																</a>
																<a class="avatar avatar-xs" href="#">
																	<img alt="" src="assets/img/profiles/avatar-13.jpg">
																</a>
																<a class="avatar avatar-xs" href="#">
																	<img alt="" src="assets/img/profiles/avatar-01.jpg">
																</a>
																<a class="avatar avatar-xs" href="#">
																	<img alt="" src="assets/img/profiles/avatar-16.jpg">
																</a>
															</div>
															<div class="avatar-pagination">
																<ul class="pagination">
																	<li class="page-item">
																		<a class="page-link" href="#" aria-label="Previous">
																			<span aria-hidden="true">«</span>
																			<span class="visually-hidden">Previous</span>
																		</a>
																	</li>
																	<li class="page-item"><a class="page-link" href="#">1</a></li>
																	<li class="page-item"><a class="page-link" href="#">2</a></li>
																	<li class="page-item">
																		<a class="page-link" href="#" aria-label="Next">
																			<span aria-hidden="true">»</span>
																			<span class="visually-hidden">Next</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</li>  --}}
												{{-- </ul> --}}
											</td>
                                            <td>{{ date('d F Y', strtotime($tra->start_date)) }} - {{ date('d F Y', strtotime($tra->end_date))}}</td>
                                            <td>{{ $tra->description }}</td>
                                            <td>{{ number_format($tra->cost,2) }}</td>
											{{-- <td>
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-success"></i> Active
													</a>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
													</div>
												</div>
											</td> --}}
                                            <td>{{ $tra->status}}</td>
											<td class="text-end">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#{{route('editTraining', ['id'=> $tra->id])}}" data-bs-toggle="modal" data-bs-target="#edit_training{{$tra->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_training"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										{{-- @include('training.edit') --}}
										@include('Training.training.edit')
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->

				<!-- Add Training List Modal -->
				<div id="add_training" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add New Training</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('storeTraining')}}" method="POST">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Training Type</label>
												<select class="select" name="training_type">
													@foreach($trainingtype as $tp)
														<option value="{{ $tp->type }}">{{ $tp->type }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Trainer</label>
												<select class="select" name="trainer">
													@foreach($trainers as $ts)
														<option value="{{ $ts->fname }} {{$ts->lname}}">{{ $ts->fname }} {{ $ts->lname }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Employees</label>
												<select class="select" name="employee">
													@foreach($employee as $ep)
														<option value="{{ $ep->f_name }} {{$ep->l_name}}">{{ $ep->f_name }} {{ $ep->l_name }}</option>
													@endforeach
													{{-- <option>Bernardo Galaviz</option>
													<option>Jeffrey Warden</option> --}}
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Training Cost <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="cost">
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
												<label class="col-form-label">Status</label>
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
				<!-- /Add Training List Modal -->
				
				
				
				<!-- Delete Training List Modal -->
				<div class="modal custom-modal fade" id="delete_training" role="dialog">
					@foreach($training as $tra)
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Training List</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										{{-- <div class="col-6">
											<a href="{{ route('deleteTraining', ['id'=> $tra->id ])}}" data-bs-dismiss="modal" class="btn btn-primary continue-btn">Delete</a>
										</div> --}}
										<div class="col-6">
											<a href="{{ route('deleteTraining', ['id'=> $tra->id])}}" class="btn btn-primary continue-btn">Delete</a>
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
				<!-- /Delete Training List Modal -->
			
            </div>
			<!-- /Page Wrapper -->

@endsection