
<!-- Edit Overtime Modal -->
<div id="edit_overtime{{$ov->id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Overtime</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('overtime.update', ['id' => $ov->id]) }}" method="post">
                {{csrf_field()}}
                {{method_field('patch')}}
                    <div class="form-group">
                        <label>Select Employee <span class="text-danger">*</span></label>
                        <select class="select" name="employee_id">
                            @foreach($employee as $employee)
                                <option value="{{ $employee->id }}"
                                    @if($ov->employee->id == $employee->id)
                                        selected							
                                    @endif
                                >{{ $employee->f_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Overtime Date <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input class="form-control datetimepicker" type="text" name="ot_date" value="{{$ov->ot_date}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Overtime Hours <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="ot_hours" value="{{$ov->ot_hours}}">
                    </div>
                    <div class="form-group">
                        <label>Description <span class="text-danger">*</span></label>
                        <textarea rows="4" class="form-control" name="description" value="{{$ov->description}}"> {{$ov->description}} </textarea>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Overtime Modal -->
