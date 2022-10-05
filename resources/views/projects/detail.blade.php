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
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Project</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        {{-- <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#edit_project"><i
                                class="fa fa-plus"></i> Edit Project</a>
                        <a href="task-board.html" class="btn btn-white float-end m-r-10" data-bs-toggle="tooltip"
                            title="Task Board"><i class="fa fa-bars"></i></a> --}}
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            @foreach ($projects as $project)
                <div class="row">
                    <div class="col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="project-title">
                                    <h5 class="card-title">{{ $project->project_name }}</h5>
                                    {{-- <small class="block text-ellipsis m-b-15"><span class="text-xs">2</span> <span
                                            class="text-muted">open tasks, </span><span class="text-xs">5</span> <span
                                            class="text-muted">tasks completed</span></small> --}}
                                </div>
                                <p>{!! $project->description !!}</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-20">Uploaded image files</h5>
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-lg-4 col-xl-3">
                                        <div class="uploaded-box">
                                            {{-- <div class="uploaded-img">
                                                <img src="assets/img/placeholder.jpg" class="img-fluid" alt="">
                                            </div> --}}
                                            <div class="uploaded-img-name">
                                                <img src="{{ asset($project->file) }}" alt="">
                                                {{-- <p>{{ $project->file }}</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="card" style="width: 270px">
                            <div class="card-body">
                                <h6 class="card-title m-b-15">Project details</h6>
                                <table class="table table-striped table-border">
                                    <tbody class="">
                                        <tr>
                                            <td>Cost:</td>
                                            <td class="text-end">{{ $project->rate }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td>Total Hours:</td>
                                            <td class="text-end">100 Hours</td>
                                        </tr> --}}
                                        <tr>
                                            <td>Created:</td>
                                            <td class="text-end">{{ $project->start_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Deadline:</td>
                                            <td class="text-end">{{ $project->end_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Priority:</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="#" class="badge badge-danger"
                                                        data-bs-toggle="dropdown">{{ $project->priority }}</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Leader Project:</td>
                                            <td class="text-center">{{ $project->users->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Client Name:</td>
                                            <td class="text-center">{{ $project->clients->name }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td>Created by:</td>
                                            <td class="text-end"><a href="profile.html">Barry Cuda</a></td>
                                        </tr>
                                        <tr>
                                            <td>Status:</td>
                                            <td class="text-end">Working</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                                {{-- <p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
                                <div class="progress progress-xs mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" data-bs-toggle="tooltip"
                                        title="40%" style="width: 40%"></div>
                                </div> --}}
                            </div>
                        </div>
                        {{-- <div class="card project-user">
                            <div class="card-body">
                                <h6 class="card-title m-b-20">Assigned Leader <button type="button"
                                        class="float-end btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#assign_leader"><i class="fa fa-plus"></i> Add</button></h6>
                                <ul class="list-box">
                                    <li>
                                        <a href="profile.html">
                                            <div class="list-item">
                                                <div class="list-body">
                                                    <span class="message-author">{{ $project->users->name }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        {{-- <div class="card project-user">
                            <div class="card-body">
                                <h6 class="card-title m-b-20">
                                    Assigned users
                                    <button type="button" class="float-end btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#assign_user"><i class="fa fa-plus"></i>
                                        Add</button>
                                </h6>
                                <ul class="list-box">
                                    <li>
                                        <a href="profile.html">
                                            <div class="list-item">
                                                <div class="list-left">
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author">{{ $project->users->name }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="profile.html">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar"><img alt=""
                                                            src="assets/img/profiles/avatar-09.jpg"></span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author"></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /Page Content -->

        <!-- Assign Leader Modal -->
        {{-- <div id="assign_leader" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Leader to this project</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input placeholder="Search to add a leader" class="form-control search-input" type="text">
                            <button class="btn btn-primary">Search</button>
                        </div>
                        <div>
                            <ul class="chat-user-list">
                                <li>
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar"><img alt=""
                                                    src="assets/img/profiles/avatar-09.jpg"></span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">Richard Miles</div>
                                                <span class="designation">Web Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar"><img alt=""
                                                    src="assets/img/profiles/avatar-10.jpg"></span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">John Smith</div>
                                                <span class="designation">Android Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar">
                                                <img alt="" src="assets/img/profiles/avatar-16.jpg">
                                            </span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">Jeffery Lalor</div>
                                                <span class="designation">Team Leader</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Assign Leader Modal -->

        <!-- Assign User Modal -->
        <div id="assign_user" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign the user to this project</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input placeholder="Search a user to assign" class="form-control search-input"
                                type="text">
                            <button class="btn btn-primary">Search</button>
                        </div>
                        <div>
                            <ul class="chat-user-list">
                                <li>
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar"><img alt=""
                                                    src="assets/img/profiles/avatar-09.jpg"></span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">Richard Miles</div>
                                                <span class="designation">Web Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar"><img alt=""
                                                    src="assets/img/profiles/avatar-10.jpg"></span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">John Smith</div>
                                                <span class="designation">Android Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar">
                                                <img alt="" src="assets/img/profiles/avatar-16.jpg">
                                            </span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">Jeffery Lalor</div>
                                                <span class="designation">Team Leader</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /Assign User Modal -->

        {{-- <!-- Edit Project Modal -->
        <div id="edit_project" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Project</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Project Name</label>
                                        <input class="form-control" value="Project Management" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Client</label>
                                        <select class="select">
                                            <option>Global Technologies</option>
                                            <option>Delta Infotech</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Rate</label>
                                        <input placeholder="$50" class="form-control" value="$5000" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <select class="select">
                                            <option>Hourly</option>
                                            <option selected>Fixed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Priority</label>
                                        <select class="select">
                                            <option selected>High</option>
                                            <option>Medium</option>
                                            <option>Low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Add Project Leader</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Team Leader</label>
                                        <div class="project-members">
                                            <a class="avatar" href="#" data-bs-toggle="tooltip"
                                                title="Jeffery Lalor">
                                                <img alt="" src="assets/img/profiles/avatar-16.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Add Team</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Team Members</label>
                                        <div class="project-members">
                                            <a class="avatar" href="#" data-bs-toggle="tooltip" title="John Doe">
                                                <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                            </a>
                                            <a class="avatar" href="#" data-bs-toggle="tooltip"
                                                title="Richard Miles">
                                                <img alt="" src="assets/img/profiles/avatar-09.jpg">
                                            </a>
                                            <a class="avatar" href="#" data-bs-toggle="tooltip"
                                                title="John Smith">
                                                <img alt="" src="assets/img/profiles/avatar-10.jpg">
                                            </a>
                                            <a class="avatar" href="#" data-bs-toggle="tooltip"
                                                title="Mike Litorus">
                                                <img alt="" src="assets/img/profiles/avatar-05.jpg">
                                            </a>
                                            <span class="all-team">+2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea rows="4" class="form-control" placeholder="Enter your message here"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Files</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Project Modal --> --}}

    </div>
    <!-- /Page Wrapper -->
@endsection
