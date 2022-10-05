
<!-- Add Event Modal -->
<div id="add_event" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('event.store')}}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Event Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label type="date">Start Date <span class="text-danger">*</span></label>
                        <div class="cal-icon"  >
                            <input class="form-control datetimepicker" type="text" id="startdate" name="startdate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label type="date">End Date <span class="text-danger">*</span></label>
                        <div class="cal-icon"  >
                            <input class="form-control datetimepicker" type="text" id="enddate" name="enddate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Category</label>
                        <select class="select form-control" name="category" id="category">
                            <option selected value="red">Merah</option>
                            <option value="green">Success</option>
                            <option value="purple">Purple</option>
                            <option value="blue">Primary</option>
                            {{-- <option>Pink</option>
                            <option>Info</option>
                            <option>Inverse</option>
                            <option>Orange</option>
                            <option>Brown</option>
                            <option>Teal</option>
                            <option>Warning</option> --}}
                        </select>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- /Add Event Modal -->
    