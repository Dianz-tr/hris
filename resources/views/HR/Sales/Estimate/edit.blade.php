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
                        <h3 class="page-title">Edit Estimate</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Estimate</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <form action="{{ route('storeEstimate') }}" method="POST" id="">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <form>
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
                                        <input class="form-control" type="email" name="email" value=""
                                            id="email">
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
                                        <label>Estimate Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" name="estimate_date">
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
                                            <tbody id="table_alterations_tbody">
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px"
                                                            name="item" value="">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px"
                                                            name="description">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:100px" type="text"
                                                            name="unit_cost" id="unit_cost">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:80px" type="text"
                                                            name="qty" id="qty-in">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" readonly style="width:120px"
                                                            type="text" name="amount" id="amount-in">
                                                    </td>
                                                    {{-- <td>
                                                        <button type="button" class="btn btn-primary btn-add-row"><i
                                                                class="fa fa-plus"></i></button>
                                                    </td> --}}
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
                                                        <input class="form-control text-end" value="0" disabled
                                                            type="text" name="tax" id="tax-input">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" class="text-end">Total</td>
                                                    <td style="text-align: right; padding-right: 30px;width: 230px">
                                                        <input class="form-control text-end" type="text"
                                                            name="total" id="total" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" class="text-end">
                                                        Discount %
                                                    </td>
                                                    <td style="text-align: right; padding-right: 30px;width: 230px">
                                                        <input class="form-control text-end" type="text"
                                                            id="discount" name="discount">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="text-align: right; font-weight: bold">
                                                        Grand Total
                                                    </td>
                                                    <td
                                                        style="text-align: right; padding-right: 30px; font-weight: bold; font-size: 16px;width: 230px">
                                                        <input class="text-end" disabled type="test" id="grand_total"
                                                            name="grand_total">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Other Information</label>
                                                <textarea class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                {{-- <button class="btn btn-primary submit-btn m-r-10">Save & Send</button> --}}
                                <button type="submit" class="btn btn-primary submit-btn">Save</button>
                        </form>
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
    {{-- <script>
        const vues = Vue.createApp({
            data() {
                return {
                    count: '',
                }
            },
            mounted() {
                $(document).ready(function() {
                    $("#client_data").change(function(e) {
                        e.preventDefault();
                        let val = $(this).val();
                        $.ajax({
                            type: "get",
                            url: "show/data/estimates",
                            data: {
                                id: val
                            },
                            success: function(rsp) {
                                vues.count = rsp;
                            }
                        });
                    });
                });
            },
        }).mount('#app')
    </script> --}}
    <script>
        var unit_cost;
        var qty;
        var amount;
        var percent;
        var total;
        var discount;
        var grand_total;
        // var discount;


        $(function() {
            $('#unit_cost, #qty-in, #grand_total, #total, #discount').keyup(function() {
                var unit_cost = $('#unit_cost').val();
                // alert(unit_cost)
                var qty = $('#qty-in').val();
                // alert(qty)

                var amount = unit_cost * qty;
                // console.log(amount);
                $('#amount-in').val(amount);

                var total = parseInt($('#amount-in').val()) + parseInt($("#tax-input").val());
                $("#total").val(total);

                var discount = $('#discount').val() * total / 100;

                // var totalDiskon = total * discount;
                // console.log(discount);
                // $("#discount").val(discount);
                // console.log(discount);
                // var grand_total =;
                $("#grand_total").val(total - discount);

            });

            $("#taxpicker").change(function(e) {
                e.preventDefault();
                let id = $(this).val();
                $.ajax({
                    type: "get",
                    url: "/show/tax/estimates",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(rsp) {
                        // console.log(rsp.clients[0].clients[0]);
                        // console.log(rsp.tax[0].tax_percentage);
                        let percent = rsp.tax[0].tax_percentage;
                        $("#tax-input").val(percent);
                    }
                });
            });

            $("#client_data").change(function(e) {
                e.preventDefault();
                let id = $(this).val();
                $.ajax({
                    type: "get",
                    url: "/show/clients/estimates",
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


            $(function() {
                $(document).on("click", '.btn-add-row', function() {
                    var id = $(this).closest("table.table-review").attr(
                        'id'); // Id of particular table
                    console.log(id);
                    var div = $("<tr />");
                    div.html(GetDynamicTextBox(id));
                    $("#" + id + "_tbody").append(div);
                });
                $(document).on("click", "#comments_remove", function() {
                    $(this).closest("tr").prev().find('td:last-child').html(
                        '<button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button>'
                    );
                    $(this).closest("tr").remove();
                });

                function GetDynamicTextBox(table_id) {
                    $('#comments_remove').remove();
                    var rowsLength = document.getElementById(table_id).getElementsByTagName("tbody")[0]
                        .getElementsByTagName("tr").length + 1;
                    return '<td>' + rowsLength + '</td>' +
                        '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' +
                        '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' +
                        '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' +
                        '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' +
                        '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' +
                        '<td><button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button></td>'
                }
            });
        });
    </script>
@endsection
