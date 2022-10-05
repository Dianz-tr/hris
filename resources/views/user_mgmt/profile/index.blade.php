@extends('user_mgmt.profile.main')

@section('addCss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />

    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 300px;
            height: 400px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }
    </style>
@endsection

@section('profil-content')
    <!-- Page Content -->
    <div class="content container-fluid">

        <div class="card mb-0">
            <div class="card-body">
                <div class="row mt-0">
                    <div class="col-md-12">
                        <div class="profile-view mt-0">
                            <div class="profile-basic">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="profile-info-left">
                                            <div class="profile-img">
                                                <a href="#"><img class="img-profile" alt=""
                                                        src="assets/img/profiles/avatar-02.jpg"></a>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                                <input type="file" name="image" class="image">
                                        </div>

                                        <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                            aria-labelledby="modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel">Crop Image</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="img-container">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <img id="image"
                                                                        src="https://avatars0.githubusercontent.com/u/3456749">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="preview"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary"
                                                            id="crop">Crop</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Nama Lengkap</div>
                                                <div class="text">: {{ $employee->name }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Phone</div>
                                                <div class="text">: {{ $employee->phone }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Email</div>
                                                <div class="text">: {{ $employee->users->email }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Birthday</div>
                                                <div class="text">: {{ $employee->birth }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Address</div>
                                                <div class="text">: {{ $employee->address }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Gender</div>
                                                <div class="text">: {{ $employee->gender }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Designations</div>
                                                <div class="text">: {{ $employee->role->name or 'not'}}</div>
                                            </li>
                                            {{-- <li>
                                                <div class="title">Reports to:</div>
                                                <div class="text">
                                                <div class="avatar-box">
                                                    <div class="avatar avatar-xs">
                                                        <img src="assets/img/profiles/avatar-16.jpg" alt="">
                                                    </div>
                                                </div>
                                                <a href="profile.html">
                                                        Jeffery Lalor
                                                    </a>
                                                </div>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-edit">
                                <a data-bs-target="#profile_info" data-bs-toggle="modal" class="edit-icon" href="#">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                @include('user_mgmt.profile.edit')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->

@endsection

@section('addJavascript')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;

        $("body").on("change", ".image", function(e) {
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 300,
                height: 400,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "profile-upload",
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            'image': base64data
                        },
                        success: function(data) {
                            console.log(data);
                            
                            $modal.modal('hide');
                            alert("Crop image successfully uploaded");
                        }
                    });
                }
            });
        })
    </script>
@endsection
