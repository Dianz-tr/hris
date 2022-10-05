				<!-- Edit Resignation Modal -->
				<div id="edit_resignation{{$res->id}}" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Resignation</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('updateResignation', ['id' => $res->id])}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
									<div class="form-group">
										<label>Resigning Employee <span class="text-danger">*</span></label>
                                        <select class="select" name="resig_employee">
                                            <option selected>{{$res->resig_employee}}</option>
                                            @foreach($employee as $epl)
                                                <option value="{{ $epl->f_name }} {{$epl->l_name}}">{{ $epl->f_name }} {{$epl->l_name}}</option>
                                            @endforeach
                                        </select>
									</div>
									<div class="form-group">
										<label>Notice Date <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input type="text" class="form-control datetimepicker" value="{{$res->not_date}}" name="not_date">
										</div>
									</div>
									<div class="form-group">
										<label>Resignation Date <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input type="text" class="form-control datetimepicker" value="{{$res->resig_date}}" name="resig_date">
										</div>
									</div>
									<div class="form-group">
										<label>Reason <span class="text-danger">*</span></label>
										<textarea class="form-control" rows="4" name="reason">{{$res->reason}}</textarea>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Resignation Modal -->