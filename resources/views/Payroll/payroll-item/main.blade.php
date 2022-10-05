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
                        <h3 class="page-title">Payroll Items</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payroll Items</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <!-- Page Tab -->
            <div class="page-menu">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab_additions">Additions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab_overtime">Overtime</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab_deductions">Deductions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Tab -->
            
            <!-- Tab Content -->
            <div class="tab-content">
            
                <!-- Additions Tab -->
                <div class="tab-pane show active" id="tab_additions">
                
                    <!-- Add Addition Button -->
                    <div class="text-end mb-4 clearfix">
                        <button class="btn btn-primary add-btn" type="button" data-bs-toggle="modal" data-bs-target="#add_addition"><i class="fa fa-plus"></i> Add Addition</button>
                    </div>
                    <!-- /Add Addition Button -->
                    @include('Payroll.payroll-item.additions.create')

                    <!-- Payroll Additions Table -->
                    <div class="payroll-table card">
                        <div class="table-responsive">
                            <table class="table table-hover table-radius">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Default/Unit Amount</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payrolltypeaddition as $additions)
                                        <tr>
                                            <th>{{$additions->name}}</th>
                                            <td>{{$additions->category}}</td>
                                            <td>${{$additions->amount}}</td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_addition{{$additions->id}}">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a onclick="confirmDelete(this)" class="dropdown-item" data-url="{{ route('payrolltype/delete', ['id' => $additions->id, 'type'=>'1']) }}">
                                                            <i class="fa fa-trash-o m-r-5"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('Payroll.payroll-item.additions.edit')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /Payroll Additions Table -->
                    
                </div>
                <!-- Additions Tab -->
                
                <!-- Overtime Tab -->
                <div class="tab-pane" id="tab_overtime">
                
                    <!-- Add Overtime Button -->
                    <div class="text-end mb-4 clearfix">
                        <button class="btn btn-primary add-btn" type="button" data-bs-toggle="modal" data-bs-target="#add_overtime"><i class="fa fa-plus"></i> Add Overtime</button>
                    </div>
                    <!-- /Add Overtime Button -->
                    @include('Payroll.payroll-item.overtime.create')

                    <!-- Payroll Overtime Table -->
                    <div class="payroll-table card">
                        <div class="table-responsive">
                            <table class="table table-hover table-radius">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Rate</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payrolltypeovertime as $overtime)
                                        <tr>
                                            <th>{{$overtime->name}}</th>
                                            <td>{{$overtime->rate}}</td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_overtime{{$overtime->id}}">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a onclick="confirmDelete(this)" class="dropdown-item" data-url="{{ route('payrolltype/delete', ['id' => $overtime->id, 'type'=>'2']) }}">
                                                            <i class="fa fa-trash-o m-r-5"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @include('Payroll.payroll-item.overtime.edit')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /Payroll Overtime Table -->
                    
                </div>
                <!-- /Overtime Tab -->
                
                <!-- Deductions Tab -->
                <div class="tab-pane" id="tab_deductions">
                
                    <!-- Add Deductions Button -->
                    <div class="text-end mb-4 clearfix">
                        <button class="btn btn-primary add-btn" type="button" data-bs-toggle="modal" data-bs-target="#add_deduction"><i class="fa fa-plus"></i> Add Deduction</button>
                    </div>
                    <!-- /Add Deductions Button -->
                    @include('Payroll.payroll-item.deductions.create')

                    <!-- Payroll Deduction Table -->
                    <div class="payroll-table card">
                        <div class="table-responsive">
                            <table class="table table-hover table-radius">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Default/Unit Amount</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payrolltypededuction as $deductions)
                                        <tr>
                                            <th>{{$deductions->name}}</th>
                                            <td>{{$deductions->amount}}</td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_deduction{{$deductions->id}}">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                            <a onclick="confirmDelete(this)" class="dropdown-item" data-url="{{ route('payrolltype/delete', ['id' => $deductions->id, 'type'=>'3']) }}">
                                                                <i class="fa fa-trash-o m-r-5"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @include('Payroll.payroll-item.deductions.edit')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /Payroll Deduction Table -->
                </div>
                <!-- /Deductions Tab -->
            </div>
            <!-- Tab Content -->
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