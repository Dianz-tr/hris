
<!-- Edit Shift Modal -->
<div id="edit_shift{{$sf->id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Shift</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('shift.update', ['id'=>$sf->id])}}" method="post">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Shift Name <span class="text-danger">*</span></label>
                                <div class="input-group time timepicker">
                                    <input class="form-control" value="{{$sf->name}}" name="name"><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" >
                                <label>Min Start Time <span class="text-danger">*</span></label>
                                <div class="input-group time timepicker">
                                    <input class="form-control" type="time" value="{{$sf->min_star_t}}" name="min_star_t"><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Start Time <span class="text-danger">*</span></label>
                                <div class="input-group time timepicker">
                                    <input class="form-control" type="time" value="{{$sf->star_t}}" value="star_t"><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>									
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Max Start Time <span class="text-danger">*</span></label>
                                <div class="input-group time timepicker">
                                    <input class="form-control" type="time" value="{{$sf->max_star_t}}" name="max_star_t"><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>											
                            </div>
                        </div>		
                        <div class="col-md-4">
                            <div class="form-group" >
                                <label>Min End Time <span class="text-danger">*</span></label>
                                <div class="input-group time timepicker">
                                    <input class="form-control" type="time" value="{{$sf->min_end_t}}" name="min_end_t"><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>End Time <span class="text-danger">*</span></label>
                                <div class="input-group time timepicker">
                                    <input class="form-control" type="time" value="{{$sf->end_t}}" name="end_t"><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>									
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Max End Time <span class="text-danger">*</span></label>
                                <div class="input-group time timepicker">
                                    <input class="form-control" type="time" value="{{$sf->max_end_t}}" name="max_end_t"><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>											
                            </div>
                        </div>	
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Break Time (In Minutes) </label>
                                <input type="number" class="form-control" value="{{$sf->break_t}}" name="break_t">											
                            </div>
                        </div>
                        {{-- <div class="col-sm-12">
                            <div class="custom-control form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck3">
                                <label class="form-check-label" for="customCheck3">Recurring Shift</label>
                                </div>
                        </div> --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Repeat Every</label>
                                <select class="select" name="repeat_every">
                                    @if ($sf->repeat_every == $sf->repeat_every)
                                        <option value="{{$sf->repeat_every}}"selected>{{$sf->repeat_every}}</option>
                                        <option value="1">1 </option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    @endif
                                </select>
                                <label class="col-form-label">Week(s)</label>
                            </div>
                        </div>
                        {{-- <div class="col-sm-12">
                            <div class="form-group wday-box">
                                <label class="checkbox-inline"><input type="checkbox" value="monday" class="days recurring" checked=""><span class="checkmark">M</span></label>

                                <label class="checkbox-inline"><input type="checkbox" value="tuesday" class="days recurring" checked=""><span class="checkmark">T</span></label>
                            
                                <label class="checkbox-inline"><input type="checkbox" value="wednesday" class="days recurring" checked=""><span class="checkmark">W</span></label>
                            
                                <label class="checkbox-inline"><input type="checkbox" value="thursday" class="days recurring" checked=""><span class="checkmark">T</span></label>
                            
                                <label class="checkbox-inline"><input type="checkbox" value="friday" class="days recurring" checked=""><span class="checkmark">F</span></label>
                            
                                <label class="checkbox-inline"><input type="checkbox" value="saturday" class="days recurring"><span class="checkmark">S</span></label>
                            
                                <label class="checkbox-inline"><input type="checkbox" value="sunday" class="days recurring"><span class="checkmark">S</span></label>
                            </div>
                        </div> --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">End On <span class="text-danger">*</span></label>
                                <div class="cal-icon"><input class="form-control datetimepicker" type="text" value="{{$sf->end_on}}" name="end_on"></div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-12">
                            <div class="custom-control form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck4">
                                <label class="form-check-label" for="customCheck4">Indefinite</label>
                                </div>
                        </div> --}}
                
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Add Tag </label>
                                <input type="text" class="form-control" value="{{$sf->add_tag}}" name="add_tag">											
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Add Note </label>
                                <textarea class="form-control" name="add_note" value="{{$sf->add_note}}">{{$sf->add_note}}</textarea>											
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
<!-- /Edit Shift Modal -->
