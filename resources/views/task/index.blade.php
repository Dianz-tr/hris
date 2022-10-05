@extends('layouts.master')

@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="chat-main-row">
            <div class="chat-main-wrapper">
                <div class="col-lg-7 message-view task-view task-left-sidebar">
                    <div class="chat-window">
                        <div class="fixed-header">
                            <div class="navbar">
                                <div class="float-start me-auto">
                                    <div class="add-task-btn-wrapper">
                                        <span class="add-task-btn btn btn-white btn-sm">
                                            <div class="add-new-task">
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#add_task_modal">Add New Task</a>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <a class="task-chat profile-rightbar float-end" id="task_chat" href="#task_window"><i
                                        class="fa fa fa-comment"></i></a>
                                <ul class="nav float-end custom-menu">
                                    <li class="dropdown dropdown-action">
                                        <a href="" class="dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void(0)">Pending Tasks</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Completed Tasks</a>
                                            <a class="dropdown-item" href="javascript:void(0)">All Tasks</a>
                                        </div>
                            </div>
                            </li>
                            </ul>
                        </div>
                        <div class="chat-contents">
                            <div class="chat-content-wrap">
                                <div class="chat-wrap-inner">
                                    <div class="chat-box">
                                        <div class="task-wrapper">
                                            <div class="task-list-container">
                                                <div class="task-list-body">
                                                    <ul id="task-list">
                                                        @foreach ($task as $ts)
                                                            <li class="task">
                                                                <div class="task-container">
                                                                    <span class="task-action-btn task-check">
                                                                        <span class="action-circle large complete-btn"
                                                                            title="Mark Complete">
                                                                            <i class="material-icons"
                                                                                href="{{ route('completeTask', ['id' => $ts->id]) }}">check</i>
                                                                        </span>
                                                                    </span>

                                                                    <span class="task-label"
                                                                        contenteditable="true">{{ $ts->name }}</span>

                                                                    <span class="task-action-btn task-btn-right">
                                                                        <span class="action-circle large" title="Edit">
                                                                            <i class="material-icons"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#edit_task_modal">edit</i>
                                                                        </span>
                                                                        <span class="action-circle large delete-btn"
                                                                            title="Delete Task">
                                                                            <a class="material-icons"
                                                                                href="{{ route('deleteTask', ['id' => $ts->id]) }}">delete</a>
                                                                        </span>
                                                                        {{-- <span class="action-circle large delete-btn" title=" Setting">
                                                                    <a class="material-icons" href="{{ route('settingTask', ['id' => $ts->id]) }}">setting</a>
                                                                </span> --}}

                                                                    </span>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="task-list-footer" id="new">
                                                    <div class="new-task-wrapper">
                                                        <textarea id="new-task" placeholder="Enter new task here. . ."></textarea>
                                                        <span class="error-message hidden">You need to enter a task
                                                            first</span>
                                                        <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                                        <span class="btn" id="close-task-panel">Close</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <style>
                                        .task-wrapper .task-list-body ul li .task-container .action-circle:hover {
                                            background: #35BA67 !important;
                                            border: 1px solid #35BA67 !important;
                                            color: #ffffff;
                                            }

                                            .task-wrapper .task-list-body li .task-container .task-label:hover {
                                                display: table-cell;
                                                font-weight: 400;
                                                vertical-align: middle;
                                                color: #333333;
                                                word-break: break-all;
                                            }
                                    </style> --}}
                                        <div class="notification-popup hide">
                                            <p>
                                                <span class="task"></span>
                                                <span class="notification-text"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="add_task_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Task</h4>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('storeTask') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            {{-- <div class="form-group">
                            <label>Tanggal</label>
                            <select class="form-control select">
                                <option>Select</option>
                                <option>High</option>
                                <option>Normal</option>
                                <option>Low</option>
                            </select>
                        </div> --}}

                            {{-- <div class="form-group">
                            <label>Due Date</label>
                            <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                        </div>
                        <div class="form-group">
                            <label>Task Followers</label>
                            <input type="text" class="form-control" placeholder="Search to add">
                            <div class="task-follower-list">
                                <span data-bs-toggle="tooltip" title="John Doe">
                                    <img src="assets/img/profiles/avatar-02.jpg" class="avatar" alt="John Doe" width="20" height="20">
                                    <i class="fa fa-times"></i>
                                </span>
                                <span data-bs-toggle="tooltip" title="Richard Miles">
                                    <img src="assets/img/profiles/avatar-09.jpg" class="avatar" alt="Richard Miles" width="20" height="20">
                                    <i class="fa fa-times"></i>
                                </span>
                                <span data-bs-toggle="tooltip" title="John Smith">
                                    <img src="assets/img/profiles/avatar-10.jpg" class="avatar" alt="John Smith" width="20" height="20">
                                    <i class="fa fa-times"></i>
                                </span>
                                <span data-bs-toggle="tooltip" title="Mike Litorus">
                                    <img src="assets/img/profiles/avatar-05.jpg" class="avatar" alt="Mike Litorus" width="20" height="20">
                                    <i class="fa fa-times"></i>
                                </span>
                            </div>
                        </div> --}}
                            <div class="submit-section text-center">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal custom-modal fade" id="edit_task_modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Task</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updateTask', ['id' => $ts->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            @foreach ($task as $ts)
                                <div class="form-group row">
                                    <label class="col-lg-12 control-label">Title : {{ $loop->index + 1 }}</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $ts->name }}">
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="submit-section text-center">
                            <a href="{{ route('storeTask')}}"></a>
                            <button class="btn btn-primary submit-btn">Simpan</button>
                        </div> --}}
                            <div class="submit-section">
                                {{-- <a href="{{ route('updateTask')}}"></a> --}}
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Project Modal -->
        <div id="create_project" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Project</h5>
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
                                        <input class="form-control" type="text">
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
                                        <input placeholder="$50" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <select class="select">
                                            <option>Hourly</option>
                                            <option>Fixed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Priority</label>
                                        <select class="select">
                                            <option>High</option>
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
                                <div id="editor"></div>
                            </div>
                            <div class="form-group">
                                <label>Upload Files</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Create Project Modal -->

        <!-- Assignee Modal -->
        <div id="assignee" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign to this task</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input placeholder="Search to add" class="form-control search-input" type="text">
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
                            <button class="btn btn-primary submit-btn">Assign</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Assignee Modal -->

        <!-- Task Followers Modal -->
        <div id="task_followers" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add followers to this task</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input placeholder="Search to add" class="form-control search-input" type="text">
                            <button class="btn btn-primary">Search</button>
                        </div>
                        <div>
                            <ul class="chat-user-list">
                                <li>
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar"><img alt=""
                                                    src="assets/img/profiles/avatar-16.jpg"></span>
                                            <div class="media-body media-middle text-nowrap">
                                                <div class="user-name">Jeffery Lalor</div>
                                                <span class="designation">Team Leader</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar"><img alt=""
                                                    src="assets/img/profiles/avatar-08.jpg"></span>
                                            <div class="media-body media-middle text-nowrap">
                                                <div class="user-name">Catherine Manseau</div>
                                                <span class="designation">Android Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar"><img alt=""
                                                    src="assets/img/profiles/avatar-26.jpg"></span>
                                            <div class="media-body media-middle text-nowrap">
                                                <div class="user-name">Wilmer Deluna</div>
                                                <span class="designation">Team Leader</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Add to Follow</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Task Followers Modal -->

    </div>



    <!-- /Page Wrapper -->
