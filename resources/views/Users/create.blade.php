
        <!-- Add User Modal -->
        <div id="add_user" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add User</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="app" class="modal-body">
                        <form action="{{ route('users.create') }}" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-6">  
                                    <div class="form-group">
                                        <label>Employee ID <span class="text-danger">*</span></label>
                                        <select class="select" name="Employee_id">
                                            <option selected>Pilih</option>
                                            @foreach ($employee as $employee)
                                                <option value="{{$employee->employee_id}}">{{$employee->employee_id}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="select" name="role">
                                            <option value="Employee">Employee</option>
                                            <option value="Admin">Admin</option>
                                            {{-- <option value="Client">Client</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" required>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" class="form-control" type="password" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" required>
                                    </div>
                                </div>
                                    <input v-for=" c in count" class="form-control" type="number" v-model="c.id" name="id_employ" hidden>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input v-for=" c in count" class="form-control" type="text" v-model="c.f_name" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input v-for=" c in count" class="form-control" type="text" v-model="c.l_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input v-for=" c in count" class="form-control" type="email" v-model="c.email" name="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input v-for=" c in count" class="form-control" type="text" v-model="c.phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input v-for=" c in count" class="form-control" type="text" v-model="c.company">
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
        <!-- /Add User Modal -->
        