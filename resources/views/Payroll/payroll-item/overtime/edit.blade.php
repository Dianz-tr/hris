
				<!-- Edit Overtime Modal -->
				<div id="edit_overtime{{$overtime->id}}" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Overtime</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('payrolltype/update', ['id' => $overtime->id]) }}" method="post">
									{{csrf_field()}}
									{{method_field('patch')}}
									<div class="form-group">
										<input class="form-control" type="text" name="type" value="2" hidden>
										<label>Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="name" value="{{$overtime->name}}">
									</div>
									<div class="form-group">
										<label>Rate Type <span class="text-danger">*</span></label>
										<select class="select" name="rate_type"  value="{{$overtime->rate_type}}">
											<option value="{{$overtime->rate_type}}">-</option>
											<option value="Daily Rate">Daily Rate</option>
											<option value="Hourly Rate">Hourly Rate</option>
										</select>
									</div>
									<div class="form-group">
										<label>Rate <span class="text-danger">*</span></label>
										<input name="rate" value="{{$overtime->rate}}" class="form-control" type="text">
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Overtime Modal -->
				