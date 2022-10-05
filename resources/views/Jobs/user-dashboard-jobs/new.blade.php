
<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
        
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">User Job Dashboard</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                        <li class="breadcrumb-item">Jobs</li>
                        <li class="breadcrumb-item">User Dashboard</li>
                        <li class="breadcrumb-item">User Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <!-- Content Starts -->
        {{-- <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Solid justified</h4> -->
                <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                    <li class="nav-item"><a class="nav-link active" href="user-dashboard.html">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="user-all-jobs.html">All </a></li>
                    <li class="nav-item"><a class="nav-link" href="saved-jobs.html">Saved</a></li>
                    <li class="nav-item"><a class="nav-link" href="applied-jobs.html">Applied</a></li>
                    <li class="nav-item"><a class="nav-link" href="interviewing.html">Interviewing</a></li>
                    <li class="nav-item"><a class="nav-link" href="offered-jobs.html">Offered</a></li>
                    <li class="nav-item"><a class="nav-link" href="visited-jobs.html">Visitied </a></li>
                    <li class="nav-item"><a class="nav-link" href="archived-jobs.html">Archived </a></li>
                </ul>
            </div>
        </div> --}}
        
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-file-text-o"></i></span>
                        <div class="dash-widget-info">
                            <h3>110</h3>
                            <span>Offered</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-clipboard"></i></span>
                        <div class="dash-widget-info">
                            <h3>40</h3>
                            <span>Applied</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-retweet"></i></span>
                        <div class="dash-widget-info">
                            <h3>374</h3>
                            <span>Visited</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-floppy-o"></i></span>
                        <div class="dash-widget-info">
                            <h3>220</h3>
                            <span>Saved</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 text-center d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <h3 class="card-title">Overview</h3>
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <h3 class="card-title text-center">Latest Jobs</h3>
                                @foreach ($managejobs as $mj)
                                <ul class="list-group">
                                      <li class="list-group-item list-group-item-action">{{$mj->job_title}}<span class="float-end text-sm text-muted">1 Hours ago</span></li>
                                      {{-- <li class="list-group-item list-group-item-action">Android Developer <span class="float-end text-sm text-muted">1 Days ago</span></li>
                                      <li class="list-group-item list-group-item-action">IOS Developer<span class="float-end text-sm text-muted">2 Days ago</span></li>
                                      <li class="list-group-item list-group-item-action">PHP Developer<span class="float-end text-sm text-muted">3 Days ago</span></li>
                                      <li class="list-group-item list-group-item-action">UI Developer<span class="float-end text-sm text-muted">3 Days ago</span></li>
                                      <li class="list-group-item list-group-item-action">PHP Developer<span class="float-end text-sm text-muted">4 Days ago</span></li>
                                      <li class="list-group-item list-group-item-action">UI Developer<span class="float-end text-sm text-muted">4 Days ago</span></li>
                                      <li class="list-group-item list-group-item-action">Android Developer<span class="float-end text-sm text-muted">6 Days ago</span></li> --}}
                                </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            
        <div class="row">
            <div class="col-md-12">
                <div class="card card-table">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Offered Jobs</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-nowrap custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Job Title</th>
                                        <th>Department</th>
                                        <th class="text-center">Job Type</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($managejobs as $mj)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td><a href="job-details.html">{{$mj->job_title}}</a></td>
                                        <td>{{$mj->departmen}}</td>
                                        <td class="text-center">
                                            <div class=" action-label">
                                                @if ($mj->job_type == 'Full Time')
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-info"></i> {{ $mj->job_type}} 
                                                    </a>
                                                @elseif($mj->job_type == 'Part Time')
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-success"></i> {{ $mj->job_type}} 
                                                    </a>
                                                @elseif($mj->job_type == 'Internship')
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-danger"></i> {{ $mj->job_type}} 
                                                    </a>
                                                @elseif($mj->job_type == 'Temporary')
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-warning"></i> {{ $mj->job_type}} 
                                                    </a>
                                                @else
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-warning"></i> {{ $mj->job_type}} 
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-info download-offer"><span><i class="fa fa-download me-1"></i> Download Offer</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                                    
        <div class="row">
            <div class="col-md-12">
                <div class="card card-table">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Applied Jobs</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-nowrap custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Job Title</th>
                                        <th>Department</th>
                                        <th>Start Date</th>
                                        <th>Expire Date</th>
                                        <th class="text-center">Job Type</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($managejobs as $mj)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td><a href="job-details.html">{{$mj->job_title}}</a></td>
                                        <td>{{$mj->departmen}}</td>
                                        <td>{{$mj->start_date}}</td>
                                        <td>{{$mj->end_date}}</td>
                                        <td class="text-center">
                                            <div class=" action-label">
                                                @if ($mj->job_type == 'Full Time')
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-info"></i> {{ $mj->job_type}} 
                                                    </a>
                                                @elseif($mj->job_type == 'Part Time')
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-success"></i> {{ $mj->job_type}} 
                                                    </a>
                                                @elseif($mj->job_type == 'Internship')
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-danger"></i> {{ $mj->job_type}} 
                                                    </a>
                                                @elseif($mj->job_type == 'Temporary')
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-warning"></i> {{ $mj->job_type}} 
                                                    </a>
                                                @else
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-warning"></i> {{ $mj->job_type}} 
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class=" action-label">
                                                @if ($mj->status == 'Open')
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-info"></i> {{ $mj->status}} 
                                                    </a>
                                                @elseif($mj->status == 'Closed')
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-success"></i> {{ $mj->status}} 
                                                    </a>
                                                @else
                                                    <a class="btn btn-white btn-sm btn-rounded" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-danger"></i> {{ $mj->status}} 
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_job{{$mj->id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('Jobs.manage_jobs.delete')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- /Content End -->
        
    </div>
    <!-- /Page Content -->
    
</div>
<!-- /Page Wrapper -->