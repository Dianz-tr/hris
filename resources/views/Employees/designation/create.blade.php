
	<!-- Add Designation Modal -->
	<div id="add_designation" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Designation</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action=" {{ route('designation.store') }} " method="POST">
					{{ csrf_field() }}
						<div class="form-group">
							<label>Designation Name <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="name">
						</div>
						<div class="form-group">
							<label>Department <span class="text-danger">*</span></label>
							<select class="select" name="department_id" id="department_id">
								@foreach($department as $department)
									<option value="{{ $department->id}}">{{ $department->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn" onclick="addTodo()">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Designation Modal -->