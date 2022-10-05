				<!-- Edit Job Modal -->
				<div id="edit_question{{$inqu->id}}" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Questions</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
                                <form action="{{ route('updateInterquest', ['id' => $inqu->id])}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Category</label>
												<select class="select" name="category">
													<option value="{{$inqu->category}}">{{$inqu->category}}</option>
													<option value="HTML">HTML</option>
													<option value="CSS">CSS</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Department</label>
												<select class="select" name="department">
													<option value="{{$inqu->department}}">{{$inqu->department}}</option>
													<option value="Web Development">Web Development</option>
													<option value="Application Developer">Application Development</option>
													<option value="IT Management">IT Management</option>
													<option value="Accounts Management">Accounts Management</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Edit Questions</label>
												<textarea class="form-control" name="question">{{ $inqu->question}}</textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Option A</label>
												<input class="form-control" type="text" value="{{$inqu->opa}}" name="opa">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Option B</label>
												<input class="form-control" type="text" value="{{$inqu->opb}}" name="opb">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Option C</label>
												<input class="form-control" type="text" value="{{$inqu->opc}}" name="opc">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Option D</label>
												<input class="form-control" type="text" value="{{$inqu->opd}}" name="opd">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Correct Answer</label>
												<select class="select" name="cor_answer">
													<option value="{{$inqu->cor_answer}}">{{$inqu->cor_answer}}</option>
													<option value="A">Option A</option>
													<option value="B">Option B</option>
													<option value="C">Option C</option>
													<option value="D">Option D</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										{{-- <div class="col-md-6">
											<div class="form-group">
												<label>Code Snippets</label>
												<textarea class="form-control">
												
												</textarea>
											</div>
										</div> --}}
										<div class="col-md-12">
											<div class="form-group">
												<label>Answer Explanation</label>
												<textarea class="form-control" name="exp_answer" >{{$inqu->exp_answer}}</textarea>
											</div>
										</div>
                                        
									</div>
									{{-- <div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Add Video Link</label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Add Image To Question</label>
												<input class="form-control" type="file">
											</div>
										</div>
									</div> --}}
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Cancel</button>
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Job Modal -->