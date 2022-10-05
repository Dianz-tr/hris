@extends('layouts.master')


@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Create Invoices</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Invoices</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <form action="{{ route('storeInvoices') }}" method="POST" id="">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Client <span class="text-danger">*</span></label>
                                    <select class="select" name="client_id" id="client_data">
                                        <option>Select Clients</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Project <span class="text-danger">*</span></label>
                                    <select class="select" name="project_id">
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" value="" id="email">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Tax</label>
                                    <select class="select" name="tax_id" id="taxpicker">
                                        <option value="">Select Tax</option>
                                        @foreach ($taxes as $tax)
                                            <option value="{{ $tax->id }}">{{ $tax->tax_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Client Address</label>
                                    <textarea class="form-control" rows="3" name="client_address" id="client_address"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Billing Address</label>
                                    <textarea class="form-control" rows="3" name="billing_address"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Invoices Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text" name="invoice_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Expiry Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text" name="expiry_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group w-50%">
                            <label for="status">Status</label>
                            <select class="form-control w-50" name="status" id="status">
                                <option value="Accepted">Accepted</option>
                                <option value="Declined">Declined</option>
                                <option value="Sent">Sent</option>
                                <option value="Expired">Expired</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table id="table_alterations"
                                        class="table table-bordered table-review review-table mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px">#</th>
                                                <th class="col-sm-2">Item</th>
                                                <th class="col-md-6">Description</th>
                                                <th style="width:100px;">Unit Cost</th>
                                                <th style="width:80px;">Qty</th>
                                                <th>Amount</th>
                                                <th><button type="button" class="btn btn-primary btn-add-row"><i
                                                            class="fa fa-plus"></i></button></th>
                                            </tr>
                                        </thead>
                                        <tbody id="boxes">
                                            <tr>
                                                <td>1</td>
                                                <td class="box">
                                                    <input class="form-control" type="text" style="min-width:150px"
                                                        name="item1[]">
                                                </td>
                                                <td class="box">
                                                    <input class="form-control" type="text" style="min-width:150px"
                                                        name="item1[]">
                                                </td>
                                                <td class="box">
                                                    <input onclick="test(1)" class="form-control input unit_cost"
                                                        style="width:100px" type="text" name="item1[]"
                                                        id="unit_cost1">
                                                </td>
                                                <td class="box">
                                                    <input onclick="test(1)" class="form-control input qty-in"
                                                        style="width:80px" type="text" name="item1[]" id="qty-in1">
                                                </td>
                                                <td class="box">
                                                    <input class="form-control output amount-input" readonly
                                                        style="width:120px" type="text" name="item1[]"
                                                        id="amount-input1">
                                                </td>
                                            </tr>
                                            <tr id="btn-amount">
                                                <td colspan="7">
                                                    <div class="position-relative float-end py-3" style="">
                                                        <button type="button" class="btn btn-primary btn-amount"
                                                            id="amount"><i class="fa fa-plus float-right">
                                                                Amount</i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-white">
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-end">Tax</td>
                                                <td style="text-align: right; padding-right: 30px;width: 230px">
                                                    <input class="form-control text-end" value="0" readonly
                                                        type="text" name="tax" id="tax-input">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-end">Total</td>
                                                <td style="text-align: right; padding-right: 30px;width: 230px">
                                                    <input class="form-control text-end" type="text" name="total"
                                                        id="total" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-end">
                                                    Discount %
                                                </td>
                                                <td style="text-align: right; padding-right: 30px;width: 230px">
                                                    <input class="form-control text-end" type="text" id="discount"
                                                        name="discount">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                    Grand Total
                                                </td>
                                                <td
                                                    style="text-align: right; padding-right: 30px; font-weight: bold; font-size: 16px;width: 230px">
                                                    <input class="text-end" type="number" id="grand_total"
                                                        name="grand_total" readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <input id="hidden" type="hidden" value="1" name="index">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Other Information</label>
                                            <textarea class="form-control" name="other_info" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            {{-- <button class="btn btn-primary submit-btn m-r-10">Save & Send</button> --}}
                            <button type="submit" class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </div>
            </form>
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
        integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script> --}}
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <script>
        var unit_cost;
        var qty;
        var amount;
        var percent;
        var percent1;
        var total;
        var discount;
        var grand_total;
        // var discount;

        let plus_id;
        let jumlah = 0;

        function test(n) {
            plus_id = n
            // alert(plus_id)

            $('.unit_cost ,.qty-in , .amount-input, #grand_total, #total, #discount').keyup(function() {
                var unit_cost = $('#unit_cost' + plus_id).val();
                // console.log('#unit_cost' + plus_id);
                // alert(unit_cost)
                // console.log(unit_cost);
                var qty = $('#qty-in' + plus_id).val();
                // console.log(qty);
                // alert(qty)

                var amount = parseInt(unit_cost) * parseInt(qty);
                console.log(amount);
                $('#amount-input' + plus_id).val(amount);
                // console.log(amount);

            });

            let jumlah;
            $('#btn-amount').click(function(e) {
                jumlah = 0;
                e.preventDefault();
                $(".output").each(function() {
                    jumlah += parseInt(this.value);
                    // alert(i)
                });

                // alert(tax)
                // console.log(percent);
                var tax = jumlah * percent / 100;
                // console.log(tax);
                var total = jumlah + tax;
                $('#total').val(jumlah);

                var discount = $('#discount').val() * total / 100;


                $("#grand_total").val(total - discount);
                // console.log();
            });
        }

        $(function() {

            $("#taxpicker").change(function(e) {
                e.preventDefault();
                let id = $(this).val();
                $.ajax({
                    type: "get",
                    url: "/show/tax/invoices",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(rsp) {
                        // console.log(rsp.clients[0].clients[0]);
                        // console.log(rsp.tax[0].tax_percentage);
                        percent = rsp.tax[0].tax_percentage;
                        percent1 = $("#tax-input").val(percent);
                        // console.log(percent);

                    }
                });
            });

            $("#client_data").change(function(e) {
                e.preventDefault();
                let id = $(this).val();
                $.ajax({
                    type: "get",
                    url: "/show/clients/invoices",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(rsp) {
                        // console.log(rsp.clients[0].email);
                        // console.log(rsp.tax[0].tax_percentage);
                        let email = rsp.clients[0].email;
                        $("#email").val(email);
                        let address = rsp.clients[0].address;
                        $("#client_address").val(address);

                    }
                });
            });
            let numer = 1;
            $(".btn-add-row").on('click', function() {
                var col;
                var row;
                col = $('#hidden').val();
                row = parseInt(col) + 1;
                $('#hidden').val(row);
                row = null;
                col = null;
                numer += 1
                var html = '';
                html += '<tr>';
                html += '<td>' + numer + '</td>';
                html +=
                    '<td class="box"><input class="form-control" type="text" style="min-width:150px" name="item' +
                    numer + '[]"></td>';
                html +=
                    '<td class="box"><input class="form-control" type="text" style="min-width:150px"name="item' +
                    numer + '[]"></td>';
                html +=
                    '<td class="box"><input onclick="test(' + numer +
                    ')" class="form-control input unit_cost" style="width:100px" type="text" name="item' +
                    numer + '[]" id="unit_cost' +
                    numer + '"></td>';
                html +=
                    '<td class="box"><input onclick="test(' + numer +
                    ')" class="form-control input qty-in" style="width:80px"type="text" name="item' +
                    numer + '[]" id="qty-in' +
                    numer + '"></td>';
                html +=
                    '<td class="box"><input class="form-control output amount-input" readonly style="width:120px" type="text" name="item' +
                    numer + '[]" id="amount-input' +
                    numer + '"></td>';
                html += '<tr/>';
                $('#btn-amount').before(html);
            });
        });
    </script>
@endsection
