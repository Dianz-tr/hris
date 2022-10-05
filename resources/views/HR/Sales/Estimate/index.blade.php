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
                        <h3 class="page-title">Estimates</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Estimates</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="{{ route('createEstimate') }}" class="btn add-btn"><i class="fa fa-plus"></i> Create
                            Estimate</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            {{-- <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating">
                            <option>Select Status</option>
                            <option>Accepted</option>
                            <option>Declined</option>
                            <option>Expired</option>
                        </select>
                        <label class="focus-label">Status</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="btn btn-success w-100"> Search </a>
                </div>
            </div>
            <!-- /Search Filter --> --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Estimate Number</th>
                                    <th>Client</th>
                                    <th>Estimate Date</th>
                                    <th>Expiry Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estimates as $es)
                                    <tr>
                                        <td><a href="estimate-view.html">{{ $es->estimate_id }}</a></td>
                                        {{-- <td></td> --}}
                                        {{-- <td>{{ $es->clients->company }}</td> --}}
                                        <td>{{ $es->clients[0]->company }}</td>
                                        <td>{{ date('d F Y', strtotime($es->estimate_date)) }}</td>
                                        <td>{{ date('d F Y', strtotime($es->expiry_date)) }}</td>
                                        <td>{{ number_format($es->grand_total, 2) }}</td>
                                        <td>
                                            @if ($es->status == 'Accepted')
                                                <span class="badge bg-inverse-success">{{ $es->status }}</span>
                                            @elseif ($es->status == 'Declined')
                                                <span class="badge bg-inverse-danger">{{ $es->status }}</span>
                                            @elseif ($es->status == 'Sent')
                                                <span class="badge bg-inverse-primary">{{ $es->status }}</span>
                                            @else
                                                <span class="badge bg-inverse-warning">{{ $es->status }}</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    {{-- <a class="dropdown-item"
                                                        href="{{ route('editEstimate', ['id' => $es->id]) }}"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a> --}}
                                                    <a onclick="confirmDelete(this)" class="dropdown-item"
                                                        href="{{ route('deleteEstimate', ['id' => $es->id]) }}"><i
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

    <!-- /cdn jquery -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        confirmDelete = function(button) {
            var url = $(button).data('url');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(value) {
                if (value) {
                    window.location = url
                }
            })
        }
    </script>
@endsection
