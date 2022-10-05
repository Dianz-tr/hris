
				<!-- Add Addition Modal -->
				<div id="add_addition" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Addition</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('payrolltype/store') }}" method="post">
									{{ csrf_field() }}
									<div class="form-group">
										<label>Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="name_a">
									</div>
									<div class="form-group">
										<label>Category <span class="text-danger">*</span></label>
										<select class="select" name="category_a">
											<option>Select a category</option>
											<option value="Monthly remuneration">Monthly remuneration</option>
											<option value="Additional remuneration">Additional remuneration</option>
										</select>
									</div>
									{{-- <div class="form-group">
										<label class="d-block">Unit calculation</label>
										<div class="status-toggle">
											<input type="checkbox" id="unit_calculation" class="check">
											<label for="unit_calculation" class="checktoggle">checkbox</label>
										</div>
									</div> --}}
									<div class="form-group">
										<label>Unit Amount</label>
										<div class="input-group">
											<span class="input-group-text">$</span>
											<input type="number" name="amount_a" class="form-control">
											<span class="input-group-text">.00</span>
										</div>
									</div>
									{{-- <div class="form-group">
										<label class="d-block">Assignee</label>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="addition_assignee" id="addition_no_emp" value="option1" checked>
											<label class="form-check-label" for="addition_no_emp">
											No assignee
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="addition_assignee" id="addition_all_emp" value="option2">
											<label class="form-check-label" for="addition_all_emp">
											All employees
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="addition_assignee" id="addition_single_emp" value="option3">
											<label class="form-check-label" for="addition_single_emp">
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
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Addition Modal -->
				