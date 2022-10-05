        <!-- Edit Promotion Modal -->
        <div id="edit_promotion{{$prom->id}}" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Promotion</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updatePromotions', ['id' => $prom->id])}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('put')}}
                            <div class="form-group">
                                <label>Promotion For <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="{{ $prom->prom_employee}}" name="prom_employee">
                            </div>
                            <div class="form-group">
                                <label>Promotion From <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="{{$prom->prom_designation_from}}" name="prom_designation_from" readonly>
                            </div>
                            <div class="form-group">
                                <label>Promotion To <span class="text-danger">*</span></label>
                                <select class="select" name="prom_designation_to">
                                    <option value="{{$prom->prom_designation_to}}">{{$prom->prom_designation_to}}</option>
                                    <option value="Web Developer">Web Developer</option>
                                    <option value="Web Designer">Web Designer</option>
                                    <option value="SEO Analyst">SEO Analyst</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Promotion Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" name="prom_date" value="{{$prom->prom_date}}">
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
        <!-- /Edit Promotion Modal -->