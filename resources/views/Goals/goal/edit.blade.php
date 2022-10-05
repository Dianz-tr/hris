
    <!-- Edit Goal Modal -->
    <div id="edit_goal{{$gl->id}}" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Goal Tracking</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateGoal', ['id' => $gl->id ]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('put') }} 
                        {{-- @foreach ($goal as $gl) --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Goal Type</label>
                                    <input class="form-control" type="text" name="goal_type" value="{{$gl->goal_type}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Subject</label>
                                    <input class="form-control" type="text" value="Test Goal" name="subject" value="{{$gl->subject}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Target Achievement</label>
                                    <input class="form-control" type="text" name="target_achievement" value="{{$gl->target_achievement}}">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Start Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" value="{{$gl->start_date}}" type="text" name="start_date"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>End Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" value="{{$gl->end_date}}" type="text" name="end_date"></div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="customRange">Progress</label>
                                    <input type="range" class="form-control-range form-range" id="customRange">
                                    <div class="mt-2" id="result">Progress Value: <b></b></div>
                                </div>
                            </div> --}}
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="4" name="description">{{$gl->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Status</label>
                                    <input class="form-control" type="text" name="status" value="{{$gl->status}}">
                                    </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Goal Modal -->
    