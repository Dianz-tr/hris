<!-- Add Modal -->
<div class="modal custom-modal fade" id="create-expenses" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pendapatan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addExpenses" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Amount
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="amount" id="addExpensesAmount">
                        </div>
                        {{-- <div class="col-lg-6">
                            <select name="currency_symbol" class="form-control form-select">
                                <option value="$ - AUD">$ - Australian Dollar</option>
                                <option value="Bs. - VEF">Bs. - Bolívar Fuerte</option>
                                <option value="R$ - BRL">R$ - Brazilian Real</option>
                                <option value="£ - GBP">£ - British Pound</option>
                                <option value="$ - CAD">$ - Canadian Dollar</option>

                            </select>
                        </div> --}}
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Notes
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-12">
                            <textarea class="form-control ta" name="note" id="addExpensesNote"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Expenses Date
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-12">
                            <input class="form-control datetimepicker" type="text" name="expense_date"
                                id="addExpensesDate">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Category
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-12">
                            <select name="category_name" class="form-control m-b form-select" id="addExpensesCategory">
                                <option value="" disabled="" selected="">Choose Category
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label">Sub Category
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-12">
                            <select name="sub_category" class="form-control m-b form-select" id="addExpensesSub">
                                <option value="" disabled="" selected="">Choose
                                    Sub-Category
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->sub_category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-12 control-label">Attach File</label>
                        <div class="col-lg-12">
                            <input type="file" class="form-control" data-buttontext="Choose File" data-icon="false"
                                data-classbutton="btn btn-default" data-classinput="form-control inline input-s"
                                name="file" id="addExpensesFile">
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Modal -->
