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
                        <h3 class="page-title">Invoices</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Invoices</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="{{ route('createInvoices') }}" class="btn add-btn"><i class="fa fa-plus"></i> Create
                            Invoice</a>
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
                            <option>Pending</option>
                            <option>Paid</option>
                            <option>Partially Paid</option>
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
                                    <th>#</th>
                                    <th>Invoice Number</th>
                                    <th>Client</th>
                                    <th>Created Date</th>
                                    <th>Due Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invo)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><a href="invoice-view.html">{{ $invo->invoice_id }}</a></td>
                                        <td>{{ $invo->clients[0]->company }}</td>
                                        <td>{{ $invo->invoice_date }}</td>
                                        <td>{{ $invo->expiry_date }}</td>
                                        <td>{{ $invo->grand_total }}</td>
                                        <td>
                                            @if ($invo->status == 'Accepted')
                                                <span class="badge bg-inverse-success">{{ $invo->status }}</span>
                                            @elseif ($invo->status == 'Declined')
                                                <span class="badge bg-inverse-danger">{{ $invo->status }}</span>
                                            @elseif ($invo->status == 'Sent')
                                                <span class="badge bg-inverse-primary">{{ $invo->status }}</span>
                                            @else
                                                <span class="badge bg-inverse-warning">{{ $invo->status }}</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    {{-- <a class="dropdown-item" href="edit-invoice.html"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a> --}}
                                                    {{-- <a class="dropdown-item"
                                                        href="{{ route('viewInvoice', ['id' => $invo->id]) }}"><i
                                                            class="fa fa-eye m-r-5"></i>
                                                        View</a> --}}
                                                    {{-- <a class="dropdown-item" href="#"><i
                                                            class="fa fa-file-pdf-o m-r-5"></i> Download</a> --}}
                                                    <a class="dropdown-item"
                                                        href="{{ route('deleteInvoices', ['id' => $invo->id]) }}"><i
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
