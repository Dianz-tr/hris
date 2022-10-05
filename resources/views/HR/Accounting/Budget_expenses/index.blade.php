@extends('layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div id="expenses">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Pengeluaran</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">HR</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal"
                                data-bs-target="#create-expenses"><i class="fa fa-plus"></i>Tambah</a>
                        </div>
                        @include('HR.Accounting.Budget_expenses.create')
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Notes</th>
                                        <th>Category Name</th>
                                        <th>SubCategory Name</th>
                                        <th>Amount</th>
                                        <th>Expenses Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(expense, index) in expenses">
                                        <td>@{{ index + 1 }}</td>
                                        <td>@{{ expense.note }}</td>
                                        <td>@{{ expense.categories.category_name }}</td>
                                        <td>@{{ expense.categories.sub_category }}</td>
                                        <td>@{{ expense.expense_date }}</td>
                                        <td>@{{ expense.amount }}</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a @click="editExpenses(expense.id)" class="dropdown-item"
                                                        href="#" data-bs-toggle="modal"
                                                        data-bs-target="#edit-expenses"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a @click="onDelete(expense.id)" class="dropdown-item"><i
                                                            class="fa fa-trash m-r-5"></i>
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
                <!-- /Page Content -->
            </div>
            @include('HR.Accounting.Budget_expenses.edit')

        </div>
        <!-- /Page Wrapper -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>

        <script>
            var appComponent = new Vue({
                el: "#expenses",
                data: {
                    expenses: [

                    ],
                },
                mounted() {
                    this.renderData();
                },
                methods: {
                    renderData() {
                        $.ajax({
                            url: "/api/dataExpenses",
                            success: function(rsp) {
                                appComponent.expenses = rsp;
                                // console.log(this.clients);
                            }
                        });
                    },
                    editExpenses(id) {
                        console.log(id);
                        $.ajax({
                            url: '/api/editExpenses/' + id,
                            type: 'get',
                            dataType: 'json',
                            success: function(rsp) {
                                console.log(rsp);
                                $('#editExpensesId').val(rsp.id);
                                $('#editExpensesAmount').val(rsp.amount);
                                $('#editExpensesNote').val(rsp.note);
                                $('#editExpensesDate').val(rsp.expense_date);
                                $('#editExpensesCategory').val(rsp.category_id);
                                $('#editExpensesSub').val(rsp.sub_category);
                            }
                        });
                    },

                    onDelete(id) {
                        // console.log(id);
                        $.ajax({
                            url: '/api/deleteExpenses/' + id,
                            type: 'get',
                            dataType: 'json',
                            success: function(rsp) {
                                console.log(rsp);
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
                                    }
                                    appComponent.renderData();
                                })
                                // console.log(rsp.name);
                            }
                        });
                    }
                }
            });

            // Add Clients
            $("#addExpenses").on('submit', function(e) {
                //prevent Default functionality
                e.preventDefault();
                var file_data = $('#addExpensesFile').prop('files')[0];
                var amount = $('#addExpensesAmount').val();
                var expense_date = $('#addExpensesDate').val();
                var note = $('#addExpensesNote').val();
                var category_id = $('#addExpensesCategory').val();
                var sub_category = $('#addExpensesSub').val();

                var formData = new FormData();
                formData.append('file', file_data);
                formData.append('amount', amount);
                formData.append('expense_date', expense_date);
                formData.append('note', note);
                formData.append('category_id', category_id);
                formData.append('sub_category', sub_category);

                // var data = $(this).serialize();
                //do your own request an handle the results
                $.ajax({
                    url: '/api/insertExpenses',
                    type: 'post',
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(rsp) {
                        // console.log(rsp);
                        if (rsp != null) {
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Data has been add.',
                                    type: 'success',
                                    confirmButtonText: 'OK'
                                }),
                                // console.log("im here?");
                                appComponent.renderData();
                            $('#create-expenses').modal('hide');
                            $('#addExpenses')[0].reset();
                        }
                        // console.log(rsp);
                    }
                });
            });

            //Edit Clients
            $("#editExpenses").on('submit', function(e) {
                //prevent Default functionality
                e.preventDefault();
                var id = $('#editExpensesId').val();
                var file_data = $('#editExpensesFile').prop('files')[0];
                var amount = $('#editExpensesAmount').val();
                var expense_date = $('#editExpensesDate').val();
                var note = $('#editExpensesNote').val();
                var category_id = $('#editExpensesCategory').val();
                var sub_category = $('#editExpensesSub').val();

                var formData = new FormData();
                formData.append('file', file_data);
                formData.append('amount', amount);
                formData.append('expense_date', expense_date);
                formData.append('note', note);
                formData.append('category_id', category_id);
                formData.append('sub_category', sub_category);
                // var expenses = appComponent.expenses;
                // var data = $(this).serialize();
                //do your own request an handle the results
                $.ajax({
                    url: '/api/updateExpenses/' + id,
                    type: 'post',
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
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
                        $('#edit-expenses').modal('hide');
                    }
                });

            });
        </script>
    @endsection
