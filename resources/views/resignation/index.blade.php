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
								<h3 class="page-title">Resignation</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Resignation</li>
								</ul>
							</div>
							<div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_resignation"><i class="fa fa-plus"></i> Add Resignation</a>
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
											<th>Resigning Employee </th>
											<th>Reason </th>
											<th>Notice Date </th>
											<th>Resignation Date </th>
											<th class="text-end">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($resignation as $res)
                                        <tr>
											<td>{{$loop->index + 1}}</td>
											<td>
												<h2 class="table-avatar blue-link">
													<a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
													<a href="profile.html">{{$res->resig_employee}}</a>
												</h2>
											</td>
											<td>{{$res->reason}}</td>
											<td>{{ date('d F Y', strtotime($res->not_date))}}</td>
											<td>{{ date('d F Y', strtotime($res->resig_date))}}</td>
											<td class="text-end">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_resignation{{$res->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_resignation{{$res->id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
                                        @include('resignation.edit')
										@include('resignation.delete')
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->

				<!-- Add Resignation Modal -->
				<div id="add_resignation" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Resignation</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('storeResignation')}}" method="POST">
                                    {{ csrf_field() }}
									<div class="form-group">
										<label>Resigning Employee <span class="text-danger">*</span></label>
										{{-- <input class="form-control" type="text" name="resig_employee"> --}}
                                        <select class="select" name="resig_employee">
                                            @foreach($employee as $epl)
                                                <option value="{{ $epl->f_name }} {{$epl->l_name}}">{{ $epl->f_name }} {{$epl->l_name}}</option>
                                            @endforeach
                                        </select>
									</div>
									<div class="form-group">
										<label>Notice Date <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input type="text" class="form-control datetimepicker" name="not_date">
										</div>
									</div>
									<div class="form-group">
										<label>Resignation Date <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input type="text" class="form-control datetimepicker" name="resig_date">
										</div>
									</div>
									<div class="form-group">
										<label>Reason <span class="text-danger">*</span></label>
										<textarea class="form-control" rows="4" name="reason"></textarea>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Resignation Modal -->
            </div>
			<!-- /Page Wrapper -->

@endsection