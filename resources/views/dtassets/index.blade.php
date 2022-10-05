@extends('layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div id="assets">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Assets Perusahaan</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">HR</li>
                            </ul>
                        </div>

                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#create-assets"><i
                                    class="fa fa-plus"></i> Create Assets</a>
                        </div>

                        <!-- create modal -->
                        @include('dtassets.create')

                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating">
                                <option value=""> -- Select -- </option>
                                <option value="0"> Pending </option>
                                <option value="1"> Approved </option>
                                <option value="2"> Returned </option>
                            </select>
                            <label class="focus-label">Status</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group form-focus">
                                    <div class="cal-icon">
                                        <input class="form-control floating datetimepicker" type="text">
                                    </div>
                                    <label class="focus-label">From</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group form-focus">
                                    <div class="cal-icon">
                                        <input class="form-control floating datetimepicker" type="text">
                                    </div>
                                    <label class="focus-label">To</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class="d-grid">
                            <a href="#" class="btn btn-success"> Search </a>
                        </div>
                    </div>
                </div>
                <!-- /Search Filter -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            {{-- @if (count($assets) > 0) --}}
                            <table class="datatable table table-striped custom-table text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Asset User</th>
                                        <th>ID Asset</th>
                                        <th>Asset Name</th>
                                        <th>Model</th>
                                        <th>Condition</th>
                                        <th>Purchase Date</th>
                                        <th>Warranty</th>
                                        <th>Warranty End</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($assets as $asset)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <strong>{{ $asset->users ? $asset->users->name : '-' }}</strong>
                                            </td>
                                            <td>{{ $asset->asset_id }}</td>
                                            <td>{{ $asset->asset_name }}</td>
                                            <td>{{ $asset->model }}</td>
                                            <td>{{ $asset->condition }}</td>
                                            <td>{{ date('d F Y', strtotime($asset->purchase_date)) }}</td>
                                            <td>{{ date('d F Y', strtotime($asset->warranty)) }}</td>
                                            <td>{{ date('d F Y', strtotime($asset->warranty_end)) }}</td>
                                            <td>{{ number_format($asset->price, 2) }}</td>
                                            <td class="text-center">
                                                <div class="action-label">
                                                    @if ($asset->status == 'pending')
                                                        <a class="btn btn-white btn-sm btn-rounded " href="#"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-dot-circle-o text-danger"></i>
                                                            {{ $asset->status }}
                                                        </a>
                                                    @elseif ($asset->status == 'approved')
                                                        <a class="btn btn-white btn-sm btn-rounded" href="#"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i
                                                                class="fa fa-dot-circle-o text-success"></i>{{ $asset->status }}
                                                        </a>
                                                    @else
                                                        <a class="btn btn-white btn-sm btn-rounded" href="#"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i
                                                                class="fa fa-dot-circle-o text-primary"></i>{{ $asset->status }}
                                                        </a>
                                                    @endif

                                                    {{-- <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript::changeStatus()"><i
                                                                class="fa fa-dot-circle-o text-danger"></i> Pending</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="fa fa-dot-circle-o text-success"></i>
                                                            Approved</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="fa fa-dot-circle-o text-info"></i> Returned</a>
                                                    </div> --}}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item"
                                                            href="{{ route('editAssets', ['id' => $asset->id]) }}"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit-assets{{ $asset->id }}"><i
                                                                class="fa fa-pencil m-r-5"></i>
                                                            Edit</a>
                                                        <a onclick="confirmDelete(this)" class="dropdown-item"
                                                            data-url="{{ route('deleteAssets', ['id' => $asset->id]) }}"><i
                                                                class="fa fa-trash m-r-5" role="button"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- edit modal -->
                                        @include('dtassets.edit')
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
                <!-- /Page Content -->
            </div>
        </div>
    </div>

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
