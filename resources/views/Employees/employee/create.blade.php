
		<!-- Add Employee Modal -->
		<div id="add_employee" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Employee</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					<form action=" {{ route('employee.store') }} " method="POST">
					{{ csrf_field() }}
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">First Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="f_name" required>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Last Name</label>
										<input class="form-control" type="text" name="l_name">
									</div>
								</div>
								{{-- <div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Username <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="username">
									</div>
								</div> --}}
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Email <span class="text-danger">*</span></label>
										<input class="form-control" type="email" name="email" required>
									</div>
								</div>
								{{-- <div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Password</label>
										<input class="form-control" type="password" name="passwordformfield">
									</div>
								</div> --}}
								{{-- <div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Confirm Password</label>
										<input class="form-control" type="password">
									</div>
								</div> --}}
								{{-- <div class="col-sm-6">  
									<div class="form-group">
										<label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
										<input type="text" class="form-control" disabled>
									</div>
								</div> --}}
								<div class="col-sm-6">  
									<div class="form-group">
										<label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" type="text" name="join" required>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Phone </label>
										<input class="form-control" type="number" name="phone">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Company</label>
										<input class="form-control" type="text" name="company">
										{{-- <select class="select" name="company">
											<option value="">Global Technologies</option>
											<option value="1">Delta Infotech</option>
										</select> --}}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Department <span class="text-danger">*</span></label>
										<select class="select" name="department_id">
											<option value="0">Select Department</option>
											@foreach ($department as $dp)
												<option value="{{$dp->id}}">{{$dp->name}}</option>	
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Designation <span class="text-danger">*</span></label>
										<select class="select" name="designation_id" id="designation_id">
											<option value="0">Select Designation</option>
											@foreach($designation as $ds)
												<option value="{{ $ds->id}}">{{ $ds->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							{{-- <div class="table-responsive m-t-15">
								<table class="table table-striped custom-table">
									<thead>
										<tr>
											<th>Module Permission</th>
											<th class="text-center">Read</th>
											<th class="text-center">Write</th>
											<th class="text-center">Create</th>
											<th class="text-center">Delete</th>
											<th class="text-center">Import</th>
											<th class="text-center">Export</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Holidays</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
										</tr>
										<tr>
											<td>Leaves</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
										</tr>
										<tr>
											<td>Clients</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
										</tr>
										<tr>
											<td>Projects</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
										</tr>
										<tr>
											<td>Tasks</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
										</tr>
										<tr>
											<td>Chats</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
										</tr>
										<tr>
											<td>Assets</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
										</tr>
										<tr>
											<td>Timing Sheets</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input checked="" type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
											<td class="text-center">
												<input type="checkbox">
											</td>
										</tr>
									</tbody>
								</table>
							</div> --}}
							<div class="submit-section">
								<button class="btn btn-primary submit-btn">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Employee Modal -->
		