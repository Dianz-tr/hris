    <!-- Edit Leave Modal -->
    <div id="edit_leave{{$ls->id}}" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Leave</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateLeaves', ['id' => $ls->id])}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Leave Type <span class="text-danger">*</span></label>
                            <select class="select" name="leave_type">
                                @if ($ls->leave_type == $ls->leave_type)
                                    <option value="{{$ls->leave_type}}"selected>{{$ls->leave_type}}</option>
                                    <option value="Medical Leave">Medical Leave</option>
                                    <option value="Loss of Pay">Loss of Pay</option>
                                    <option value="Casual Leave 12 Days">Casual Leave 12 Days</option>
                                @endif
                                {{-- <option value="{{$lea->leaf_type}}">{{ $lea->leave_type}}</option> --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>From <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" value="{{$ls->from_date}}" type="text" name="from_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>To <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" value="{{$ls->to_date}}" type="text" name="to_date">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Number of days <span class="text-danger">*</span></label>
                            <input class="form-control" readonly type="text" value="{{$ls->days}}" name="days">
                        </div> --}}
                        <div class="form-group">
                            <label>Leave Reason <span class="text-danger">*</span></label>
                            <textarea rows="4" class="form-control" name="leave_reason">{{$ls->leave_reason}}</textarea>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Leave Modal -->