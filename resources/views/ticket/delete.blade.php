                <!-- Delete Training List Modal -->
				<div class="modal custom-modal fade" id="delete_ticket{{$tc->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="form-header">
                                        <h3>Delete Training List</h3>
                                        <p>Are you sure want to delete?</p>
                                    </div>
                                    <div class="modal-btn delete-action">
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{ route('deleteTicket', ['id' => $tc->id]) }}" class="btn btn-primary continue-btn">Delete</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
				</div>
				<!-- /Delete Training List Modal -->