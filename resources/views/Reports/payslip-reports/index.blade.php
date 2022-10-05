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
								<h3 class="page-title">Payslip Reports</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Payslip Reports</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
						<!-- Content Starts -->
						{{-- <!-- Search Filter -->
					<div class="row filter-row">
						
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<div class="cal-icon">
									<select class="form-control floating select">
										<option>
											Jan
										</option>
										<option>
											Feb
										</option>
										<option>
											Mar
										</option>
									</select>
								</div>
								<label class="focus-label">Month</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<div class="cal-icon">
									<select class="form-control floating select">
										<option>
											2018
										</option>
										<option>
											2019
										</option>
										<option>
											2020
										</option>
									</select>
								</div>
								<label class="focus-label">Year</label>
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
								<table class="table table-striped custom-table mb-0 ">
									<thead>
										<tr>
											<th>#</th>
											<th>Employee Name</th>
											<th>Paid Amount</th>
											<th>Payment Month</th>
											<th>Payment Year</th>
											{{-- <th class="text-center">Actions</th> --}}
										</tr>
									</thead>
									<tbody>
                                        @foreach ($salary as $item)
                                            <tr>
                                                <td>{{$loop->index +1}}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-13.jpg"></a>
                                                        <a href="profile.html">{{ $item->employee->f_name }}  <span>{{ $item->employee->l_name }}</span></a>
                                                    </h2>
                                                </td>
                                                <td>{{ number_format($item->net_salary) }}</td>
                                                <td>{{ date('F', strtotime($item->employee->join))}}</td>
                                                <td>{{ date('Y', strtotime($item->employee->join))}}</td>
                                                {{-- <td class="text-center"> <a href="#" class="btn btn-sm btn-primary">PDF</a></td> --}}
                                            </tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                
					<!-- /Content End -->
					
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->

@endsection