@extends('layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div id="holidays">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Holidays 2019</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Holidays</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal"
                                data-bs-target="#holidays-insert"><i class="fa fa-plus"></i> Add Holiday</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title </th>
                                        <th>Holiday Date</th>
                                        {{-- <th>Day</th> --}}
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(holiday, index) in holidays" class="holiday-upcoming">
                                        <td>@{{ index + 1 }}</td>
                                        <td class="text-danger">@{{ holiday.name }}</td>
                                        <td>@{{ holiday.holidayDate }}</td>
                                        {{-- <td id="holiday" class=""></td> --}}
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <a class="" data-bs-toggle="dropdown"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu ">
                                                    <a @click="editHoliday(holiday.id)" class="dropdown-item"
                                                        data-bs-toggle="modal" data-bs-target="#holidays-edit"><i
                                                            class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a @click="onDelete(holiday.id)" class="dropdown-item"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
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

                <!-- Add Holiday Modal -->
                <div class="modal custom-modal fade" id="holidays-insert" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Holiday</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addHolidays" method="post">
                                    <div class="form-group">
                                        <label>Holiday Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="addHolidaysName" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Holiday Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon"><input class="form-control datetimepicker" type="text"
                                                id="addHolidaysDate" name="holidayDate"></div>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Add Holiday Modal -->

                <!-- Edit Holiday Modal -->
                <div class="modal custom-modal fade" id="holidays-edit" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Holiday</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editHolidays" method="post">
                                    <input type="hidden" name="id" id="editHolidaysId">
                                    <div class="form-group">
                                        <label>Holiday Name<span class="text-danger">*</span></label>
                                        <input class="form-control" value="" type="text" id="editHolidaysName"
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Holiday Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon"><input class="form-control datetimepicker" type="text"
                                                id="editHolidaysDate" name="holidayDate"></div>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Edit Holiday Modal -->
            </div>
            {{-- </div> --}}

        </div>
        <!-- /Page Content -->

    </div>

    <!-- CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>
    {{-- <script>
        const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

        const d = new Date();
        let day = weekday[d.getDay()];
        document.getElementById("holiday").innerHTML = day;
    </script> --}}
    <script>
        var appComponent = new Vue({
            el: "#holidays",
            data: {
                holidays: [

                ],
            },

            mounted() {
                this.renderData();
            },

            methods: {
                renderData() {
                    $.ajax({
                        url: "/api/dataHolidays",
                        success: function(rsp) {
                            appComponent.holidays = rsp;
                            console.log(rsp);
                        }
                    })
                },

                editHoliday(id) {
                    $.ajax({
                        url: '/api/editHolidays/' + id,
                        type: 'get',
                        dataType: 'json',
                        success: function(rsp) {
                            $("#editHolidaysId").val(rsp.id);
                            $("#editHolidaysName").val(rsp.name);
                            $("#editHolidaysDate").val(rsp.holidayDate);

                        }
                    })
                },

                onDelete(id) {
                    var holidays = this.holidays;
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
                                url: '/api/deleteHolidays/' + id,
                                type: 'get',
                                dataType: 'json',
                                success: function(rsp) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                    appComponent.renderData();
                                }
                            })
                        }
                    })
                }
            },
        });

        $("#addHolidays").on('submit', function(e) {
            e.preventDefault();

            var data = $(this).serialize();

            $.ajax({
                url: '/api/insertHolidays',
                type: 'post',
                dataType: 'json',
                data: data,
                success: function(rsp) {
                    if (rsp.status == 200) {
                        Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Data has been add.',
                                type: 'success',
                                confirmButtonText: 'OK'
                            }),
                            appComponent.renderData();
                        $('#holidays-insert').modal('hide');
                        $('#addHolidays')[0].reset();
                    }
                }
            });

        });

        $("#editHolidays").on('submit', function(e) {
            e.preventDefault();

            var data = $(this).serialize();
            var id = $("#editHolidaysId").val();

            $.ajax({
                url: '/api/updateHolidays/' + id,
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
                    $('#holidays-edit').modal('hide');
                }
            })
        });
    </script>
@endsection
