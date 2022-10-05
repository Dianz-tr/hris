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
                        <h3 class="page-title">Timesheet</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Timesheet</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_todaywork"><i class="fa fa-plus"></i> Add Today Work</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            @include('Employees.timesheet.create')
            
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Date</th>
                                    <th>Projects</th>
                                    <th class="text-center">Assigned Hours</th>
                                    <th class="text-center">Hours</th>
                                    <th class="d-none d-sm-table-cell">Description</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($timesh as $th)
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            <a href="profile.html">{{$employ[0]->f_name}} <span>{{$employ[0]->l_name}}</span></a>
                                        </h2>
                                    </td>
                                    <td>{{ date('d F Y', strtotime($th->date)) }}</td>
                                    <td><h2>{{$th->projec->project_name or 'not'}}</h2></td>
                                    <td class="text-center">{{$th->projec->rate or 'not'}}</td>
                                    <td class="text-center">{{$th->hours}}</td>
                                    <td class="d-none d-sm-table-cell col-md-4">{{$th->description}}</td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_todaywork{{$th->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a onclick="confirmDelete(this)" class="dropdown-item" data-url="{{ route('timesheet.delete', ['id' => $th->id]) }}">
                                                    <i class="fa fa-trash-o m-r-5"></i>Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('Employees.timesheet.edit')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        
    </div>
    <!-- /Page Wrapper -->

    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
    
        confirmDelete = function(button) {
            var url = $(button).data('url');
            swal({
                'title': 'Konfirmasi Hapus k',
                'text' : 'Apakah kamu yakin ingin menghapus data ini?',
                'dangerMode' : true,
                'buttons' : true
            }).then(function(value) {
                if (value) {
                    window.location = url;
                }
            })
        }
    </script>
@endsection