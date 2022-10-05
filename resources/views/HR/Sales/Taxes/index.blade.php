@extends('layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div id="taxes">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Taxes</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Taxes</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#create-taxes"><i
                                    class="fa fa-plus"></i> Add Tax</a>
                        </div>
                        @include('HR.Sales.Taxes.create')
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tax Name </th>
                                        <th>Tax Percentage (%) </th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(tax, index) in taxes">
                                        <td>@{{ index + 1 }}</td>
                                        <td>@{{ tax.tax_name }}</td>
                                        <td>@{{ tax.tax_percentage }}</td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-danger" id="status"></i>
                                                    @{{ tax.status }}
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a @click="editTaxes(tax.id)" class="dropdown-item" href="#"
                                                        data-bs-toggle="modal" data-bs-target="#edit-taxes"><i
                                                            class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a @click="onDelete(tax.id)" class="dropdown-item" href="#"
                                                        data-bs-toggle="modal" data-bs-target="#delete_tax"><i
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
        </div>
        <!-- /Page Content -->

        <!-- /edit modal -->
        @include('HR.Sales.Taxes.edit')

    </div>
    <!-- /Page Wrapper -->

    <!-- /cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>

    <script>
        var appComponent = new Vue({
            el: "#taxes",
            data: {
                taxes: [

                ],
            },
            mounted() {
                this.renderData();
            },
            methods: {
                renderData() {
                    $.ajax({
                        url: "/api/dataTaxes",
                        success: function(rsp) {
                            appComponent.taxes = rsp;
                            // console.log(this.revenues);

                        }
                    });
                },
                editTaxes(id) {
                    // console.log(id);
                    $.ajax({
                        url: '/api/editTaxes/' + id,
                        type: 'get',
                        dataType: 'json',
                        success: function(rsp) {
                            // console.log(rsp);
                            $('#editTaxesId').val(rsp.id);
                            $('#editTaxesName').val(rsp.tax_name);
                            $('#editTaxesPercentage').val(rsp.tax_percentage);
                            $('#editTaxesStatus').val(rsp.status);
                            // console.log(rsp.name);
                        }
                    });
                },

                onDelete(id) {
                    var taxes = this.taxes;
                    // console.log(id);
                    $.ajax({
                        url: '/api/deleteTaxes/' + id,
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

                            // console.log(rsp.name);
                        }
                    });
                }
            }
        });

        // Add Clients
        $("#addTaxes").on('submit', function(e) {
            //prevent Default functionality
            e.preventDefault();

            var data = $(this).serialize();
            //do your own request an handle the results
            $.ajax({
                url: '/api/insertTaxes',
                type: 'post',
                dataType: 'json',
                data: data,
                success: function(rsp) {
                    // console.log(rsp);
                    if (rsp.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data has been add.',
                            type: 'success',
                            confirmButtonText: 'OK'
                        })
                        // console.log("im here?");
                        appComponent.renderData();
                        $('#create-taxes').modal('hide');
                        $('#addTaxes ')[0].reset();
                    }
                    // console.log(rsp);
                }
            });
        });

        //Edit Clients
        $("#editTaxes").on('submit', function(e) {
            //prevent Default functionality
            e.preventDefault();

            var taxes = appComponent.taxes;
            var data = $(this).serialize();
            var id = $('#editTaxesId').val();
            //do your own request an handle the results
            $.ajax({
                url: '/api/updateTaxes/' + id,
                type: 'post',
                dataType: 'json',
                data: data,
                success: function(rsp) {
                    // console.log(rsp);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data has been Update.',
                        type: 'success',
                        confirmButtonText: 'OK'
                    })
                    appComponent.renderData();
                    $('#edit-taxes').modal('hide');
                }
            });

        });

        // $(function() {
        //     $('#status').change(function() {
        //         var status = $(this).prop('checked') == true ? 1 : 0;
        //         var id = $('#editTaxesId').val();

        //         $.ajax({
        //             type: "GET",
        //             dataType: "json",
        //             url: '/api/changeStatus' + id,
        //             data: {
        //                 'status': status
        //             },
        //             success: function(data) {
        //                 console.log(data.success)
        //             }
        //         });
        //     })
        // })
    </script>
@endsection
