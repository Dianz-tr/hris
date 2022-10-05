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
                        <h3 class="page-title">Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_employee"><i
                                class="fa fa-plus"></i> Add Employee</a>
                        <div class="view-icons">
                            {{-- <a href="employees.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                            <a href="employees-list.html" class="list-view btn btn-link active"><i
                                    class="fa fa-bars"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            @include('Employees.employee.create')

            {{-- <!-- Search Filter -->
            <form action="{{route('employees')}}" method="get">
                {{csrf_field()}}
            <div class="row filter-row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" name="employee_id">
                        <label class="focus-label">Employee ID</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" name="name">
                        <label class="focus-label">Employee Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating" name="designation_name">
                                <option selected>Select Designation</option>
                            @foreach ($designation as $dse)
                                <option value="{{$dse->name}}">{{$dse->name}}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Designation</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <button type="submit" class="btn btn-success w-100"> Search </button>
                </div>
            </div>
            </form>
            <!-- /Search Filter --> --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Employee ID</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th class="text-nowrap">Join Date</th>
                                    <th>Role</th>
                                    <th class="text-end no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employ)
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            {{-- <a href="profile.html" class="avatar"><img alt=""
                                                    src="assets/img/profiles/avatar-02.jpg"></a> --}}
                                            <a href="profile.html"> {{ $employ->f_name }} <span> {{ $employ->l_name }} </span></a>
                                        </h2>
                                    </td>
                                    <td>{{$employ->employee_id}}</td>
                                    <td>{{$employ->email}}</td>
                                    <td>{{$employ->phone}}</td>
                                    <td>{{date('d F Y',strtotime($employ->join))}}</td>
                                    <td >
                                        <div class="btn btn-white btn-sm btn-rounded">
                                            <a class="dropdown-item" href="#">{{ $employ->designation->name or 'Tidak ada' }}</a>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#edit_employee{{ $employ->id }}"><i class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a onclick="confirmDelete(this)" class="dropdown-item" data-url="{{ route('employee.delete', ['id' => $employ->id]) }}">
                                                    <i class="fa fa-trash-o m-r-5"></i>Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('Employees.employee.edit')
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

    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
    integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->has('email'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
        })
    </script>
@endif
@if(Session::get('success'))
    <script>
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    </script>
@endif

@endsection
