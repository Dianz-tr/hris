@extends('layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Designations</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Designations</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_designation">
                            <i class="fa fa-plus"></i> Add Designation
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            @include('Employees.designation.create')

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th>Designation </th>
                                    <th>Department </th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody id="designation-list" name="designation-list">
                                @foreach ($designation as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->department->name or 'Tidak ada' }}</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="#{{ route('designation.edit', ['id' => $item->id]) }}"
                                                        data-bs-toggle="modal" data-bs-target="#edit_designation{{ $item->id }}">
                                                        <i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a onclick="confirmDelete(this)"
                                                        data-url="{{ route('designation.delete', ['id' => $item->id]) }}"
                                                        class="dropdown-item" role="button"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('Employees.designation.edit')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

    </div>

    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        // $(function() {
        //     $("#data-table").DataTable();
        // })

        confirmDelete = function(button) {
            var url = $(button).data('url');
            swal({
                'title': 'Konfirmasi Hapus',
                'text': 'Apakah kamu yakin ingin menghapus data ini?',
                'dangerMode': true,
                'buttons': true
            }).then(function(value) {
                if (value) {
                    window.location = url;
                }
            })
        }
    </script>
@endsection
