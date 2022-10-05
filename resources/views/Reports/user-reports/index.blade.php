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
								<h3 class="page-title">User Report</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">User Reports</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
						<!-- Content Starts -->
						<!-- Search Filter -->
					{{-- <form action="{{ route('searchUsers')}}" method="get">
						{{ csrf_field() }}
						<div class="row filter-row">
							
							<div class="col-sm-6 col-md-3">  
								<div class="form-group form-focus">
									<select class="form-control floating select" name="cari">
										@foreach ($user as $us)
											<option>{{$us->role}}</option>
										@endforeach
									
									</select>
									<label class="focus-label">User Role</label>
								</div>
							</div>
						
							<div class="col-sm-6 col-md-3">  
								<a href="#" class="btn btn-success w-100"> Search </a>  
								<button type="submit" class="btn btn-success w-100">Search</button>
							</div>     
						</div>
					</form> --}}
					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Company</th>
											<th>Email</th>
											<th>Role</th>
											<th>Designation</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($user as $us)
										<tr>
											<td>{{$loop->index + 1}}</td>
											<td>
												<h2 class="table-avatar">
													<a href="#" class="avatar"><img src="assets/img/profiles/avatar-19.jpg" alt=""></a>
													<a href="#">{{$us->name}}</a>
												</h2>
											</td>
                                          
											<td>{{$us->employee->company or 'Not'}}</td>
											<td>{{$us->email}}</td>
											<td>
												@if ($us->role == 'Admin')
                                                    <span class="badge bg-inverse-danger">Admin</span>
                                                @elseif ($us->role == 'Employee')
                                                    <span class="badge bg-inverse-success">Employee</span>
                                                @else
                                                    <span class="badge bg-inverse-info">Client</span>
                                                @endif
											</td>
                                         
											<td>{{ $us->employee->designation->name or 'Not'}}</td>
											<td>
												<div class="dropdown action-label">
													<a href="#" class="btn btn-white btn-sm btn-rounded"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
													
												</div>
											</td>
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