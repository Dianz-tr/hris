
    <!-- Approve Leave Modal -->
    <div class="modal custom-modal fade" id="approve_leave{{$ls->id}}" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <div class="row">
                            <button type="button" class="col-md-4 ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h3>Leave Approve</h3>
                            <p>Are you sure want to approve for this leave?</p>
                        </div>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{route('approve.pending', ['id'=>$ls->id])}}" class="btn btn-primary continue-btn">Pending</a>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{route('approve.approved', ['id'=>$ls->id])}}" class="btn btn-primary continue-btn">Approved</a>
                            </div>
                            <div class="col-6">
                                <a href="{{route('approve.declined', ['id'=>$ls->id])}}" class="btn btn-primary continue-btn">Declined</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Approve Leave Modal -->
    