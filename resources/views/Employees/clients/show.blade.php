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
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="">
                                            {{-- <img src="{{ route('/image') }}" alt=""> --}}
                                            <img src="{{ asset($clients->image) }}" alt="">
                                            {{-- <img :src="client.image" alt=""> --}}

                                        </a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0">{{ $clients->company }}</h3>
                                                <h5 class="company-role m-t-0 mb-0">{{ $clients->name }}</h5>
                                                <small class="text-muted">{{ $clients->position }}</small>
                                                <div class="staff-id">Clients ID : {{ $clients->id_client }}
                                                </div>
                                                {{-- <div class="staff-msg"><a href="chat.html"
                                                                class="btn btn-custom">Send
                                                                Message</a></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="">{{ $clients->phone }}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="">{{ $clients->email }}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Birthday:</span>
                                                    <span
                                                        class="text">{{ date('d F Y', strtotime($clients->birthday)) }}</span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text">{{ $clients->address }}</span>
                                                </li>
                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text">{{ $clients->gender }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item col-sm-3"><a class="nav-link active" data-bs-toggle="tab"
                                    href="#myprojects">Projects</a></li>
                            {{-- <li class="nav-item col-sm-3"><a class="nav-link" data-bs-toggle="tab" href="#tasks">Tasks</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <h2>Project</h2> --}}
                <div class="col-lg-12">
                    <div class="tab-content profile-tab-content">
                        @foreach ($projects as $project)
                            <!-- Projects Tab -->
                            <div class="row">
                                <div v-for="project in projects" class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="accordion project-title">
                                                <a>{{ $project->project_name }}</a>
                                            </h4>
                                            {{-- <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                                        </small> --}}
                                            <div class="accordion">
                                                <p class="text-muted overflow-auto">
                                                    {!! $project->description !!}</p>
                                            </div>
                                            <div class="pro-deadline m-b-15">
                                                <div class="sub-title">
                                                    Deadline:
                                                </div>
                                                <div class="text-muted">
                                                    {{ $project->end_date }}
                                                </div>
                                            </div>
                                            <div class="project-members m-b-15">
                                                <div>Project Leader :</div>
                                                <ul class="team-members">
                                                    <li>
                                                        @foreach ($users as $user)
                                                            <h5 href="#" value="{{ $user->id }}">
                                                                {{ $user->name }}
                                                            </h5>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </div>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="#" class="badge badge-danger"
                                                        data-bs-toggle="dropdown">{{ $project->priority }}</a>
                                                </div>
                                            </td>
                                            {{-- <p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-success" role="progressbar" data-bs-toggle="tooltip"
                                                title="40%" style="width: 40%"></div>
                                        </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /Projects Tab -->
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
    </div>
@endsection
