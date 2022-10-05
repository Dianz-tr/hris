{{-- <!-- Modal -->
<div class="modal fade" id="department_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-image: linear-gradient(to right, #aca1fc, #7f72e5);color:white">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:#fff">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLongTitle"
                    style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
                    Add new Departement</h5>
            </div>
            <div class="modal-body" style="background-color: #f5f4f9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="modal-title" id="exampleModalLongTitle"
                            style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:#7f72e5">
                            New Departement Portal</h3>
                    </div>
                    <form method="post" id="addDepartment">
                        <div class="panel-body">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" >
                                </div>
                                <br>    
                        </div>
                        <div class="modal-footer">
                            <button style="background-image: linear-gradient(to right, #db706a, #d54b44);"type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button style="background-image: linear-gradient(to right, #82e1b6, #63ca9c);" type="sumbit" class="btn btn-primary">Save Division</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}

				<!-- Add Department Modal -->
				<div id="department_insert" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Department</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
                                <form method="post" id="addDepartment">
									<div class="form-group">
										<label>Department Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="name">
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Department Modal -->