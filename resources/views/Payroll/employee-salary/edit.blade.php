
<!-- Edit Salary Modal -->
<div id="edit_salary{{$item->id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Staff Salary</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('salary.update', ['id' => $item->id ]) }}" method="post">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label>Select Staff</label>
                                <select class="select"> 
                                @foreach($employee as $employee)
                                    <option value="{{ $employee->id }}"
                                        @if($item->employee->id == $employee->id)
                                            selected							
                                        @endif
                                    >
                                        {{ $employee->f_name }} {{$employee->l_name}}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6"> 
                            <label>Month</label>
                            <input class="form-control" type="text" name="for_month" value="${{$item->for_month}}">
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6"> 
                            <h4 class="text-primary">Earnings</h4>
                            <div class="form-group">
                                <label>Basic</label>
                                <input class="form-control" type="text" name="basic" value="{{$item->basic}}">
                            </div>
                            <div class="form-group">
                                <label>DA(40%)</label>
                                <input class="form-control" type="text" name="da" value="{{$item->da}}">
                            </div>
                            <div class="form-group">
                                <label>HRA(15%)</label>
                                <input class="form-control" type="text" name="hra" value="{{$item->hra}}">
                            </div>
                            <div class="form-group">
                                <label>Conveyance</label>
                                <input class="form-control" type="text" name="conveyance" value="{{$item->conveyance}}">
                            </div>
                            <div class="form-group">
                                <label>Allowance</label>
                                <input class="form-control" type="text" name="allowance" value="{{$item->allowance}}">
                            </div>
                            <div class="form-group">
                                <label>Medical Allowance</label>
                                <input class="form-control" type="text" name="medical_allowance" value="{{$item->medical_allowance}}">
                            </div>
                            <div class="form-group">
                                <label>Others</label>
                                <input class="form-control" type="text" name="other_earnings" value="{{$item->other_earnings}}">
                            </div>  
                        </div>
                        <div class="col-sm-6">  
                            <h4 class="text-primary">Deductions</h4>
                            <div class="form-group">
                                <label>TDS</label>
                                <input class="form-control" type="text" name="tds" value="{{$item->tds}}">
                            </div> 
                            <div class="form-group">
                                <label>ESI</label>
                                <input class="form-control" type="text" name="esi" value="{{$item->esi}}">
                            </div>
                            <div class="form-group">
                                <label>PF</label>
                                <input class="form-control" type="text" name="pf" value="{{$item->pf}}">
                            </div>
                            <div class="form-group">
                                <label>Leave</label>
                                <input class="form-control" type="text" name="leave" value="{{$item->leave}}">
                            </div>
                            <div class="form-group">
                                <label>Prof. Tax</label>
                                <input class="form-control" type="text" name="prof_tax" value="{{$item->prof_tax}}">
                            </div>
                            <div class="form-group">
                                <label>Labour Welfare</label>
                                <input class="form-control" type="text" name="labour_welfare" value="{{$item->labour_welfare}}">
                            </div>
                            <div class="form-group">
                                <label>Others</label>
                                <input class="form-control" type="text" name="other_deduction" value="{{$item->other_deduction}}">
                            </div>
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
<!-- /Edit Salary Modal -->
