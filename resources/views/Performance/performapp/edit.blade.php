
<!-- Edit Performance Appraisal Modal -->
    <div id="edit_appraisal{{$item->id}}" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Performance Appraisal</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('updatePerformapp' , ['id' => $item->id])}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('put') }} 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Employee</label>
                                    <select class="select" name="employee">
                                        {{-- <option value="{{$item->employee}}">{{$item->employee}}</option> --}}
                                        <option value="Jhon Doe">John Doe</option>
                                        <option value="Mike Litorus">Mike Litorus</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" name="date" type="text" value="{{$item->date}}"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-box">
                                            <div class="row user-tabs">
                                                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                                    <ul class="nav nav-tabs nav-tabs-solid">
                                                        <li class="nav-item"><a href="#appr_technical1" data-bs-toggle="tab" class="nav-link active">Technical</a></li>
                                                        <li class="nav-item"><a href="#appr_organizational1" data-bs-toggle="tab" class="nav-link">Organizational</a></li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content">
                                            <div id="appr_technical1" class="pro-overview tab-pane fade show active">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                    <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Technical Competencies</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="2">Indicator</th>
                                                                        <th colspan="2">Expected Value</th>
                                                                        <th>Set Value</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Customer Experience</td>
                                                                        <td colspan="2">Intermediate</td>
                                                                        <td>
                                                                            <select name="cust_experience" class="form-control form-select">
                                                                                <option value="{{$item->cust_experience}}">{{$item->cust_experience}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                                <option value="Expert / Leader"> Expert / Leader</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Marketing</td>
                                                                        <td colspan="2">Advanced</td>
                                                                        <td>
                                                                            <select name="marketing" class="form-control form-select">
                                                                                <option value="{{$item->marketing}}">{{$item->marketing}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                                <option value="Expert / Leader"> Expert / Leader</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Management</td>
                                                                        <td colspan="2">Advanced</td>
                                                                        <td>
                                                                            <select name="management" class="form-control form-select">
                                                                                <option value="{{$item->management}}">{{$item->management}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                                <option value="Expert / Leader"> Expert / Leader</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Administration</td>
                                                                        <td colspan="2">Advanced</td>
                                                                        <td>
                                                                            <select name="administration" class="form-control form-select">
                                                                                <option value="{{$item->administration}}">{{$item->administration}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                                <option value="Expert / Leader"> Expert / Leader</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Presentation Skill</td>
                                                                        <td colspan="2">Expert / Leader</td>
                                                                        <td>
                                                                            <select name="present_skill" class="form-control form-select">
                                                                                <option value="{{$item->present_skill}}">{{$item->present_skill}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                                <option value="Expert / Leader"> Expert / Leader</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Quality Of Work</td>
                                                                        <td colspan="2">Expert / Leader</td>
                                                                        <td>
                                                                            <select name="quality_work" class="form-control form-select">
                                                                                <option value="{{$item->quality_work}}">{{$item->quality_work}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                                <option value="Expert / Leader"> Expert / Leader</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Efficiency</td>
                                                                        <td colspan="2">Expert / Leader</td>
                                                                        <td>
                                                                            <select name="efficiency" class="form-control form-select">
                                                                                <option value="{{$item->efficiency}}">{{$item->efficiency}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                                <option value="Expert / Leader"> Expert / Leader</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="appr_organizational1">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="bg-white">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Organizational Competencies</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="2">Indicator</th>
                                                                        <th colspan="2">Expected Value</th>
                                                                        <th>Set Value</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Integrity</td>
                                                                        <td colspan="2">Beginner</td>
                                                                        <td>
                                                                            <select name="integrity" class="form-control form-select">
                                                                                <option value="{{$item->integrity}}">{{$item->integrity}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Professionalism</td>
                                                                        <td colspan="2">Beginner</td>
                                                                        <td>
                                                                            <select name="professionalism" class="form-control form-select">
                                                                                <option value="{{$item->professionalism}}">{{$item->professionalism}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Team Work</td>
                                                                        <td colspan="2">Intermediate</td>
                                                                        <td>
                                                                            <select name="team_work" class="form-control form-select">
                                                                                <option value="{{$item->team_work}}">{{$item->team_work}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Critical Thinking</td>
                                                                        <td colspan="2">Advanced</td>
                                                                        <td>
                                                                            <select name="critical_thingking" class="form-control form-select">
                                                                                <option value="{{$item->critical_thingking}}">{{$item->critical_thingking}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Conflict Management</td>
                                                                        <td colspan="2">Intermediate</td>
                                                                        <td>
                                                                            <select name="conflict_manage" class="form-control form-select">
                                                                                <option value="{{$item->conflict_manage}}">{{$item->conflict_manage}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Attendance</td>
                                                                        <td colspan="2">Intermediate</td>
                                                                        <td>
                                                                            <select name="attendance" class="form-control form-select">
                                                                                <option value="{{$item->attendance}}">{{$item->attendance}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">Ability To Meet Deadline</td>
                                                                        <td colspan="2">Advanced</td>
                                                                        <td>
                                                                            <select name="ability_deadline" class="form-control form-select">
                                                                                <option value="{{$item->ability_deadline}}">{{$item->ability_deadline}}</option>
                                                                                <option value="Beginner"> Beginner</option>
                                                                                <option value="Intermediate"> Intermediate</option>
                                                                                <option value="Advanced"> Advanced</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Status</label>
                                    <select class="select" name="status">
                                        <option value="{{$item->status}}">{{$item->status}}</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
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
    <!-- /Edit Performance Appraisal Modal -->