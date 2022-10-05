<div id="clients-insert" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Client</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addClients" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Client Name<span class="text-danger">*</span></label>
                                <input class="form-control" id="addClientName" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Gender</label>
                            <div class="form-group m-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input BudgetType" type="radio" name="gender"
                                        id="addClientsGender" value="Male" checked="checked">Male
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input BudgetType" type="radio" name="gender"
                                        id="addClientsGender" value="Female">Female
                                </div>
                            </div>
                        </div>
                        <input class="form-control floating" id="addIdClient" type="hidden" disabled name="id_client">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control floating" id="addClientEmail" type="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Position <span class="text-danger">*</span></label>
                                <input class="form-control floating" id="addClientPosition" type="text"
                                    name="position">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Birthday <span class="text-danger">*</span></label>
                                <input class="form-control floating datetimepicker" id="addClientBirthday"
                                    type="text" name="birthday">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone </label>
                                <input class="form-control" id="addClientPhone" type="text" name="phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Company</label>
                                <input class="form-control" id="addClientCompany" type="text" name="company">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Address</label>
                                <input class="form-control" id="addClientAddress" type="text" name="alamat">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Foto</label>
                                <input class="form-control" type="file" name="image" id="addClientImage">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
