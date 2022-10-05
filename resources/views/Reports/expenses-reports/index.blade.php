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
								<h3 class="page-title">Expense Report</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Expense Report</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					{{-- <!-- Search Filter -->
                    <form action="{{ route('searchSalesExpense')}}" method="get">
                        {{ csrf_field() }}
                        <div class="row filter-row">
                            <div class="col-sm-6 col-md-3"> 
                                <div class="form-group form-focus select-focus">
                                    <select class="select floating" name=""> 
                                        <option>Select buyer</option>
                                        <option>Loren Gatlin</option>
                                        <option>Tarah Shropshire</option>
                                    </select>
                                    <label class="focus-label">Purchased By</label>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="search" name="cari" class="form-control floating">
                                    <label class="focus-label">Purchased By</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">  
                                <div class="form-group form-focus">
                                    <div class="cal-icon">
                                        <input class="form-control floating datetimepicker" type="" name="from">
                                    	<label class="focus-label">From</label>
									</div>
                                </div>
                            </div>
							<div class="col-sm-6 col-md-3">  
								<div class="form-group form-focus">
									<div class="cal-icon">
                                        <input class="form-control floating datetimepicker" type="" name="from">
                                    	<label class="focus-label">From</label>
									</div>
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
                                <a href="{{ route('searchSalesExpense')}}" class="btn btn-success w-100"> Search </a>  
                            </div>     
                        </div>
                    </form>
					<!-- /Search Filter --> --}}
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>Item</th>
											<th>Purchase From</th>
											<th>Purchase Date</th>
											<th>Purchased By</th>
											<th>Amount</th>
											<th>Paid By</th>
											<th class="text-center">Status</th>
											<th class="text-end">Actions</th>
										</tr>
									</thead>
									<tbody>
									
                                        @foreach ($salesexpense as $se)
										<tr>
											<td>
												<strong>{{ $se->item }}</strong>
											</td>
											<td>{{$se->purchase_from}}</td>
											<td>{{ date('d F Y', strtotime($se->purchase_date))}}</td>
											<td>
												<a href="profile.html" class="avatar avatar-xs">
													<img src="assets/img/profiles/avatar-04.jpg" alt="">
												</a>
												<h2><a href="profile.html">{{ $se->users->name }}</a></h2>
											</td>
											<td>{{ number_format($se->amount,2)}}</td>
											<td>{{$se->paid_by}}</td>
											<td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm btn-rounded " href="#"
                                                         aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-danger"></i> {{ $se->status }}
                                                </a>
												</div>
											</td>
											<td class="text-end">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_leave{{$se->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_approve{{$se->id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										@include('Reports.expenses-reports.delete')
                                        @include('HR.Sales.Expenses.edit')
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