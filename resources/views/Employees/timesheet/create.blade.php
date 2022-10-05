
    <!-- Add Today Work Modal -->
    <div id="add_todaywork" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Today Work details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('timesheet.store') }}" method="post">
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Project <span class="text-danger">*</span></label>
                                <select class="select" name="project_id">
                                    @foreach ($projec as $projec)
                                        <option value="{{$projec->id}}">{{$projec->project_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text" name="date">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Hours <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="hours">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea rows="4" class="form-control" name="description"></textarea>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Today Work Modal -->
    