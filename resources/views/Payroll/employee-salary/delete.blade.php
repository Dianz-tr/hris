
<!-- Delete Salary Modal -->
<div class="modal custom-modal fade" id="delete_salary{{$item->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Salary</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                {{-- <form action="{{ route('salary.destroy', ['id' => $item->id]) }}" method="post"> --}}

                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('salary.destroy', ['id' => $item->id]) }}" type="submit" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
<!-- /Delete Salary Modal -->
