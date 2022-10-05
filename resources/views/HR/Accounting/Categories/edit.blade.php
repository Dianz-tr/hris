<!-- Edit Categories Modal -->
<div class="modal custom-modal fade" id="edit-categories" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Categories</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCategories" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="editCategoriesId">
                    <div class="form-group">
                        <label>Categories Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="editCategoriesName" name="category_name">
                    </div>
                    <div class="form-group">
                        <label>Categories Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="editCategoriesSub" name="sub_category">
                    </div>

                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Categories Modal -->
