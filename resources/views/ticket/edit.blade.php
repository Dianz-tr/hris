				<!-- Edit Ticket Modal -->
				<div id="edit_ticket{{$tc->id}}" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Ticket</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
                                <form action="{{ route('updateTicket', ['id' => $tc->id ])}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Ticket Subject</label>
												<input class="form-control" type="text" value="{{$tc->ticket_subject}}" name="ticket_subject">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Ticket Id</label>
												<input class="form-control" type="text" readonly disabled name="ticket_id" value="{{$tc->ticket_id}}">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Assign Staff</label>
												<select class="select" name="assign_staff">
													<option value="{{ $tc->assign_staff}}">{{$tc->assign_staff}}</option>
													<option value="Mike Litorus">Mike Litorus</option>
													<option value="Jhon Smith">John Smith</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Client</label>
												<select class="select" name="client">
													<option value="{{$tc->client}}">{{$tc->client}}</option>
													<option value="Delta Infotech">Delta Infotech</option>
													<option value="International Software Inc">International Software Inc</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Priority</label>
												<select class="select" name="priority">
													<option value="{{$tc->priority}}">{{$tc->priority}}</option>
													<option value="High">High</option>
													<option value="Medium">Medium</option>
													<option value="Low">Low</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>CC</label>
												<input class="form-control" type="text" name="cc" value="{{$tc->cc}}">
											</div>
										</div>
                                        <div class="col-sm-12">
											<div class="form-group">
												<label>Status</label>
												<select class="select" name="status">
													<option value="{{$tc->status}}">{{$tc->status}}</option>
													<option value="Open">Open</option>
													<option value="Reopened">Reopened</option>
													<option value="On Hold">On Hold</option>
													<option value="Closed">Closed</option>
													<option value="InProgress">In Progress</option>
													<option value="Cancelled">Cancelled</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Assign</label>
												<input type="text" class="form-control" name="assign" value="{{$tc->assign}}">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Ticket Assignee</label>
												<div class="project-members">
													<a title="{{$tc->assign}}" data-placement="top" data-bs-toggle="tooltip" href="#" class="avatar">
														<img src="assets/img/profiles/avatar-02.jpg" alt="">
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Add Followers</label>
												<input type="text" class="form-control" name="add_followers" value="{{$tc->add_followers}}">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Ticket Followers</label>
												<div class="project-members">
													@foreach ($ticket as $tc)
														<a title="{{$tc->add_followers}}" data-bs-toggle="tooltip" href="#" class="avatar">
															<img src="assets/img/profiles/avatar-09.jpg" alt="">
														</a>
													@endforeach
													
													{{-- untuk ngitung jumlah foto --}}
													{{-- <span class="all-team">+{{ $id = DB::table('tbl_tickets')->count() }}</span> --}}
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Description</label>
												<textarea class="form-control" name="description">{{$tc->description}}</textarea>
											</div>
											{{-- <div class="form-group">
												<label>Upload Files</label>
												<input class="form-control" type="file">
											</div> --}}
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Ticket Modal -->