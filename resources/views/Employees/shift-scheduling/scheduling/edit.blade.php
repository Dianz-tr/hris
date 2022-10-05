
                <!-- Edit Schedule Modal -->
				<div id="edit_schedule{{$a->id}}" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Schedule</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{route('schedule.update', ['id'=>$a->id])}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('put')}}
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Department <span class="text-danger">*</span></label>
												<select class="select" name="department_id">
                                                    @foreach ($department as $department)
                                                        @if ($a->department_id == $department->id)
													        <option value="{{$department->id}}" selected>{{$department->name}} </option>
                                                        @endif
                                                            <option value="{{$department->id}}">{{$department->name}}</option>	
                                                    @endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
                                            <div class="form-group">
												<label class="col-form-label">Employee Name <span class="text-danger">*</span></label>
												<select class="select" name="employee_id">
                                                    @foreach ($employee as $e)
                                                        @if ($a->employee_id == $e->id)
													        <option value="{{$e->id}}" selected>{{$e->f_name}} {{$e->l_name}}</option>
                                                        @endif
                                                            <option value="{{$e->id}}">{{$e->f_name}} {{$e->l_name}}</option>	
                                                    @endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Date <span class="text-danger">*</span></label>
                                                <div class="cal-icon">
                                                    <input class="form-control datetimepicker" type="text" name="date" value="{{$a->date}}">
                                                </div>
                                            </div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Shifts <span class="text-danger">*</span></label>
												<select class="select" name="shift_id">
                                                    @foreach ($shift as $s)
                                                        @if ($s->shift_id === $s->id)
													        <option value="{{$s->id}}" selected>{{$s->name}}</option>
														@elseif ($s->shift_id === NULL)
															<option value="">-- Select Option --</option>	
                                                        @endif
                                                            <option value="{{$s->id}}">{{$s->name}}</option>	
                                                    @endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="col-form-label">Min Start Time  <span class="text-danger">*</span></label>
												<input class="form-control" type="time" name="min_star_t" value="{{$a->min_star_t}}">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="col-form-label">Start Time  <span class="text-danger">*</span></label>
												<input class="form-control" type="time" name="star_t" value="{{$a->star_t}}">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="col-form-label">Max Start Time  <span class="text-danger">*</span></label>
												<input class="form-control" type="time" name="max_star_t" value="{{$a->max_star_t}}">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="col-form-label">Min End Time  <span class="text-danger">*</span></label>
												<input class="form-control" type="time" name="min_end_t" value="{{$a->min_end_t}}">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="col-form-label">End Time   <span class="text-danger">*</span></label>
												<input class="form-control" type="time" name="end_t" value="{{$a->end_t}}">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="col-form-label">Max End Time <span class="text-danger">*</span></label>
												<input class="form-control" type="time" name="max_end_t" value="{{$a->max_end_t}}">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="col-form-label">Break Time  <span class="text-danger">*</span></label>
												<input class="form-control" type="number" name="break_t" value="{{$a->break_t}}">
											</div>
										</div>
										{{-- <div class="col-sm-12">
											<div class="custom-control form-check">
												<input type="checkbox" class="form-check-input" id="customCheck1">
												<label class="form-check-label" for="customCheck1">Recurring Shift</label>
										  	</div>
										</div> --}}
										<div class="col-sm-12">
											<div class="form-group">
												<label class="col-form-label">Repeat Every</label>
												<select class="select" name="repeat_every">
                                                    @if ($a->repeat_every == $a->repeat_every)
                                                        <option value="{{$a->repeat_every}}"selected>{{$a->repeat_every or 0}}</option>
                                                        <option value="1">1 </option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                    @endif
												</select>
												<label class="col-form-label">Week(s)</label>
											</div>
										</div>
										{{-- <div class="col-sm-12">
											<div class="form-group wday-box">
												
													<label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="monday" class="days recurring" checked="" onclick="return false;"><span class="checkmark">M</span></label>
				
													<label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="tuesday" class="days recurring" checked="" onclick="return false;"><span class="checkmark">T</span></label>
												
													<label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="wednesday" class="days recurring" checked="" onclick="return false;"><span class="checkmark">W</span></label>
												
													<label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="thursday" class="days recurring" checked="" onclick="return false;"><span class="checkmark">T</span></label>
												
													<label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="friday" class="days recurring" checked="" onclick="return false;"><span class="checkmark">F</span></label>
												
													<label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="saturday" class="days recurring" onclick="return false;"><span class="checkmark">S</span></label>
												
													<label class="checkbox-inline"><input type="checkbox" name="week_days[]" value="sunday" class="days recurring" onclick="return false;"><span class="checkmark">S</span></label>
											</div>
										</div> --}}
										<div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">End On <span class="text-danger">*</span></label>
                                                <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="end_on" value="{{$a->end_on}}"></div>
                                            </div>
										</div>
										{{-- <div class="col-sm-12">
											<div class="custom-control form-check">
												<input type="checkbox" class="form-check-input" id="customCheck2">
												<label class="form-check-label" for="customCheck2">Indefinite</label>
										  	</div>
										</div> --}}
										<div class="col-sm-12">
											<div class="form-group">
												<label class="col-form-label">Accept Extra Hours </label>
												<div class="form-check form-switch">
													<input type="checkbox" class="form-check-input" id="customSwitch3" checked="">
													<label class="form-check-label" for="customSwitch3"></label>
												  </div>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label class="col-form-label">Publish </label>
												<div class="form-check form-switch">
													<input type="checkbox" class="form-check-input" id="customSwitch4" checked="">
													<label class="form-check-label" for="customSwitch4"></label>
												  </div>
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
				<!-- /Edit Schedule Modal -->