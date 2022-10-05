 <!-- Edit PF Modal -->
 <div id="edit-pf{{ $pv->id }}" class="modal custom-modal fade" role="dialog">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Edit Provident Fund</h5>
                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="{{ route('updateProvidentFund', ['id' => $pv->id]) }}" method="POST">
                     {{ csrf_field() }}
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Employee Name</label>
                                 <select class="form-control select" name="employee_name">
                                     @foreach ($employees as $employee)
                                         <option value="{{ $employee->id }}"
                                             {{ $employee->id == $pv->employee_name ? 'selected' : '' }}>
                                             {{ $employee->f_name }}
                                             {{ $employee->l_name }} ({{ $employee->employee_id }})</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Provident Fund Type</label>
                                 <select class="form-control select" name="provident_type">
                                     <option value="Fixed Amount" selected="{{ $pv->provident_type }}">Fixed Amount
                                     </option>
                                     <option value="Percentage of Basic Salary">Percentage of Basic
                                         Salary</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-12">
                             <div class="show-fixed-amount">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Employee Share (Amount)</label>
                                             <input class="form-control" type="text" name="employee_share_amount"
                                                 value="{{ $pv->employee_share_amount }}">
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Organization Share (Amount)</label>
                                             <input class="form-control" type="text" name="organization_share_amount"
                                                 value="{{ $pv->organization_share_amount }}">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-12">
                             <div class="show-basic-salary">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Employee Share (%)</label>
                                             <input class="form-control" type="text" name="employee_share"
                                                 value="{{ $pv->employee_share }}">
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Organization Share (%)</label>
                                             <input class="form-control" type="text" name="organization_share"
                                                 value="{{ $pv->organization_share }}">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label>Description</label>
                                 <textarea class="form-control" rows="4" name="description" value="{{ $pv->description }}">{{ $pv->description }}</textarea>
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
 <!-- /Edit PF Modal -->
