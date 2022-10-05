@extends('Employees.absensi.main')

@section('absensi-content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Attendance</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Attendance</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-md-4">
            <div class="card punch-status">
                <form action="{{ route('absen') }}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <h5 class="card-title">Timesheet <small class="text-muted">{{$today->format('j F Y')}}</small></h5>
                        <div class="punch-det">
                            <h6>Punch In at</h6>
                            <p>{{ $today->format('l, jS F Y h.i A') }}</p>
                        </div>
                        <div class="punch-info">
                            <div class="punch-hours">
                                <span id="jam"></span>.
                                <span id="menit"></span>-
                                <span >hrs</span> 
                            </div>
                        </div>
                        <div class="punch-btn-section">
                            <button type="submit" class="btn btn-primary punch-btn" name="btnIn" value="1"
                            {{ $info['btnIn'] }}>Punch In</button>
                            <button type="submit" class="btn btn-warning punch-btn" name="btnOut" value="1"
                            {{ $info['btnOut'] }}>Punch Out</button>
                        </div>
                        {{-- <div class="statistics">
                            <div class="row">
                                <div class="col-md-6 col-6 text-center">
                                    <div class="stats-box">
                                        <p>Break</p>
                                        <h6>1.21 hrs</h6>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 text-center">
                                    <div class="stats-box">
                                        <p>Overtime</p>
                                        <h6>3 hrs</h6>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card att-statistics">
                <div class="card-body">
                    <h5 class="card-title">Statistics</h5>
                    <div class="stats-list">
                        <div class="stats-info">
                            <p>Today <strong>{{$static_today or 0}} <small>/ 8 hrs</small></strong></p>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$percent_today}}%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="stats-info">
                            <p>This Week <strong>{{$static_week or 0}} <small>/ 40 hrs</small></strong></p>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{$percent_week}}%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="stats-info">
                            <p>This Month <strong>{{$static_month or 0}} <small>/ 160 hrs</small></strong></p>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$percent_month}}%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="stats-info">
                            <p>Remaining <strong>{{$static_remaining or 0}} <small>/ 160 hrs</small></strong></p>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$static_remaining}}%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        {{-- <div class="stats-info">
                            <p>Overtime <strong>4</strong></p>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card recent-activity">
                <div class="card-body">
                    <h5 class="card-title">Today Activity</h5>
                    <ul class="res-activity-list">
                        @foreach ($td_activi as $at)
                            <li>
                                <p class="mb-0">{{$at->note_in}}</p>
                                <p class="res-activity-time">
                                    <i class="fa fa-clock-o"></i>
                                    {{$at->masuk}}
                                </p>
                            </li>
                            @if ($at->note_out == null)
                            @else
                            <li>
                                <p class="mb-0">{{$at->note_out}}</p>
                                <p class="res-activity-time">
                                    <i class="fa fa-clock-o"></i>
                                    {{$at->keluar}}
                                </p>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
{{-- 
    <!-- Search Filter -->
    <div class="row filter-row">
        <div class="col-sm-3">  
            <div class="form-group form-focus">
                <div class="cal-icon">
                    <input type="text" class="form-control floating datetimepicker">
                </div>
                <label class="focus-label">Date</label>
            </div>
        </div>
        <div class="col-sm-3"> 
            <div class="form-group form-focus select-focus">
                <select class="select floating"> 
                    <option>-</option>
                    <option>Jan</option>
                    <option>Feb</option>
                    <option>Mar</option>
                    <option>Apr</option>
                    <option>May</option>
                    <option>Jun</option>
                    <option>Jul</option>
                    <option>Aug</option>
                    <option>Sep</option>
                    <option>Oct</option>
                    <option>Nov</option>
                    <option>Dec</option>
                </select>
                <label class="focus-label">Select Month</label>
            </div>
        </div>
        <div class="col-sm-3"> 
            <div class="form-group form-focus select-focus">
                <select class="select floating"> 
                    <option>-</option>
                    <option>2019</option>
                    <option>2018</option>
                    <option>2017</option>
                    <option>2016</option>
                    <option>2015</option>
                </select>
                <label class="focus-label">Select Year</label>
            </div>
        </div>
        <div class="col-sm-3">  
            <div class="d-grid">
                <a href="#" class="btn btn-success"> Search </a>  
            </div>
        </div>     
    </div>
    <!-- /Search Filter --> --}}
    
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date </th>
                            <th>Punch In</th>
                            <th>Punch Out</th>
                            <th>Production</th>
                            {{-- <th>Break</th>
                            <th>Overtime</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $atnd)
                            <tr>
                                <td>{{$loop->index +1 }}</td>
                                <td>{{ date('d F Y', strtotime($atnd->date)) }}</td>
                                <td>{{ date('h:i A', strtotime($atnd->masuk)) }}</td>
                                <td>{{ date('h:i A', strtotime($atnd->keluar)) }}</td>
                                <td>{{$atnd->production or 0}} hrs</td>
                                {{-- <td>1 hrs</td>
                                <td>0</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        window.setTimeout("waktu()", 1000);
     
        function waktu() {
            var waktu = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = waktu.getHours();
            document.getElementById("menit").innerHTML = waktu.getMinutes();
            document.getElementById("detik").innerHTML = waktu.getSeconds();
        }
    </script>
@endsection
