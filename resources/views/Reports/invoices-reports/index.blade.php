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
                    <h3 class="page-title">Invoice Report</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Invoice Report</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        {{-- <!-- Search Filter -->
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3"> 
                <div class="form-group form-focus select-focus">
                    <select class="select floating"> 
                        <option>Select Client</option>
                        <option>Global Technologies</option>
                        <option>Delta Infotech</option>
                    </select>
                    <label class="focus-label">Client</label>
                </div>
            </div>
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
                <a href="#" class="btn btn-success w-100"> Search </a>  
            </div>     
        </div>
        <!-- /Search Filter --> --}}
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
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
                                <td>{{$loop->index + 1}}</td>
                                <td><a href="invoice-view.html">{{ $invo->invoice_id }}</a></td>
                                <td>{{ $invo->clients[0]->company }}</td>
                                <td>{{ date('d F Y', strtotime($invo->invoice_date)) }}</td>
                                <td>{{ date('d F Y', strtotime($invo->expiry_date)) }}</td>
                                <td>{{ number_format($invo->grand_total) }}</td>
                                <td>
                                    <div class=" action-label">
                                        @if ($invo->status == 'Accepted')
                                            <span class="badge bg-inverse-success">{{ $invo->status }}</span>
                                        @elseif($invo->status == 'Declined')
                                            <span class="badge bg-inverse-warning">{{ $invo->status }}</span>
                                        @elseif($invo->status == 'Sent')
                                            <span class="badge bg-inverse-info">{{ $invo->status }}</span>
                                        @else
                                            <span class="badge bg-inverse-danger">{{ $invo->status }}</span>
                                        @endif
                                    </div></td>
                                <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            {{-- <a class="dropdown-item" href="edit-invoice.html"><i class="fa fa-pencil m-r-5"></i> Edit</a> --}}
                                            <a class="dropdown-item" href="{{ route('deleteInvoices', ['id' => $invo->id]) }}" {{-- data-bs-toggle="modal" data-bs-target="#delete_approve{{$invo->id}}" --}}><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('Reports.invoices-reports.delete');
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