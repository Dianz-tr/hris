<!-- Add Categories Modal -->
<div class="modal custom-modal fade" id="create-categories" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Categories</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCategories" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Categories Name <span class="text-danger">*</span></label>
                        <input class="form-control" name="category_name" id="addCategoryName" type="text">
                    </div>
                    <div class="form-group">
                        <label>Sub-Categories<span class="text-danger">*</span></label>
                        <input class="form-control" name="sub_category" id="addCategorySub" type="text">
                    </div>

                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Categories Modal -->
