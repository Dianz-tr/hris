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
                        <h3 class="page-title">Payslip</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payslip</li>
                        </ul>
                    </div>
                    {{-- <div class="col-auto float-end ms-auto">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white">CSV</button>
                            <button class="btn btn-white">PDF</button>
                            <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title">Payslip for the month of {{ date('F Y', strtotime($salary->for_month))}}</h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    <img src="assets/img/logo2.png" class="inv-logo" alt="">
                                    <ul class="list-unstyled mb-0">
                                        <li>Dreamguy's Technologies</li>
                                        <li>3864 Quiet Valley Lane,</li>
                                        <li>Sherman Oaks, CA, 91403</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">Payslip {{$salary->id_salary}}</h3>
                                        <ul class="list-unstyled">
                                            <li>Salary Month: <span>{{ date('F Y', strtotime($salary->for_month))}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">
                                        <li><h5 class="mb-0"><strong>{{$salary->employee->f_name}} {{$salary->employee->l_name}} </strong></h5></li>
                                        <li><span>Web Designer</span></li>
                                        <li>Employee ID: {{$salary->employee->employee_id}}</li>
                                        <li>Joining Date: {{date('d F Y', strtotime($salary->employee->join))}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Earnings</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Basic Salary</strong> <span class="float-end">${{$salary->basic}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Dearness allowance (D.A.)</strong> <span class="float-end">${{$salary->hra}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>House Rent Allowance (H.R.A.)</strong> <span class="float-end">${{$salary->hra}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Conveyance</strong> <span class="float-end">${{$salary->conveyance}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Allowance</strong> <span class="float-end">${{$salary->allowance}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Medical Allowance</strong> <span class="float-end">${{$salary->medical_allowance}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Other Earnings</strong> <span class="float-end">${{$salary->other_earnings}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Earnings</strong> <span class="float-end"><strong>${{number_format($total_earnings, 2)}}</strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Deductions</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-end">${{$salary->tds}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Employee State Insurance (ESI)</strong> <span class="float-end">${{$salary->esi}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Provident Fund (P.F.)</strong> <span class="float-end">${{$salary->pf}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Leave</strong> <span class="float-end">${{$salary->leave}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Prof. Tax</strong> <span class="float-end">${{$salary->prof_tax}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Labour Welfare</strong> <span class="float-end">${{$salary->labour_welfare}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Other Deductions</strong> <span class="float-end">${{$salary->other_deduction}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Deductions</strong> <span class="float-end"><strong>${{number_format($total_deductions, 2)}}</strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p><strong>Net Salary: ${{number_format($salary->net_salary, 2)}}</strong> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        
    </div>
    <!-- /Page Wrapper -->
@endsection