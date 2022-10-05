@extends('layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div id="revenues">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Pendapatan</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">HR</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal"
                                data-bs-target="#create-revenues"><i class="fa fa-plus"></i>Tambah</a>
                        </div>
                        @include('HR.Accounting.Budget_revenues.create')
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
                                        <th>Sub Category</th>
                                        <th>Amount</th>
                                        <th>Revenue Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(revenue, index) in revenues">
                                        <td>@{{ index + 1 }}</td>
                                        <td>@{{ revenue.note }}</td>
                                        <td>@{{ revenue.categories.category_name }}</td>
                                        <td>@{{ revenue.categories.sub_category }}</td>
                                        <td>@{{ revenue.amount }}</td>
                                        <td>@{{ revenue.revenue_date }}</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a @click="editRevenues(revenue.id)" class="dropdown-item"
                                                        href="#" data-bs-toggle="modal"
                                                        data-bs-target="#edit-revenues"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a @click="onDelete(revenue.id)" class="dropdown-item"><i
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

                <!-- Edit Modal-->
                {{-- <div class="modal custom-modal fade" id="edit-revenues" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Revenues</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editRevenues">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="editRevenuesId">
                                    <div class="form-group row">
                                        <label class="col-lg-12 control-label">Amount
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" name="amount"
                                                id="editRevenuesAmount">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-12 control-label">Notes
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control ta" name="note" id="editRevenuesNote"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-12 control-label">Revenue Date
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-12">
                                            <input class="form-control datetimepicker" type="text" name="revenue_date"
                                                id="editRevenuesDate">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-12 control-label">Category
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-12">
                                            <select name="category_name" class="form-control m-b form-select"
                                                id="editRevenuesCategory">
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
                                            <select name="sub_category" class="form-control m-b form-select"
                                                id="editRevenuesCategory">
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
                                            <input type="file" class="form-control" data-buttontext="Choose File"
                                                data-icon="false" data-classbutton="btn btn-default"
                                                data-classinput="form-control inline input-s" name="file"
                                                id="editRevenuesFile">
                                        </div>
                                    </div>
                                    <div class="m-t-20 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- edit Revenues -->
            @include('HR.Accounting.Budget_revenues.edit')

        </div>
    </div>
    </div>
    <!-- /cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>

    <script>
        var appComponent = new Vue({
            el: "#revenues",
            data: {
                revenues: [

                ],
            },
            mounted() {
                this.renderData();

                this.$nextTick(function() {

                });

            },
            methods: {
                renderData() {
                    $.ajax({
                        url: "/api/dataRevenues",
                        success: function(rsp) {
                            appComponent.revenues = rsp;
                            // console.log(this.revenues);

                        }
                    });
                },
                editRevenues(id) {
                    console.log(id);
                    $.ajax({
                        url: '/api/editRevenues/' + id,
                        type: 'get',
                        dataType: 'json',
                        success: function(rsp) {
                            console.log(rsp);
                            $('#editRevenuesId').val(rsp.id);
                            $('#editRevenuesAmount').val(rsp.amount);
                            $('#editRevenuesNote').val(rsp.note);
                            $('#editRevenuesDate').val(rsp.revenue_date);
                            $('#editRevenuesCategory').val(rsp.category_id);
                            // $('#editRevenuesFile').val(rsp.file);
                            // console.log(rsp.name);
                        }
                    });
                },

                onDelete(id) {
                    var revenues = this.revenues;
                    console.log(id);
                    $.ajax({
                        url: '/api/deleteRevenues/' + id,
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
                                    // revenues.map((arr, index) => {
                                    //     if (arr.id == id) {
                                    //         revenues.splice(index, 1);
                                    //     }
                                    // })
                                }
                            })

                            // console.log(rsp.name);
                        }
                    });
                }
            }
        });

        // Add Clients
        $("#addRevenues").on('submit', function(e) {
            //prevent Default functionality
            e.preventDefault();
            var file_data = $('#addRevenuesFile').prop('files')[0];
            var amount = $('#addRevenuesAmount').val();
            var revenue_date = $('#addRevenuesDate').val();
            var note = $('#addRevenuesNote').val();
            var category_id = $('#addRevenuesCategory').val();

            var formData = new FormData();
            formData.append('file', file_data);
            formData.append('amount', amount);
            formData.append('revenue_date', revenue_date);
            formData.append('note', note);
            formData.append('category_id', category_id);

            // var data = $(this).serialize();
            //do your own request an handle the results
            $.ajax({
                url: '/api/insertRevenues',
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
                        })
                        // console.log("im here?");
                        appComponent.renderData();
                        $('#create-revenues').modal('hide');
                        $('#addRevenues ')[0].reset();
                    }
                    // console.log(rsp);
                }
            });
        });

        $("#editRevenues").on('submit', function(e) {
            //prevent Default functionality
            e.preventDefault();
            var id = $('#editRevenuesId').val();
            var file_data = $('#editRevenuesFile').prop('files')[0];
            var amount = $('#editRevenuesAmount').val();
            var revenue_date = $('#editRevenuesDate').val();
            var note = $('#editRevenuesNote').val();
            var category_id = $('#editRevenuesCategory').val();

            var formData = new FormData();
            formData.append('id', id);
            formData.append('file', file_data);
            formData.append('amount', amount);
            formData.append('revenue_date', revenue_date);
            formData.append('note', note);
            formData.append('category_id', category_id);
            // var revenues = appComponent.revenues;
            // var data = $(this).serialize();
            //do your own request an handle the results
            $.ajax({
                url: '/api/updateRevenues/' + id,
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
                    $('#edit-revenues').modal('hide');
                }
            });

        });
    </script>
@endsection
