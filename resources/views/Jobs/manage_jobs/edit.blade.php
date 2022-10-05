				<!-- Edit Job Modal -->
				<div id="edit_job{{$mj->id}}" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Job</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('updateManagejobs', ['id' => $mj->id])}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('put')}}
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Job Title</label>
												<input class="form-control" type="text" value="{{ $mj->job_title}}" name="job_title">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Department</label>
												<select class="select" name="departmen">
													<option value="{{ $mj->departmen}}">{{ $mj->departmen}}</option>
													<option value="Web Development">Web Development</option>
													<option value="Application Development">Application Development</option>
													<option value="It Management">IT Management</option>
													<option value="Accounts Management">Accounts Management</option>
													<option value="Support Management">Support Management</option>
													<option value="Marketing">Marketing</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Job Location</label>
												<input class="form-control" type="text" value="{{ $mj->job_location}}" name="job_location">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>No of Vacancies</label>
												<input class="form-control" type="text" value="{{$mj->no_vacancies}}" name="no_vacancies">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Experience</label>
												<input class="form-control" type="text" value="{{ $mj->experience}}" name="experience">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Age</label>
												<input class="form-control" type="text" value="{{ $mj->age}}" name="age">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Salary From</label>
												<input type="text" class="form-control" value="{{ $mj->salary_from}}" name="salary_from">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Salary To</label>
												<input type="text" class="form-control" value="{{$mj->salary_to}}" name="salary_to">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Job Type</label>
												<select class="select" name="job_type">
                                                    <option value="{{$mj->job_type}}">{{$mj->job_type}}</option>
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
                                                    <option value="{{$mj->status}}">{{$mj->status}}</option>
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
												<label>Start Date</label>
												<input type="" class="form-control datetimepicker" value="{{$mj->start_date}}" name="start_date">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Expired Date</label>
												<input type="text" class="form-control datetimepicker" value="{{$mj->end_date}}" name="end_date">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Description</label>
												<textarea class="form-control" name="description">{{$mj->description}}</textarea>
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