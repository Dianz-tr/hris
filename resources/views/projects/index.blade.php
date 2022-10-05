@extends('layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div id="projects">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Projects</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dash_admin') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active mb-4">Projects</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#projects-insert"><i
                                    class="fa fa-plus"></i> Create Project</button>
                        </div>

                        {{-- <!-- Search Filter -->
                        <div class="row filter-row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group form-focus">
                                    <input type="text" class="form-control floating">
                                    <label class="focus-label">Project Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group form-focus">
                                    <input type="text" class="form-control floating">
                                    <label class="focus-label">Clients Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group form-focus select-focus">
                                    <select class="select floating">
                                        @foreach ($designations as $ds)
                                            <option value="{{ $ds->id }}">{{ $ds->name }}</option>
                                        @endforeach
                                    </select>
                                    <label class="focus-label">Designation</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <a href="#" class="btn btn-success w-100"> Search </a>
                            </div>
                        </div>
                        <!-- Search Filter --> --}}

                        <div class="row">
                            <div v-for="project in projects" class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown dropdown-action profile-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a @click="editProject(project.id)" class="dropdown-item" href="#"
                                                    data-bs-toggle="modal" data-bs-target="#projects-edit"><i
                                                        class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a @click="onDelete(project.id)" class="dropdown-item" href="#"><i
                                                        class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="accordion project-title">
                                            <a :href="getDetailUrl(project.id)">@{{ project.project_name }}</a>
                                        </h4>
                                        {{-- <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                                        </small> --}}
                                        <div class="accordion">
                                            <p class="text-muted overflow-auto" v-html="project.description">
                                                @{{ project.description }}</p>
                                        </div>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                @{{ project.end_date }}
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    @foreach ($users as $user)
                                                        <h5 href="#" value="{{ $user->id }}">{{ $user->name }}
                                                        </h5>
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </div>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="#" class="badge badge-danger"
                                                    data-bs-toggle="dropdown">@{{ project.priority }}</a>
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
                    </div>

                    <!-- /Page Content -->

                </div>
            </div>
        </div>

        @include('projects.create')

        @include('projects.edit')

        <!-- CDN -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>
        {{-- <script src="//feather.aviary.com/imaging/v3/editor.js"></script>

            <script src="//unpkg.com/grapesjs@0.10.7/dist/grapes.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/grapesjs-plugin-export@0.1.5/dist/grapesjs-plugin-export.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/grapesjs-plugin-ckeditor@0.0.9/dist/grapesjs-plugin-ckeditor.min.js"></script>esjs-plugin-ckeditor.min.js"></script>
            <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script> --}}
        {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}

        <script>
            var appComponent = new Vue({
                el: "#projects",
                data: {
                    projects: [

                    ],
                },
                mounted() {
                    this.renderData();
                },

                methods: {
                    renderData() {
                        $.ajax({
                            url: "/api/dataProjects",
                            success: function(rsp) {
                                appComponent.projects = rsp;
                            }
                        })
                    },

                    getDetailUrl(id) {
                        return '{{ url('/detailProjects/') }}' + '/' + id;
                        // console.log('p');
                    },

                    editProject(id) {
                        // console.log(id);
                        $.ajax({
                            url: '/api/editProjects/' + id,
                            type: 'get',
                            dataType: 'json',
                            success: function(rsp) {
                                // console.log(rsp);
                                $('#editProjectsId').val(rsp.id);
                                $('#editProjectsName').val(rsp.project_name);
                                $('#editProjectsClient').val(rsp.clients.name);
                                $('#editProjectsStart').val(rsp.start_date);
                                $('#editProjectsEnd').val(rsp.end_date);
                                $('#editProjectsLead').val(rsp.users.name);
                                $('#editProjectsRate').val(rsp.rate);
                                $('#editProjectsPriority').val(rsp.priority);
                                $('#editProjectsDesc').val(rsp.description);
                            }
                        });
                    },

                    onDelete(id) {
                        var projects = this.projects;
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '/api/deleteProjects/' + id,
                                    type: 'get',
                                    dataType: 'json',
                                    success: function(rsp) {
                                        Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        )
                                        appComponent.renderData();
                                    }
                                });
                            }
                        })
                    },
                },
            });

            // var description = $("#editor").text();

            $("#addProjects").on('submit', function(e) {
                //prevent Default functionality
                e.preventDefault();
                // console.log('??');
                // return false;
                // CKEDITOR.replace('description');
                // var description = CKEDITOR.instances.editor.get();
                var file_data = $('#addProjectsFile').prop('files')[0];
                var project_name = $('#addProjectsName').val();
                var client_id = $('#addProjectsClient').val();
                var start_date = $('#addProjectsStart').val();
                var end_date = $('#addProjectsEnd').val();
                var lead_project = $('#addProjectsLead').val();
                var rate = $('#addProjectsRate').val();
                var priority = $('#addProjectsPriority').val();
                var description = $('#editor').val();

                var formData = new FormData();
                formData.append('file', file_data);
                formData.append('project_name', project_name);
                formData.append('client_id', client_id);
                formData.append('start_date', start_date);
                formData.append('end_date', end_date);
                formData.append('lead_project', lead_project);
                formData.append('rate', rate);
                formData.append('priority', priority);
                formData.append('description', description);
                // var data = $(this).serialize();
                // console.log(data);
                $.ajax({
                    url: '/api/insertProjects',
                    type: 'post',
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(rsp) {
                        // console.log(rsp);
                        if (rsp != null) {
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Data has been add.',
                                    type: 'success',
                                    confirmButtonText: 'OK'
                                }),
                                appComponent.renderData();
                            $('#projects-insert').modal('hide');
                            $('#addProjects')[0].reset();
                        }
                        // console.log(rsp);
                    }
                });
            });

            //Edit Projects
            $("#editProjects").on('submit', function(e) {
                //prevent Default functionality
                e.preventDefault();
                var id = $('#editProjectsId').val();
                var file_data = $('#editProjectsFile').prop('files')[0];
                var project_name = $('#editProjectsName').val();
                var client_id = $('#editProjectsClient').val();
                var start_date = $('#editProjectsStart').val();
                var end_date = $('#editProjectsEnd').val();
                var lead_project = $('#editProjectsLead').val();
                var rate = $('#editProjectsRate').val();
                var priority = $('#editProjectsPriority').val();
                var description = $('#editProjectsDesc').val();

                var formData = new FormData();
                formData.append('file', file_data);
                formData.append('project_name', project_name);
                formData.append('client_id', client_id);
                formData.append('start_date', start_date);
                formData.append('end_date', end_date);
                formData.append('lead_project', lead_project);
                formData.append('rate', rate);
                formData.append('priority', priority);
                formData.append('description', description);
                // var data = $(this).serialize();
                //do your own request an handle the results
                $.ajax({
                    url: '/api/updateProjects/' + id,
                    type: 'post',
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(rsp) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data has been update.',
                            type: 'success',
                            confirmButtonText: 'OK'
                        })
                        appComponent.renderData();
                        $('#projects-edit').modal('hide');
                    }
                });
            });
        </script>


    </div>
@endsection
