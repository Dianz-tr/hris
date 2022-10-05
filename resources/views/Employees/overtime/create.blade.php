
<!-- Add Overtime Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Overtime</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('overtime.store') }}" method="post">
                {{ csrf_field() }}

                    <div class="form-group">
                        <label>Select Employee <span class="text-danger">*</span></label>
                        <select class="select" name="employee_id">
                            @foreach ($employee as $employee)
                                <option value="{{$employee->id}}">{{ $employee->f_name }} {{ $employee->l_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Overtime Date <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input name="ot_date" class="form-control datetimepicker" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Overtime Hours <span class="text-danger">*</span></label>
                        <input name="ot_hours" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Description <span class="text-danger">*</span></label>
                        <textarea name="description" rows="4" class="form-control"></textarea>
                    </div>
                    <input type="hidden" class="form-control" id="approved_by" name="approved_by"
                        value="{{ Auth::user()->name }}">
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Overtime Modal -->
