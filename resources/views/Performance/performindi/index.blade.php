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
						<h3 class="page-title">Performance Indicator</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
							<li class="breadcrumb-item active">Performance</li>
						</ul>
					</div>
					<div class="col-auto float-end ms-auto">
						<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_indicator"><i class="fa fa-plus"></i> Add New</a>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
			@include('Performance.performindi.create')
			
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped custom-table mb-0 datatable">
							<thead>
								<tr>
									<th style="width: 30px;">#</th>
									<th>Designation</th>
									<th>Department</th>
									<th>Added By</th>
									<th>Create At</th>
									<th>Status</th>
									<th class="text-end">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($performindi as $pedi)
								<tr>
									<td>{{$loop-> index + 1}}</td>
									<td>{{ $pedi->designation->name}}</td>
									<td>{{ $abab[0]->name or 'Not'}}</td>
									{{-- <td></td> --}}
									<td>
										<h2 class="table-avatar">
											<a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
											<a href="profile.html">{{$pedi->added_by}} </a>
										</h2>
									</td>
									<td>
										{{date('d F y', strtotime($pedi->created_at))}}
									</td>
									<td>
										{{-- {{$pedi->status}} --}}
										<div class=" action-label">
											@if ($pedi->status == 'Active')
												<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-success"></i> {{ $pedi->status}} 
												</a>
											@else
												<a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-danger"></i> {{ $pedi->status}} 
												</a>
											@endif
										</div>
									</td>
									<td class="text-end">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_indicator{{$pedi->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
												<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_indicator{{$pedi->id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								@include('Performance.performindi.edit')
								@include('Performance.performindi.delete')
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