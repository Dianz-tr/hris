
				<!-- Edit Today Work Modal -->
				<div id="edit_todaywork{{$th->id}}" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Work Details</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
                                <form action="#"></form>
                                <form action="{{ route('timesheet.update', ['id' => $th->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('patch') }}
									<div class="row">
										<div class="form-group col-sm-6">
											<label>Project <span class="text-danger">*</span></label>
                                            <select class="select" name="project_id">
                                                @foreach($projec as $projec)
                                                    <option value="{{ $projec->id }}"
                                                        @if($th->projec_id == $projec->id)
                                                            selected							
                                                        @endif
                                                    >
                                                        {{ $projec->project_name }}
                                                    </option>
                                                @endforeach
											</select>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label>Date <span class="text-danger">*</span></label>
											<div class="cal-icon">
                                            <input class="form-control datetimepicker" value="{{$th->date}}" name="date" type="text">
                                    </div>
										</div>
										<div class="form-group col-sm-6">
											<label>Hours <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" value="{{$th->hours}}" name="hours">
                                    </div>
									</div>
									<div class="form-group">
										<label>Description <span class="text-danger">*</span></label>
                                        <textarea rows="4" class="form-control" value="{{$th->description}}" name="description">{{$th->description}}</textarea>
                                    </div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Today Work Modal -->
				