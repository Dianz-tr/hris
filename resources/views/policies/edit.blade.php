    <!-- Edit Policy Modal -->
    <div id="edit_policy{{$pc->id}}" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Policy</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updatePolicies', ['id' => $pc->id ]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>Policy Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="pol_name" value="{{$pc->pol_name}}">
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="4" name="description">{{$pc->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Department</label>
                            <select class="select" name="depart">
                                <option>{{$pc->depart}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Created <span class="text-danger">*</span></label>
                            <input class="form-control datetimepicker" name="created_at" type="text" value="{{$pc->created_at}}"> </input>
                        </div>
                        {{-- <div class="form-group">
                            @if ($message = Session::get('success'))
        
                                <div class="alert alert-success alert-block">
        
                                    <button type="button" class="close" data-dismiss="alert">×</button>
        
                                    <strong>{{ $message }}</strong>
        
                                </div>
        
                            @endif
        
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <label>Upload Policy <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="policy_upload">
                        </div> --}}
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Policy Modal -->