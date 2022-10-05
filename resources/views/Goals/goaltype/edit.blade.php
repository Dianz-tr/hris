 <!-- Edit Goal Modal -->
 <div id="edit_type{{$gt->id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Goal Type</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateGoaltype', ['id' => $gt->id ]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="form-group">
                        <label>Goal Type <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="type" value="{{$gt->type}}">
                    </div>
                    <div class="form-group">
                        <label>Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="4" name="description">{{$gt->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Status</label>
                        <input class="form-control" type="text" name="status" value="{{$gt->status}}">
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Goal Modal -->