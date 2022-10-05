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
								<h3 class="page-title">Tickets</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Tickets</li>
								</ul>
							</div>
							<div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_ticket"><i class="fa fa-plus"></i> Add Ticket</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card-group m-b-30">
								<div class="card">
									<div class="card-body">
										<div class="d-flex justify-content-between mb-3">
											<div>
												<span class="d-block">New Tickets</span>
											</div>
											<div>
												<span class="text-success">+{{ $id = DB::table('tbl_tickets')->count() }}0%</span>
											</div>
										</div>
										<h3 class="mb-3"> {{ $id = DB::table('tbl_tickets')->count() }}</h3>
										<div class="progress mb-2" style="height: 5px;">
											<div class="progress-bar bg-primary" role="progressbar" style="width: {{ $id = DB::table('tbl_tickets')->count() }}0%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							
								<div class="card">
									<div class="card-body">
										<div class="d-flex justify-content-between mb-3">
											<div>
												<span class="d-block">Solved Tickets</span>
											</div>
											<div>
												<span class="text-success">+{{ $status = Db::table('tbl_tickets')->whereStatus('Closed')->count() }}0%</span>
											</div>
										</div>
										<h3 class="mb-3">{{ $status = Db::table('tbl_tickets')->whereStatus('Closed')->count() }}</h3>
										<div class="progress mb-2" style="height: 5px;">
											<div class="progress-bar bg-primary" role="progressbar" style="width: {{ $status = Db::table('tbl_tickets')->whereStatus('Closed')->count() }}0%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							
								<div class="card">
									<div class="card-body">
										<div class="d-flex justify-content-between mb-3">
											<div>
												<span class="d-block">Open Tickets</span>
											</div>
											<div>
												<span class="text-danger">-{{ $status = Db::table('tbl_tickets')->whereStatus('Open')->count() }}%</span>
											</div>
										</div>
										<h3 class="mb-3">{{ $status = Db::table('tbl_tickets')->whereStatus('Open')->count() }}</h3>
										<div class="progress mb-2" style="height: 5px;">
											<div class="progress-bar bg-primary" role="progressbar" style="width: {{ $status = Db::table('tbl_tickets')->whereStatus('Open')->count() }}0%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							
								<div class="card">
									<div class="card-body">
										<div class="d-flex justify-content-between mb-3">
											<div>
												<span class="d-block">Pending Tickets</span>
											</div>
											<div>
												<span class="text-danger">-{{ $status = Db::table('tbl_tickets')->whereStatus('On Hold')->count() }}0%</span>
											</div>
										</div>
										<h3 class="mb-3">{{ $status = Db::table('tbl_tickets')->whereStatus('On Hold')->count() }}</h3>
										<div class="progress mb-2" style="height: 5px;">
											<div class="progress-bar bg-primary" role="progressbar" style="width: {{ $status = Db::table('tbl_tickets')->whereStatus('On Hold')->count() }}0%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
					
					<!-- Search Filter -->
					{{-- <form action="{{ route('dtExpense')}}" method="get">
						{{csrf_field()}}
						<div class="row filter-row">
							<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
								<div class="form-group form-focus">
									<input type="search" name="carisatu" class="form-control floating">
									<label class="focus-label">Employee Name</label>
								</div>
							</div> --}}
							{{-- <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
								<div class="form-group form-focus select-focus">
									<select name="caridua" class="select floating"> 
										<option value="Open">Open</option>
										<option value="Reopened">Reopened</option>
										<option value="On Hold">On Hold</option>
										<option value="Closed">Closed</option>
										<option value="InProgress">In Progress</option>
										<option value="Cancelled">Cancelled</option>
									</select>
									<label class="focus-label">Status</label>
								</div>
							</div> --}}

							{{-- <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
								<div class="form-group form-focus select-focus">
									<select class="select floating" name=""> 
										<option> -- Select -- </option>
										<option> High </option>
										<option> Low </option>
										<option> Medium </option>
									</select>
									<label class="focus-label">Priority</label>
								</div>
							</div>

							<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
								<div class="form-group form-focus">
									<div class="cal-icon">
										<input class="form-control floating datetimepicker" type="text" name="cariempat">
									</div>
									<label class="focus-label">From</label>
								</div>
							</div>

							<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
								<div class="form-group form-focus">
									<div class="cal-icon">
										<input class="form-control floating datetimepicker" type="text" name="carilima">
									</div>
									<label class="focus-label">To</label>
								</div>
							</div> --}}
							
							{{-- <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
								<span class="from-group-btn">
									<button type="submit" class="btn btn-primary">Search</button>
								</span>  
							</div>     
						</div>
					</form> --}}
					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>#</th>
											<th>Ticket Id</th>
											<th>Ticket Subject</th>
											<th>Assigned Staff</th>
											<th>Created Date</th>
											<th>Last Reply</th>
											<th>Priority</th>
											<th class="text-center">Status</th>
											<th class="text-end">Actions</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($ticket as $tc)
										<tr>
											<td>{{ $loop->index + 1 }}</td>
											{{-- <td><a href="ticket-view.html">#TKT-0001</a></td> --}}
                                            <td>{{ $tc->ticket_id}}</td>
											<td>{{ $tc->ticket_subject}}</td>
											<td>
												<h2 class="table-avatar">
													<a class="avatar avatar-xs mb-3" href="profile.html"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
													<a href="#">{{$tc->assign_staff}}</a>
												</h2>
											</td>
											<td>{{ date('d F y h:i A', strtotime($tc->created_at))}}</td>
											<td>{{ date('d F y h:i A', strtotime($tc->updated_at))}}</td>
											<td>
                                                <div class=" action-label">
												@if ($tc->priority == 'Low')
													<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-success"></i> {{ $tc->priority}} 
													</a>
												@elseif($tc->priority == 'Medium')
													<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-warning"></i> {{ $tc->priority}} 
													</a>
												@else
													<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-danger"></i> {{ $tc->priority}} 
													</a>
												@endif
												</div>
											</td>
											<td>
                                                <div class=" action-label">
												@if ($tc->status == 'Open')
													<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-success"></i> {{ $tc->status}} 
													</a>
												@elseif($tc->status == 'Reopened')
													<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-info"></i> {{ $tc->status}} 
													</a>
												@elseif($tc->status == 'Cancelled')
													<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-warning"></i> {{ $tc->status}} 
													</a>
												@elseif($tc->status == 'Closed')
													<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-danger"></i> {{ $tc->status}} 
													</a>
												@elseif($tc->status == 'InProgress')
													<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-dark"></i> {{ $tc->status}} 
													</a>
												@else
													<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-info"></i> {{ $tc->status}} 
													</a>
												@endif
												</div>
											</td>
											<td class="text-end">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_ticket{{$tc->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_ticket{{$tc->id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
                                        @include('ticket.edit')
                                        @include('ticket.delete')
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
				<!-- Add Ticket Modal -->
				<div id="add_ticket" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Ticket</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
                                <form action="{{ route('storeTicket') }}" method="post">
                                    {{ csrf_field() }}
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Ticket Subject</label>
												<input class="form-control" type="text" name="ticket_subject">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Ticket Id</label>
												<input class="form-control" type="text" readonly disabled>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Assign Staff</label>
												<select class="select" name="assign_staff">
													@foreach ($employee as $emp)
														<option value="{{ $emp->f_name }} {{$emp->l_name}}">{{ $emp->f_name }} {{$emp->l_name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Client</label>
												<select class="select" name="client">
													@foreach ($clients as $client)
														<option value="{{ $client->id }}">{{ $client->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Priority</label>
												<select class="select" name="priority">
													<option value="High">High</option>
													<option value="Medium">Medium</option>
													<option value="Low">Low</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>CC</label>
												<input class="form-control" type="text" name="cc" required>
											</div>
										</div>
                                        <div class="col-sm-12">
											<div class="form-group">
												<label>Status</label>
												<select class="select" name="status">
													<option value="Open">Open</option>
													<option value="Reopened">Reopened</option>
													<option value="On Hold">On Hold</option>
													<option value="Closed">Closed</option>
													<option value="InProgress">In Progress</option>
													<option value="Cancelled">Cancelled</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Assign</label>
												<input type="text" class="form-control" name="assign">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Ticket Assignee</label>
												<div class="project-members">
													<a title="John Smith" data-placement="top" data-bs-toggle="tooltip" href="#" class="avatar">
														<img src="assets/img/profiles/avatar-02.jpg" alt="">
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Add Followers</label>
												<input type="text" class="form-control" name="add_followers" value="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Ticket Followers</label>
												<div class="project-members">
													<a title="Richard Miles" data-bs-toggle="tooltip" href="#" class="avatar">
														<img src="assets/img/profiles/avatar-09.jpg" alt="">
													</a>
													<a title="John Smith" data-bs-toggle="tooltip" href="#" class="avatar">
														<img src="assets/img/profiles/avatar-10.jpg" alt="">
													</a>
													<a title="Mike Litorus" data-bs-toggle="tooltip" href="#" class="avatar">
														<img src="assets/img/profiles/avatar-05.jpg" alt="">
													</a>
													<a title="Wilmer Deluna" data-bs-toggle="tooltip" href="#" class="avatar">
														<img src="assets/img/profiles/avatar-11.jpg" alt="">
													</a>
													<span class="all-team">+2</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Description</label>
												<textarea class="form-control" name="description"></textarea>
											</div>
											<div class="form-group">
												<label>Upload Files</label>
												<input class="form-control" type="file">
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
				<!-- /Add Ticket Modal -->
				
            </div>
			<!-- /Page Wrapper -->

@endsection