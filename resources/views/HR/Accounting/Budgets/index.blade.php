@extends('layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div id="budgets">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Budgets</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Accounts</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#create-budgets"><i
                                    class="fa fa-plus"></i> Add Budgets</a>
                        </div>
                    </div>
                </div>

                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 text-center">
                                <thead>
                                    <tr>
                                        <th>Budget No</th>
                                        <th>Budget Title</th>
                                        <th>Budget Type</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Total Revenue</th>
                                        <th>Total Expenses</th>
                                        <th>Tax Amount</th>
                                        <th>Budget Amount</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(budget, index) in budgets">
                                        <td>@{{ index + 1 }}</td>
                                        <td>@{{ budget.budget_title }}</td>
                                        <td>@{{ budget.budget_type }}</td>
                                        <td>@{{ budget.start_date }}</td>
                                        <td>@{{ budget.end_date }}</td>
                                        <td>@{{ budget.overall_revenue }}</td>
                                        <td>@{{ budget.overall_expense }}</td>
                                        <td>@{{ budget.tax_amount }}</td>
                                        <td>@{{ budget.budget_amount }}</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a @click="editBudget(budget.id)" class="dropdown-item" href="#"
                                                        data-bs-toggle="modal" data-bs-target="#edit-budgets"><i
                                                            class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a @click="onDelete(budget.id)" class="dropdown-item" href="#"><i
                                                            class="fa fa-trash-o m-r-5"></i>
                                                        Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @include('HR.Accounting.Budgets.create')
            <!-- /Page Content -->
            @include('HR.Accounting.Budgets.edit')

        </div>
        <!-- /cdn -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>

        <script>
            var appComponent = new Vue({
                el: "#budgets",
                data: {
                    budgets: [

                    ],
                },
                mounted() {
                    this.renderData();
                    // this.$nextTick(function() {

                    // });
                },
                methods: {
                    renderData() {
                        $.ajax({
                            url: "/api/dataBudgets",
                            success: function(rsp) {
                                appComponent.budgets = rsp;
                                // console.log(this.revenues);

                            }
                        });
                    },
                    editBudget(id) {
                        console.log(id);
                        $.ajax({
                            url: '/api/editBudgets/' + id,
                            type: 'get',
                            dataType: 'json',
                            success: function(rsp) {
                                console.log(rsp);
                                $('#editBudgetsId').val(rsp.id);
                                $('#editBudgetsTitle').val(rsp.budget_title);
                                $('#editBudgetsType').val(rsp.budget_type);
                                $('#editBudgetsStart').val(rsp.start_date);
                                $('#editBudgetsEnd').val(rsp.end_date);
                                $('#editBudgetsEnd').val(rsp.end_date);
                                $('#rev-title').val(rsp.revenue_title);
                                $('#revenue-edit').val(rsp.revenue_amount);
                                $('#edit-overall_revenue').val(rsp.overall_revenue);
                                $('#exp-title').val(rsp.expense_title);
                                $('#expense-edit').val(rsp.expense_amount);
                                $('#edit-overall_expense').val(rsp.overall_expense);
                                $('#profit-edit').val(rsp.profit);
                                $('#tax-edit').val(rsp.tax_amount);
                                $('#edit-budget_amount').val(rsp.budget_amount);
                                // console.log(rsp.name);
                            }
                        });
                    },

                    onDelete(id) {
                        var budgets = this.budgets;
                        // console.log(id);
                        $.ajax({
                            url: '/api/deleteBudgets/' + id,
                            type: 'get',
                            dataType: 'json',
                            success: function(rsp) {
                                // console.log(rsp);
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: "You won't be able to revert this!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        )
                                        appComponent.renderData();
                                    }
                                })
                            }
                        });
                    }
                }
            });

            // Add Clients
            $("#addBudgets").on('submit', function(e) {
                //prevent Default functionality
                e.preventDefault();
                //do your own request an handle the results
                var data = $(this).serialize();

                $.ajax({
                    url: '/api/insertBudgets',
                    type: 'post',
                    dataType: 'json',
                    data: data,
                    success: function(rsp) {
                        // console.log(rsp);
                        if (rsp != null) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Data has been add.',
                                type: 'success',
                                confirmButtonText: 'OK'
                            })
                            appComponent.renderData();
                            $('#create-budgets').modal('hide');
                            $('#addBudgets')[0].reset();
                        }
                        // console.log(rsp);
                    }
                });
            });

            $("#editBudgets").on('submit', function(e) {
                //prevent Default functionality
                e.preventDefault();

                var id = $('#editBudgetsId').val();
                var budgets = appComponent.budgets;
                var data = $(this).serialize();
                //do your own request an handle the results
                $.ajax({
                    url: '/api/updateBudgets/' + id,
                    type: 'post',
                    dataType: 'json',
                    data: data,
                    success: function(rsp) {
                        // console.log(rsp);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data has been add.',
                            type: 'success',
                            confirmButtonText: 'OK'
                        })
                        appComponent.renderData();
                        $('#edit-budgets').modal('hide');
                    }
                });

            });
        </script>
    @endsection
