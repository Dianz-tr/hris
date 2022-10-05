
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
								
                    <form method="post" action="{{url('event/add')}}">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Title">Title :</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="cars">Choose a Color :</label>
                                    <select name="color" id="color" class="form-control">
                                        <option value="#292b2c">Inverse</option>
                                        <option value="#5bc0de">Info</option>
                                        <option value="#0275d8">Primary</option>
                                        <option value="#5cb85c">Success</option>
                                        <option value="#f0ad4e">warning</option>
                                        <option value="#d9534f">Danger</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="startdate"> Start Date <span class="text-danger">*</span></label>
                                <div class="cal-icon"> 
                                    <input class="form-control datetimepicker"  type="text" id="startdate" name="startdate"> 
                                </div>  
                            </div>
                            <div class="form-group">
                                <label for="enddate">End Date <span class="text-danger">*</span></label>
                                <div class="cal-icon"> 
                                    <input class="form-control datetimepicker"  type="text" id="enddate" name="enddate"> 
                                </div>  
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                        </div>
                        {{-- <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-success">Add Event</button>
                        </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Event Modal -->
             