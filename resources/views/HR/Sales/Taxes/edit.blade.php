<!-- Edit Tax Modal -->
<div id="edit-taxes" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Tax</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editTaxes">
                    <input type="hidden" name="id" id="editTaxesId">
                    <div class="form-group">
                        <label>Tax Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="editTaxesName" name="tax_name">
                    </div>
                    <div class="form-group">
                        <label>Tax Percentage (%) <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="editTaxesPercentage" name="tax_percentage">
                    </div>
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select class="select" id="editTaxesStatus" name="status">
                            <option>Inactive</option>
                            <option>Active</option>
                        </select>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Tax Modal -->
