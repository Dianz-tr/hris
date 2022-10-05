<!-- Add Modal -->
<div class="modal custom-modal fade" id="edit-budgets" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Budget</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editBudgets">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="editBudgetsId">
                    <div class="form-group">
                        <label>Budget Title</label>
                        <input class="form-control" type="text" id="editBudgetsTitle" name="budget_title"
                            placeholder="Budgets Title">
                    </div>

                    <label>Choose Budget Respect Type</label>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input BudgetType" type="radio" name="budget_type"
                                id="editBudgetsType" value="project">
                            <label class="form-check-label" for="project2">Project</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input BudgetType" type="radio" name="budget_type"
                                id="editBudgetsType" value="category">
                            <label class="form-check-label" for="category1">Category</label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>Start Date</label>
                        <div class="cal-icon"><input class="form-control datetimepicker" id="editBudgetsStart"
                                type="text" name="start_date" placeholder="Start Date"></div>
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <div class="cal-icon"><input class="form-control datetimepicker" type="text"
                                id="editBudgetsEnd" name="end_date" placeholder="End Date"></div>
                    </div>

                    <div class="form-group">
                        <label>Expected Revenues</label>
                    </div>
                    <div class="AllRevenuesClass">
                        <div class="row AlLRevenues">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Revenue Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control RevenuETitle" value=""
                                        placeholder="Revenue Title" id="rev-title" name="revenue_title"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Revenue Amount <span class="text-danger">*</span></label>
                                    <input id="revenue-edit" type="text" placeholder="Amount" value=""
                                        name="revenue_amount" class="form-control RevenuEAmount" autocomplete="off">
                                </div>
                            </div>
                            {{-- <div class="col-sm-1">
                                <div class="add-more">
                                    <a role="button" id="btn-reve" class="add_more_revenue" title="Add Revenue"
                                        style="cursor: pointer;"><i class="text-primary fa fa-plus-circle"></i></a>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Overall Revenues <span class="text-danger">(A)</span></label>
                        <input class="form-control" type="text" name="overall_revenue" value
                            id="edit-overall_revenue" placeholder="Overall Revenues" readonly
                            style="cursor: not-allowed;">
                    </div>

                    <div class="form-group">
                        <label>Expected Expenses</label>
                    </div>
                    <div class="AllExpensesClass">
                        <div class="row AlLExpenses">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Expenses Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control EXpensesTItle" value=""
                                        placeholder="Expenses Title" id="exp-title" name="expense_title"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Expenses Amount <span class="text-danger">*</span></label>
                                    <input id="expense-edit" type="text" name="expense_amount"
                                        placeholder="Amount" value="" class="form-control EXpensesAmount"
                                        autocomplete="off">
                                </div>
                            </div>
                            {{-- <div class="col-sm-1">
                                <div class="add-more">
                                    <a role="button" id="btn-exps" class="add_more_expenses" title="Add Expenses"
                                        style="cursor: pointer;"><i class="text-primary fa fa-plus-circle"></i></a>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Overall Expense <span class="text-danger">(B)</span></label>
                        <input class="form-control" type="text" name="overall_expense" id="edit-overall_expense"
                            placeholder="Overall Expenses" readonly style="cursor: not-allowed;">
                    </div>


                    <div class="form-group">
                        <label>Expected Profit <span class="text-danger">( C = A - B )</span> </label>
                        <input class="form-control" type="text" name="profit" id="profit-edit" value=""
                            placeholder="Expected Profit" readonly style="cursor: not-allowed;" size="40">
                    </div>

                    <div class="AllTaxClass">
                        <div class="row AlLTax">
                            <div class="col-sm-11">
                                <div class="form-group">
                                    <label>Taxes <span class="text-danger">*</span></label>
                                    <input id="tax-edit" type="text" name="tax_amount" placeholder="Tax Amount"
                                        value="" class="form-control TaxAmount" autocomplete="off">
                                </div>
                            </div>
                            {{-- <div class="col-sm-1">
                                <div class="add-more">
                                    <a role="button" id="btn-taxs" class="add_more_tax" title="Add Taxes"
                                        style="cursor: pointer;"><i class="text-primary fa fa-plus-circle"></i></a>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Budget Amount <span class="text-danger">( E = C - D )</span> </label>
                        <input class="form-control" type="text" value="" name="budget_amount"
                            id="edit-budget_amount" placeholder="Budget Amount" readonly
                            style="cursor: not-allowed;">
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Modal -->

{{-- @section('addJavascript') --}}
<!-- /cdn -->
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
{{-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}


<script>
    var expAmount;
    var revAmount;
    var profit;
    var taxAmount;

    $(document).ready(function() {
        // alert()

        $('#revenue-edit, #expense-edit, #tax-edit').keyup(function() {
            var revAmount = $('#revenue-edit').val();
            $('#edit-overall_revenue').val(revAmount);
            // console.log(revAmount);

            var expAmount = $('#expense-edit').val();
            $('#edit-overall_expense').val(expAmount);
            // alert(qty)

            var profit = revAmount - expAmount;
            $('#profit-edit').val(profit);

            var taxAmount = $('#tax-edit').val();

            var budgets = profit - taxAmount;
            $("#edit-budget_amount").val(budgets);

        });

    });
</script>
{{-- @endsection --}}
