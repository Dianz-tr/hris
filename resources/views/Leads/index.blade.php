@extends('layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Leads</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Leads</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Lead Name</th>
                                    <th>Email</th>
                                    <th>Client</th>
                                    <th>Project</th>
                                    <th>Created At</th>
                                    <th>Priority</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leads as $lead)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#">{{ $lead->users->name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $lead->users->email }}</td>
                                        <td>{{ $lead->clients->name }}</td>
                                        <td><a href="">{{ $lead->project_name }}</a></td>
                                        {{-- <td><span class="badge bg-inverse-success">Working</span></td> --}}
                                        <td>{{ date('d F Y', strtotime($lead->created_at)) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="badge badge-danger text-white"
                                                    data-bs-toggle="dropdown">{{ $lead->priority }}
                                                </a>
                                            </div>

                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    {{-- <a class="dropdown-item" href="#"><i
                                                            class="fa fa-pencil m-r-5"></i>
                                                        Edit</a> --}}
                                                    <a class="dropdown-item"
                                                        href="{{ route('deleteLeads', ['id' => $lead->id]) }}"><i
                                                            class="fa fa-trash-o m-r-5"></i>
                                                        Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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
@endsection
