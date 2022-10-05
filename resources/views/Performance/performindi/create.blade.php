
    <!-- Add Performance Indicator Modal -->
    <div id="add_indicator" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Set New Indicator</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storePerformindi')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Designation</label>
                                    <select class="select" name="designation_id">
                                        @foreach ($designation as $des)
                                            <option value="{{$des->id}}">{{$des->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="modal-sub-title">Technical</h4>
                                <div class="form-group">
                                    <label class="col-form-label">Customer Experience</label>
                                    <select class="select" name="cust_experience">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Marketing</label>
                                    <select class="select" name="marketing">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Management</label>
                                    <select class="select" name="management">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Administration</label>
                                    <select class="select" name="administration">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Presentation Skill</label>
                                    <select class="select" name="present_skill">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Quality Of Work</label>
                                    <select class="select" name="quality_work">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Efficiency</label>
                                    <select class="select" name="efficiency">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="modal-sub-title">Organizational</h4>
                                <div class="form-group">
                                    <label class="col-form-label">Integrity</label>
                                    <select class="select" name="integrity">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Professionalism</label>
                                    <select class="select" name="professionalism">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Team Work</label>
                                    <select class="select" name="team_work">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Critical Thinking</label>
                                    <select class="select" name="critical_thinking">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Conflict Management</label>
                                    <select class="select" name="conflict_management">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Attendance</label>
                                    <select class="select"  name="attendance">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Ability To Meet Deadline</label>
                                    <select class="select" name="abblity_deadline">
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Expert / Leader">Expert / Leader</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Status</label>
                                    <select class="select" name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
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
    <!-- /Add Performance Indicator Modal -->
    