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
                        <h3 class="page-title">Promotion</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Promotion</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_promotion"><i
                                class="fa fa-plus"></i> Add Promotion</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">

                        <!-- Promotion Table -->
                        <table class="table table-striped custom-table mb-0 ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Promoted Employee </th>
                                    <th>Department</th>
                                    <th>Promotion Designation From </th>
                                    <th>Promotion Designation To </th>
                                    <th>Promotion Date </th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $prom)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <h2 class="table-avatar blue-link">
                                                <a href="profile.html" class="avatar"><img alt=""
                                                        src="assets/img/profiles/avatar-02.jpg"></a>
                                                <a href="profile.html">{{ $prom->prom_for }}</a>
                                            </h2>
                                        </td>
                                        <td></td>
                                        <td>{{ $prom->user->name }}</td>
                                        <td>{{ $prom->prom_designation_to }}</td>
                                        <td>{{ date('d F y', strtotime($prom->prom_date)) }}</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#edit_promotion{{ $prom->id }}"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#delete_promotion{{ $prom->id }}"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('promotions.delete')
                                    @include('promotions.edit')
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /Promotion Table -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add Promotion Modal -->
				<div id="add_promotion" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Promotion</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('storePromotions')}}" method="POST">
                                    {{ csrf_field() }}
									<div class="form-group">
										<label>Promotion For <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="prom_for">
									</div>
									<div class="form-group">
										<label>Promotion From <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="prom_designation_from" readonly>
									</div>
									<div class="form-group">
										<label>Promotion To <span class="text-danger">*</span></label>
										<select class="select" name="prom_designation_to">
											<option value="Web Developer">Web Developer</option>
											<option value="Web Designer">Web Designer</option>
											<option value="SEO Analyst">SEO Analyst</option>
										</select>
									</div>
									<div class="form-group">
										<label>Promotion Date <span class="text-danger">*</span></label>
										<div class="cal-icon" >
											<input type="text" name="prom_date" class="form-control datetimepicker">
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Promotion Modal -->
    </div>
    <!-- /Page Wrapper -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
        integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script> --}}
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>


    <script>
        $(function() {
            $("#prom_for").change(function(e) {
                e.preventDefault();
                let id = $(this).val();
                // alert(id)
                $.ajax({
                    type: "get",
                    url: "/show/promotions/employee",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(rsp) {
                        // console.log(rsp.clients[0].email);
                        // console.log(rsp.tax[0].tax_percentage);
                        // alert(rsp)
                        let designation = rsp;
                        console.log(rsp);
                        $("#prom_designation").val(designation);
                    }
                });
            });
        });
    </script>
@endsection
