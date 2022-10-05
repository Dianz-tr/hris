
				<!-- Edit Deduction Modal -->
				<div id="edit_deduction{{$deductions->id}}" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Deduction</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('payrolltype/update', ['id' => $deductions->id]) }}" method="post">
									{{csrf_field()}}
									{{method_field('patch')}}
									<div class="form-group">
										<input class="form-control" type="text" name="type" value="3" hidden>
										<label>Name <span class="text-danger">*</span></label>
										<input name="name" value="{{$deductions->name}}" class="form-control" type="text">
									</div>
									{{-- <div class="form-group">
										<label class="d-block">Unit calculation</label>
										<div class="status-toggle">
											<input type="checkbox" id="edit_unit_calculation_deduction" class="check">
											<label for="edit_unit_calculation_deduction" class="checktoggle">checkbox</label>
										</div>
									</div> --}}
									<div class="form-group">
										<label>Unit Amount</label>
										<div class="input-group">
											<span class="input-group-text">$</span>
											<input name="amount" value="{{$deductions->amount}}" type="text" class="form-control">
											<span class="input-group-text">.00</span>
										</div>
									</div>
									{{-- <div class="form-group">
										<label class="d-block">Assignee</label>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="edit_deduction_assignee" id="edit_deduction_no_emp" value="option1" checked>
											<label class="form-check-label" for="edit_deduction_no_emp">
											No assignee
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="edit_deduction_assignee" id="edit_deduction_all_emp" value="option2">
											<label class="form-check-label" for="edit_deduction_all_emp">
											All employees
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="edit_deduction_assignee" id="edit_deduction_single_emp" value="option3">
											<label class="form-check-label" for="edit_deduction_single_emp">
											Select Employee
											</label>
										</div>
										<div class="form-group">
											<select class="select">
												<option>-</option>
												<option>Select All</option>
												<option>John Doe</option>
												<option>Richard Miles</option>
											</select>
										</div>
									</div> --}}
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Deduction Modal -->
				