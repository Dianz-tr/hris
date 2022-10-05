				<!-- Edit Termination Modal -->
				<div id="edit_termination{{$ter->id}}" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Termination</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
                                <form action="{{ route('updateTermination', ['id' => $ter->id ]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }} 
									<div class="form-group">
										<label>Terminated Employee <span class="text-danger">*</span></label>
										<input class="form-control" type="text" value="{{$ter->term_employee}}" name="term_employee">
									</div>
                                    <div class="form-group">
										<label>Departement <span class="text-danger">*</span></label>
										<div class="add-group-btn">
											<select class="select" name="departement">
                                                @foreach($departement as $dt)
                                                    <option value="{{ $dt->name }}">{{ $dt->name }}</option>
                                                @endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label>Termination Type <span class="text-danger">*</span></label>
										<div class="add-group-btn">
											<select class="select" name="term_type">
                                                <option value="{{$ter->term_type}}">{{$ter->term_type}}</option>
												<option value="Misconduct">Misconduct</option>
												<option value="Other">Others</option>
											</select>
											<a class="btn btn-primary" href="javascript:void(0);"><i class="fa fa-plus"></i> Add</a>
										</div>
									</div>
									<div class="form-group">
										<label>Termination Date <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input type="text" class="form-control datetimepicker" name="term_date" value="{{$ter->term_date}}">
										</div>
									</div>
									<div class="form-group">
										<label>Reason <span class="text-danger">*</span></label>
										<textarea class="form-control" rows="4" name="reason">{{$ter->reason}}</textarea>
									</div>
									<div class="form-group">
										<label>Notice Date <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input type="text" class="form-control datetimepicker" value="{{$ter->not_date}}" name="not_date">
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
				<!-- /Edit Termination Modal -->