@extends('layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div id="clients">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Clients</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Clients</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#clients-insert"><i
                                    class="fa fa-plus"></i> Add Client</a>
                        </div>
                        <!-- Add Client Modal -->
                        @include('Employees.clients.create')
                        <!-- /Add Client Modal -->
                    </div>
                </div>
                <!-- /Page Header -->
                {{-- <!-- Search Filter -->
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Client ID</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Client Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Company</label>
                            <select class="select floating">
                                @foreach ($clients as $client)
                                    <option>{{ $client->company }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="d-grid">
                            <a href="#" class="btn btn-success"> Search </a>
                        </div>
                    </div>
                </div> --}}

                <div class="row">
                    <div v-for="client in clients" class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="client-profile.html" class="avatar"><img :src="client.image" alt=""></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a @click="editClient(client.id)" class="dropdown-item" href="#"
                                        data-bs-toggle="modal" data-bs-target="#clients-edit"><i
                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a @click="onDelete(client.id)" class="dropdown-item" href="#"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="">@{{ client.company }}</a>
                            </h4>
                            <h5 class="user-name m-t-10 mb-0 text-ellipsis">
                                <a href="client-profile.html">@{{ client.name }}</a>
                            </h5>
                            <div class="small text-muted">@{{ client.position }}</div>
                            <a :href="getDetailUrl(client.id)" class="btn btn-white btn-sm m-t-10">View Profile</a>
                        </div>
                    </div>
                    <!-- Edit Client Modal -->
                    <!-- /Edit Client Modal -->
                </div>
            </div>
            <!-- /Page Content -->
        </div>

        @include('Employees.clients.edit')
        <!-- Detail Clients -->
        {{-- @include('Employees.clients.show') --}}


    </div>
    <!-- /Page Wrapper -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>

    <script>
        var appComponent = new Vue({
            el: "#clients",
            data: {
                clients: [],
            },
            mounted() {
                this.renderData();
            },
            methods: {
                renderData() {
                    $.ajax({
                        url: "/api/dataClients",
                        success: function(rsp) {
                            appComponent.clients = rsp;
                        }
                    })

                },
                editClient(id) {
                    // console.log(id);
                    $.ajax({
                        url: '/api/editClients/' + id,
                        type: 'get',
                        dataType: 'json',
                        success: function(rsp) {
                            // console.log(rsp);
                            $('#editClientId').val(rsp.id);
                            $('#editClientName').val(rsp.name);
                            // $('#editClientImage').val(rsp.image);
                            $('#editIdClient').val(rsp.id_client);
                            $('#editClientEmail').val(rsp.email);
                            $('#editClientPosition').val(rsp.position);
                            $('#editClientBirthday').val(rsp.birthday);
                            $('#editClientPhone').val(rsp.phone);
                            $('#editClientCompany').val(rsp.company);
                            $('#editClientAddress').val(rsp.address);
                            $('#editClientGender').val(rsp.gender);
                            // console.log(rsp.name);
                        }
                    });
                },
                getDetailUrl(id) {
                    return '{{ url('/showClients/') }}' + '/' + id;
                    // console.log('p');
                },
                onDelete(id) {
                    var clients = this.clients;
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
                                url: '/api/deleteClients/' + id,
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
                },
            }
        });

        // Add Clients
        $("#addClients").on('submit', function(e) {
            //prevent Default functionality
            e.preventDefault();
            var file_data = $('#addClientImage').prop('files')[0];
            var id_client = $('#addIdClient').val();
            var name = $('#addClientName').val();
            var email = $('#addClientEmail').val();
            var birthday = $('#addClientBirthday').val();
            var position = $('#addClientPosition').val();
            var phone = $('#addClientPhone').val();
            var company = $('#addClientCompany').val();
            var address = $('#addClientAddress').val();
            var gender = $("input[name='gender']:checked").val()

            var formData = new FormData();
            formData.append('image', file_data);
            formData.append('name', name);
            formData.append('id_client', id_client);
            formData.append('email', email);
            formData.append('position', position);
            formData.append('birthday', birthday);
            formData.append('phone', phone);
            formData.append('company', company);
            formData.append('address', address);
            formData.append('gender', gender);

            // var data = $(this).serialize();
            //do your own request an handle the results
            $.ajax({
                url: '/api/insertClients',
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
                            appComponent.renderData();
                        $('#clients-insert').modal('hide');
                        $('#addClients')[0].reset();
                        // table.ajax.reload()
                    }
                    // console.log(rsp);
                }
            });
        });

        //Edit Clients
        $("#editClient").on('submit', function(e) {
            //prevent Default functionality
            e.preventDefault();

            var id = $('#editClientId').val();
            var file_data = $('#editClientImage').prop('files')[0];
            var id_client = $('#editIdClient').val();
            var name = $('#editClientName').val();
            var email = $('#editClientEmail').val();
            var position = $('#editClientPosition').val();
            var birthday = $('#editClientBirthday').val();
            var phone = $('#editClientPhone').val();
            var company = $('#editClientCompany').val();
            var address = $('#editClientAddress').val();
            var gender = $("input[name='gender']:checked").val()


            var formData = new FormData();
            formData.append('id', id);
            formData.append('image', file_data);
            formData.append('name', name);
            formData.append('id_client', id_client);
            formData.append('email', email);
            formData.append('position', position);
            formData.append('birthday', birthday);
            formData.append('phone', phone);
            formData.append('company', company);
            formData.append('address', address);
            formData.append('gender', gender);
            //do your own request an handle the results
            // var data = $(this).serialize();
            // console.log();
            $.ajax({
                url: '/api/updateClients/' + id,
                type: 'post',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function(rsp) {
                    console.log(rsp);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data has been update.',
                        type: 'success',
                        confirmButtonText: 'OK'
                    })
                    appComponent.renderData();
                    $('#clients-edit').modal('hide');
                }
            });
        });
    </script>
@endsection
