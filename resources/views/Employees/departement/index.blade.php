@extends('Employees.departement.base')

@section('content-action')
    <div id="departments">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Department</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Department</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#department_insert"><i
                            class="fa fa-plus"></i> Add Department</a>
                </div>
                @include('Employees.departement.create')
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div>
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Department Name</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(dp,index) in departments">
                                <td>@{{ index + 1 }}</td>
                                <td>@{{ dp.name }}</td>
                                <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a @click="editDepartment(dp.id)" class="dropdown-item" href="#"
                                                data-bs-toggle="modal" data-bs-target="#department-edit"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a @click="onDelete(dp.id)" class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                    {{-- @include('system_mgmt.departement.edit') --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- edit modal -->
        <div class="modal fade" id="department-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header"
                        style="background-image: linear-gradient(to right, #aca1fc, #7f72e5);color:white">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color:#fff">&times;</span>
                        </button>
                        <h5 class="modal-title" id="exampleModalLongTitle"
                            style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
                            Edit Division</h5>
                    </div>
                    <div class="modal-body" style="background-color: #f5f4f9">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="modal-title" id="exampleModalLongTitle"
                                    style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:#7f72e5">
                                    Edit Division </h3>
                            </div>
                            <div class="panel-body">
                                <form id="editDepartments" method="POST">
                                    {{-- {{  method_field('put') }} --}}
                                    <input type="hidden" name="id" id="editDepartmentId">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" id="editDepartmentName"
                                            style="width: 770px;">

                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                        <button
                                            style="background-image: linear-gradient(to right, #db706a, #d54b44);"type="button"
                                            class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button style="background-image: linear-gradient(to right, #82e1b6, #63ca9c);"
                                            type="sumbit" class="btn btn-primary">Save Division</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> --}}

    <script>
        var appComponent = new Vue({
            el: "#departments",
            data: {
                departments: [],
            },
            mounted() {
                this.renderData();
            },
            methods: {
                renderData() {
                    $.ajax({
                        url: "/api/dataDepartement",
                        success: function(rsp) {
                            appComponent.departments = rsp;
                        }
                    })
                },
                editDepartment(id) {
                    // console.log(id);
                    $.ajax({
                        url: '/api/editDepartment/' + id,
                        type: 'get',
                        dataType: 'json',
                        success: function(rsp) {
                            // console.log(rsp);
                            $('#editDepartmentId').val(rsp.id);
                            $('#editDepartmentName').val(rsp.name);
                            // console.log(rsp.name);
                        }
                    });
                },
                
                onDelete(id) {
                    var departments = this.departments;
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
                            $.ajax({
                                url: '/api/deleteDepartment/' + id,
                                type: 'get',
                                dataType: 'json',
                                success: function(rsp) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                    appComponent.renderData();
                                    // clients.map((arr, index) => {
                                    //     if (arr.id == id) {
                                    //         clients.splice(index, 1);
                                    //     }
                                    // })
                                }
                            });
                        }
                    })
                }
            }
        });
        
        // Add Clients
        $("#addDepartment").on('submit', function(e) {
            //prevent Default functionality
            e.preventDefault();
            // $('#department_insert').modal('hide');
            var data = $(this).serialize();
            //do your own request an handle the results
            $.ajax({
                url: '/api/insertDepartement',
                type: 'post',
                dataType: 'json',
                data: data,
                success: function(rsp) {
                    console.log(rsp);
                    if (rsp.status == "200") {
                        Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Data has been add.',
                                type: 'success',
                                confirmButtonText: 'OK'
                            }),
                            appComponent.renderData();
                        $('#department_insert').modal('hide');
                        $('#addDepartment')[0].reset();
                    }
                    // console.log(rsp);
                }
            });
        });

        //Edit Departemen
        $("#editDepartments").on('submit', function(e) {
            //prevent Default functionality
            e.preventDefault();

            var data = $(this).serialize();
            var id = $('#editDepartmentId').val();

            // console.log();
            //do your own request an handle the results
            $.ajax({
                url: '/api/updateDepartment/' + id,
                type: 'post',
                dataType: 'json',
                data: data,
                success: function(rsp) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data has been update.',
                        type: 'success',
                        confirmButtonText: 'OK'
                    })
                    appComponent.renderData();

                    $('#department-edit').modal('hide');
                }
            });
        });
    </script>
@endsection
