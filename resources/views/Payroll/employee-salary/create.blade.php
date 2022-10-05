
<!-- Add Salary Modal -->
<div id="add_salary" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Staff Salary</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('salary.store') }}" method="post">
                    {{csrf_field()}}
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Select Staff</label>
                                <select class="select" name="employee_id">
                                    @foreach ($employee as $emp)
                                        <option value="{{$emp->id}}">{{$emp->f_name}} {{$emp->l_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6"> 
                            <label>Month</label>
                            <input name="for_month" class="form-control datetimepicker" type="text">
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <h4 class="text-primary">Earnings</h4>
                            <div class="form-group">
                                <label>Basic</label>
                                <input name="basic" value="0" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label>DA(40%)</label>
                                <input name="da" value="0" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label>HRA(15%)</label>
                                <input name="hra" value="0" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label>Conveyance</label>
                                <input name="conveyance" value="0" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label>Allowance</label>
                                <input name="allowance" value="0" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label>Medical  Allowance</label>
                                <input name="medical_allowance" value="0" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label>Others</label>
                                <input name="other_earnings" value="0" class="form-control" type="number">
                            </div>
                        </div>
                        <div class="col-sm-6">  
                            <h4 class="text-primary">Deductions</h4>
                            <div class="form-group">
                                <label>TDS</label>
                                <input name="tds" value="0" class="form-control" type="number">
                            </div> 
                            <div class="form-group">
                                <label>ESI</label>
                                <input name="esi" value="0" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label>PF</label>
                                <input name="pf" value="0" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label>Leave</label>
                                <input name="leave" value="0" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label>Prof. Tax</label>
                                <input name="prof_tax" value="0" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label>Labour Welfare</label>
                                <input name="labour_welfare" value="0" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label>Others</label>
                                <input name="other_deduction" value="0" class="form-control" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Salary Modal -->
