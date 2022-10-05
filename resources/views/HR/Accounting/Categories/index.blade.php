@extends('layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div id="categories">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Categories</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Accounts</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal"
                                data-bs-target="#create-categories"><i class="fa fa-plus"></i> Add Categories</a>
                        </div>
                        @include('HR.Accounting.Categories.create')
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name </th>
                                        <th>Sub-Category Name</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(category, index) in categories">
                                        <td>@{{ index + 1 }}</td>
                                        <td>@{{ category.category_name }}</td>
                                        <td>@{{ category.sub_category }}</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu">
                                                    <a @click="editCategories(category.id)" class="dropdown-item"
                                                        href="#" data-bs-toggle="modal"
                                                        data-bs-target="#edit-categories"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a @click="onDelete(category.id)" class="dropdown-item"><i
                                                            class="fa fa-trash m-r-5"></i>Delete</a>
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
        <!-- /edit Categories -->
        @include('HR.Accounting.Categories.edit')
    </div>
    <!-- /Page Wrapper -->

    <!-- /cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>

    <script>
        var appComponent = new Vue({
            el: "#categories",
            data: {
                categories: [

                ],
            },
            mounted() {
                this.renderData();
            },
            methods: {
                renderData() {
                    $.ajax({
                        url: "/api/dataCategories",
                        success: function(rsp) {
                            appComponent.categories = rsp;
                            // console.log(this.revenues);

                        }
                    });
                },
                editCategories(id) {
                    // console.log(id);
                    $.ajax({
                        url: '/api/editCategories/' + id,
                        type: 'get',
                        dataType: 'json',
                        success: function(rsp) {
                            // console.log(rsp);
                            $('#editCategoriesId').val(rsp.id);
                            $('#editCategoriesName').val(rsp.category_name);
                            $('#editCategoriesSub').val(rsp.sub_category);
                            // console.log(rsp.name);
                        }
                    });
                },

                onDelete(id) {
                    var categories = this.categories;
                    // console.log(id);
                    $.ajax({
                        url: '/api/deleteCategories/' + id,
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
        $("#addCategories").on('submit', function(e) {
            //prevent Default functionality
            e.preventDefault();

            var data = $(this).serialize();
            //do your own request an handle the results
            $.ajax({
                url: '/api/insertCategories',
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
                        $('#create-categories').modal('hide');
                        $('#addCategories ')[0].reset();
                    }
                    // console.log(rsp);
                }
            });
        });

        //Edit Clients
        $("#editCategories").on('submit', function(e) {
            //prevent Default functionality
            e.preventDefault();

            var categories = appComponent.categories;
            var data = $(this).serialize();
            var id = $('#editCategoriesId').val();
            //do your own request an handle the results
            $.ajax({
                url: '/api/updateCategories/' + id,
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
                    $('#edit-categories').modal('hide');
                }
            });

        });
    </script>
@endsection
