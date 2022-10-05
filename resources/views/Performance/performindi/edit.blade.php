<!-- Edit Performance Indicator Modal -->
<div id="edit_indicator{{$pedi->id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Performance Indicator</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updatePerformindi', ['id' => $pedi->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put')}}
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
                                    <option value="{{$pedi->cust_experience}}">{{$pedi->cust_experience}}</option>
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
                                    <option value="{{$pedi->marketing}}">{{$pedi->marketing}}</option>
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
                                    <option value="{{$pedi->management}}">{{$pedi->management}}</option>
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
                                    <option value="{{$pedi->administration}}">{{$pedi->administration}}</option>
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
                                    <option value="{{$pedi->present_skill}}">{{$pedi->present_skill}}</option>
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
                                    <option value="{{$pedi->quality_work}}">{{$pedi->quality_work}}</option>
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
                                    <option value="{{$pedi->efficiency}}">{{$pedi->efficiency}}</option>
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
                                    <option value="{{$pedi->integrity}}">{{$pedi->integrity}}</option>
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
                                    <option value="{{$pedi->professionalism}}">{{$pedi->professionalism}}</option>
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
                                    <option value="{{$pedi->team_work}}">{{$pedi->team_work}}</option>
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
                                    <option value="{{$pedi->critical_thinking}}">{{$pedi->critical_thinking}}</option>
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
                                    <option value="{{$pedi->conflict_management}}">{{$pedi->conflict_management}}</option>
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
                                    <option value="{{$pedi->attendance}}">{{$pedi->attendance}}</option>
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
                                    <option value="{{$pedi->abblity_deadline}}">{{$pedi->abblity_deadline}}</option>
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
                                    <option value="{{$pedi->status}}">{{$pedi->status}}</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Performance Indicator Modal -->