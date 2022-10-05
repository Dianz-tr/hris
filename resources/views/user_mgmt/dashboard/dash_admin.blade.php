@extends('layouts.master')

@section('content')
    {{-- <style>
    .row .fa {
        color: #ff4444;
    }



    #isisemua {
        /* left: 0;
    position: relative;
    transition: all 0.2s ease-in-out;
    margin: 0 0 0 107px;
    padding: 60px 0 0; */
        border-radius: 20px;
    }

    .container .box {
        position: relative;
        width: calc(230px - 30px);
        height: calc(130px - 30px);
        background: #ffffff;
        float: left;
        margin: 15px;
        box-sizing: border-box;
        overflow: hidden;
        border-radius: 10px;
    }

    .container .box .icon {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;

        transition: 0.5s;
        z-index: 1;

    }

    .container .box:hover .icon {
        top: 20px;
        left: 10px;
        right: calc(50% - 40px);
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #a0b3c0;
        box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;
    }

    .container .box .icon .fa {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 50px;
        transition: 0.5s;
        color: rgb(243, 240, 240);
    }

    .container .box:hover .icon .fa {
        font-size: 27px;
    }

    .container .box .content {
        position: absolute;
        left: 100px;
        height: 100%;
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
        transition: 0.5s;

    }

    .container .box .content h3 {
        margin: 0;
        padding: 0;
        font-size: 30px;
        left: 70px;
        font-family: "CircularStd", sans-serif;
    }
</style> --}}
    <!-- /Page Wrapper -->
    @if (Auth::user()->role == 'Admin')
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome Admin!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                                <div class="dash-widget-info">
                                    <h3> {{ $masuk = DB::table('tbl_attendances')->count() }}</h3>
                                    <span>Masuk</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h3> {{ $assets = DB::table('tbl_assets')->count() }}</h3>
                                    <span>Assets</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{ $users = DB::table('tbl_clients')->count() }}</h3>
                                    <span>Client</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                <div class="dash-widget-info">
                                    <h3> {{ $users = DB::table('tbl_employees')->count() }}</h3>
                                    <span>Employees</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Total Revenue</h3>
                                        <div id="bar-charts-pendapatan"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="card-group m-b-30">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span class="d-block">New Employees</span>
                                        </div>
                                        <div>
                                            <span
                                                class="text-success">+{{ $users = DB::table('tbl_employees')->count() }}%</span>
                                        </div>
                                    </div>
                                    <h3 class="mb-3"> {{ $users = DB::table('tbl_employees')->count() }}</h3>
                                    <span>Employees</span>

                                    <p class="mb-0">Overall Employees
                                        {{ $users = DB::table('tbl_employees')->get()->sum('users') }}</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span class="d-block">Revenues</span>
                                        </div>
                                        <div>
                                            <span class="text-success">+
                                                {{ $id = DB::table('tbl_revenues')->count() }}</span>
                                        </div>
                                    </div>
                                    <h3 class="mb-3">Rp
                                        {{ $jumlah = DB::table('tbl_revenues')->get()->sum('jumlah') }}.000</h3>
                                    <span>Profit</span>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: {{ $jumlah = DB::table('tbl_revenues')->get()->sum('jumlah') }}%;"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0">Previous Month <span class="text-muted">Rp
                                            {{ $jumlah = DB::table('tbl_revenues')->get()->avg('jumlah') }}.000</span></p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span class="d-block">Expenses</span>
                                        </div>
                                        <div>
                                            <span
                                                class="text-danger">-{{ $id = DB::table('tbl_expenses')->count() }}</span>
                                        </div>
                                    </div>
                                    <h3 class="mb-3">Rp
                                        {{ $jumlah = DB::table('tbl_expenses')->get()->sum('jumlah') }}.000</h3>
                                    <span>Profit</span>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0">Previous Month <span class="text-muted">$7,500</span></p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span class="d-block">Profit</span>
                                        </div>
                                        <div>
                                            <span class="text-danger">-75%</span>
                                        </div>
                                    </div>
                                    <h3 class="mb-3">$1,12,000</h3>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0">Previous Month <span class="text-muted">$1,42,000</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- <!-- Statistics Widget -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
                        <div class="card flex-fill dash-statistics">
                            <div class="card-body">
                                <h5 class="card-title">Statistics</h5>
                                <div class="stats-list">
                                    <div class="stats-info">
                                        <p>Today Leave <strong>4 <small>/ 65</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 31%"
                                                aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="stats-info">
                                        <p>Pending Invoice <strong>15 <small>/ 92</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 31%"
                                                aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="stats-info">
                                        <p>Completed Projects <strong>85 <small>/ 112</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 62%"
                                                aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="stats-info">
                                        <p>Open Tickets <strong>190 <small>/ 212</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 62%"
                                                aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="stats-info">
                                        <p>Closed Tickets <strong>22 <small>/ 212</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 22%"
                                                aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <h4 class="card-title">Task Statistics</h4>
                                <div class="statistics">
                                    <div class="row">
                                        <div class="col-md-6 col-6 text-center">
                                            <div class="stats-box mb-4">
                                                <p>Total Tasks</p>
                                                <h3>385</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 text-center">
                                            <div class="stats-box mb-4">
                                                <p>Overdue Tasks</p>
                                                <h3>19</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-purple" role="progressbar"
                                        style="width: {{ $id = DB::table('tbl_revenues')->count() }}0" aria-valuenow="30"
                                        aria-valuemin="0" aria-valuemax="100">
                                        {{ $id = DB::table('tbl_revenues')->count() }}0%</div>
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 22%"
                                        aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">22%</div>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 24%"
                                        aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">24%</div>
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 26%"
                                        aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">21%</div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%"
                                        aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">10%</div>
                                    zartgfecdsxazhtbgrvefcdsxaz
                                </div>
                                <div>
                                    <p><i class="fa fa-dot-circle-o text-purple me-2"></i>Pendapatan <span
                                            class="float-end">{{ $jumlah = DB::table('tbl_revenues')->count() }}</span>
                                    </p>
                                    <p><i class="fa fa-dot-circle-o text-warning me-2"></i>Inprogress Tasks <span
                                            class="float-end">115</span></p>
                                    <p><i class="fa fa-dot-circle-o text-success me-2"></i>On Hold Tasks <span
                                            class="float-end">31</span></p>
                                    <p><i class="fa fa-dot-circle-o text-danger me-2"></i>Pending Tasks <span
                                            class="float-end">47</span></p>
                                    <p class="mb-0"><i class="fa fa-dot-circle-o text-info me-2"></i>Review Tasks <span
                                            class="float-end">5</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <h4 class="card-title">Today Absent <span
                                        class="badge bg-inverse-danger ms-2">{{ $masuk = DB::table('tbl_attendances')->count() }}</span>
                                </h4>

                                <div class="leave-info-box">
                                    <div class="media d-flex align-items-center">
                                        <a href="profile.html" class="avatar"><img alt=""
                                                src="assets/img/user.jpg"></a>
                                        <div class="media-body flex-grow-1">
                                            <div class="text-sm my-0">Martin Lewis</div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <h6 class="mb-0">4 Sep 2019</h6>
                                            <span class="text-sm text-muted">Leave Date</span>
                                        </div>
                                        <div class="col-6 text-end">
                                            <span class="badge bg-inverse-danger">Pending</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="leave-info-box">
                                    <div class="media d-flex align-items-center">
                                        <a href="profile.html" class="avatar"><img alt=""
                                                src="assets/img/user.jpg"></a>
                                        <div class="media-body flex-grow-1">
                                            <div class="text-sm my-0">Martin Lewis</div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <h6 class="mb-0">4 Sep 2019</h6>
                                            <span class="text-sm text-muted">Leave Date</span>
                                        </div>
                                        <div class="col-6 text-end">
                                            <span class="badge bg-inverse-success">Approved</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="load-more text-center">
                                    <a class="text-dark" href="javascript:void(0);">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Statistics Widget --> --}}

                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Invoices</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-nowrap custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Company</th>
                                                <th>Invoice Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $invo)
                                                <tr>
                                                    <td><a href="invoice-view.html">{{ $invo->invoice_id }}</a></td>
                                                    <td>
                                                        <h2><a href="#">{{ $invo->clients[0]->company }}</a></h2>
                                                    </td>
                                                    <td>{{ date('d F Y', strtotime($invo->invoice_date)) }}</td>
                                                    <td>{{ $invo->grand_total }}</td>
                                                    <td>
                                                        @if ($invo->status == 'Accepted')
                                                            <span
                                                                class="badge bg-inverse-success">{{ $invo->status }}</span>
                                                        @elseif ($invo->status == 'Declined')
                                                            <span
                                                                class="badge bg-inverse-danger">{{ $invo->status }}</span>
                                                        @elseif ($invo->status == 'Sent')
                                                            <span
                                                                class="badge bg-inverse-primary">{{ $invo->status }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-inverse-warning">{{ $invo->status }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="invoices.html">View all invoices</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Estimates</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th>Estimate ID</th>
                                                <th>Client</th>
                                                <th>Estimate Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($estimates as $esti)
                                                <tr>
                                                    <td><a href="invoice-view.html">{{ $esti->estimate_id }}</a></td>
                                                    <td>
                                                        <h2><a href="#">{{ $esti->clients[0]->company }}</a></h2>
                                                    </td>
                                                    <td>{{ date('d F Y', strtotime($esti->estimate_date)) }}</td>
                                                    <td>{{ $esti->grand_total }}</td>
                                                    <td>
                                                        @if ($esti->status == 'Accepted')
                                                            <span
                                                                class="badge bg-inverse-success">{{ $esti->status }}</span>
                                                        @elseif ($esti->status == 'Declined')
                                                            <span
                                                                class="badge bg-inverse-danger">{{ $esti->status }}</span>
                                                        @elseif ($esti->status == 'Sent')
                                                            <span
                                                                class="badge bg-inverse-primary">{{ $esti->status }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-inverse-warning">{{ $esti->status }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('dtEstimate') }}">View all Estimates</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Clients</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Client ID</th>
                                                <th>Email</th>
                                                <th>Company</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clients as $client)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar"><img alt=""
                                                                    src="{{ asset($client->image) }}"></a>
                                                            <a
                                                                href="client-profile.html">{{ $client->name }}<span>{{ $client->position }}</span></a>
                                                        </h2>
                                                    </td>
                                                    <td>{{ $client->id_client }}</td>
                                                    <td>{{ $client->email }}</td>
                                                    <td>{{ $client->company }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('dtclients') }}">View all clients</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Recent Projects</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Project Name </th>
                                                <th>Deadline</th>
                                                <th class="text-end">Priority</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $project)
                                                <tr>
                                                    <td>
                                                        <h2><a href="project-view.html">{{ $project->project_name }}</a>
                                                        </h2>
                                                        {{-- <small class="block text-ellipsis">
                                                            <span>1</span> <span class="text-muted">open tasks, </span>
                                                            <span>9</span> <span class="text-muted">tasks completed</span>
                                                        </small> --}}
                                                    </td>
                                                    <td>{{ date('d F Y', strtotime($project->end_date)) }}</td>
                                                    {{-- <td>
                                                        <div class="progress progress-xs progress-striped">
                                                            <div class="progress-bar" role="progressbar"
                                                                data-bs-toggle="tooltip" title="65%"
                                                                style="width: 65%">
                                                            </div>
                                                        </div>
                                                    </td> --}}
                                                    <td><a href="#"
                                                            class="badge badge-danger text-white">{{ $project->priority }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('dtProjects') }}">View all projects</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Content -->
    @endif
    </div>
@endsection
@section('addJavascript')
    <script>
        $(document).ready(function() {
            Morris.Bar({
                element: 'bar-charts-pendapatan',
                data: @php echo $total_pendapatan @endphp,
                xkey: 'year',
                ykeys: ['total_income', 'total_outcome'],
                labels: ['Total Income', 'Total Outcome'],
                lineColors: ['green', 'blue'],
                lineWidth: '3px',
                barColors: ['#aba4f2', '#d3cef8'],
                resize: true,
                redraw: true
            });

            // Line Chart

            Morris.Line({
                element: 'line-charts',
                data: [{
                        y: '2006',
                        a: 50,
                        b: 90
                    },
                    {
                        y: '2007',
                        a: 75,
                        b: 65
                    },
                    {
                        y: '2008',
                        a: 50,
                        b: 40
                    },
                    {
                        y: '2009',
                        a: 75,
                        b: 65
                    },
                    {
                        y: '2010',
                        a: 50,
                        b: 40
                    },
                    {
                        y: '2011',
                        a: 75,
                        b: 65
                    },
                    {
                        y: '2012',
                        a: 100,
                        b: 50
                    }
                ],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Total Sales', 'Total Revenue'],
                lineColors: ['#aba4f2', '#f89ed1'],
                lineWidth: '3px',
                resize: true,
                redraw: true
            });

        });
    </script>
@endsection
