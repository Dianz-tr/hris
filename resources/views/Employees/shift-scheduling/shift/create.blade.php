
    <!-- Add Shift Modal -->
    <div id="add_shift" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Shift</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('shift.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Shift Name <span class="text-danger">*</span></label>
                                    <div class="input-group time timepicker">
                                        <input class="form-control" type="text" name="name" required><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label>Min Start Time <span class="text-danger">*</span></label>
                                    <div class="input-group time timepicker">
                                        <input class="form-control" type="time" name="min_star_t" required><span class="input-group-text" type="time"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Start Time <span class="text-danger">*</span></label>
                                    <div class="input-group time timepicker">
                                        <input class="form-control" type="time" name="star_t" required><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                    </div>									
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Max Start Time <span class="text-danger">*</span></label>
                                    <div class="input-group time timepicker">
                                        <input class="form-control" type="time" name="max_star_t" required><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                    </div>											
                                </div>
                            </div>		
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label>Min End Time <span class="text-danger">*</span></label>
                                    <div class="input-group time timepicker">
                                        <input class="form-control" type="time" name="min_end_t" required><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>End Time <span class="text-danger">*</span></label>
                                    <div class="input-group time timepicker">
                                        <input class="form-control" type="time" name="end_t" required><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                    </div>									
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Max End Time <span class="text-danger">*</span></label>
                                    <div class="input-group time timepicker">
                                        <input class="form-control" type="time" name="max_end_t" required><span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                    </div>											
                                </div>
                            </div>	
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Break Time (In Minutes) </label>
                                    <input type="number" class="form-control" name="break_t" required>											
                                </div>
                            </div>
                            {{-- <div class="col-sm-12">
                                <div class="custom-control form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                    <label class="form-check-label" for="customCheck1">Recurring Shift</label>
                                </div>
                            </div> --}}
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Repeat Every</label>
                                    <select class="select" name="repeat_every">
                                        <option value="1">1 </option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option selected value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
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
                                    <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="end_on" required></div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-12">
                                <div class="custom-control form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                    <label class="form-check-label" for="customCheck2">Indefinite</label>
                                </div>
                            </div> --}}
                    
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Add Tag </label>
                                    <input type="text" class="form-control" name="add_tag">											
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Add Note </label>
                                    <textarea class="form-control" name="add_note"></textarea>											
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
    <!-- /Add Shift Modal -->