
				<!-- Edit Addition Modal -->
				<div id="edit_addition{{$additions->id}}" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Addition</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('payrolltype/update', ['id' => $additions->id]) }}" method="post">
									{{csrf_field()}}
									{{method_field('patch')}}
									<div class="form-group">
										<input class="form-control" type="text" name="type" value="1" hidden>
										<label>Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="name" value="{{$additions->name}}">
									</div>
									<div class="form-group">
										<label>Category <span class="text-danger">*</span></label>
										<select class="select" name="category">
											<option value="{{$additions->category}}">Select a category</option>
											<option value="Monthly remuneration">Monthly remuneration</option>
											<option value="Additional remuneration">Additional remuneration</option>
										</select>
									</div>
									{{-- <div class="form-group">
										<label class="d-block">Unit calculation</label>
										<div class="status-toggle">
											<input type="checkbox" id="edit_unit_calculation" class="check">
											<label for="edit_unit_calculation" class="checktoggle">checkbox</label>
										</div>
									</div> --}}
									<div class="form-group">
										<label>Unit Amount</label>
										<div class="input-group">
											<span class="input-group-text">$</span>
											<input type="number" name="amount" value="{{$additions->amount}}" class="form-control">
											<span class="input-group-text">.00</span>
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
				<!-- /Edit Addition Modal -->
				