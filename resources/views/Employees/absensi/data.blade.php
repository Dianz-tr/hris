@extends('absensi.main')

@section('absensi-content')

<!-- Leave Statistics -->
<div class="row">
    <div class="col-md-3">
        <div class="stats-info">
            <h6>Masuk</h6>
            <h4>120</h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-info">
            <h6>Izin/Sakit</h6>
            <h4>3</h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-info">
            <h6>Tanpa Keterangan</h6>
            <h4>4</h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-info">
            <h6>Terlambat</h6>
            <h4>5</h4>
        </div>
    </div>
</div>
<!-- /Leave Statistics -->
<div class="card tab-box" style="border-radius: 0px">
    <div class="row user-tabs">
        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
            <ul class="nav nav-tabs nav-tabs-top nav-justified mb-0">
                <li class="nav-item col-sm-3 " ><a class="nav-link " href="{{ url('absen') }}">Absensi</a></li>
                <li class="nav-item col-sm-3" ><a class="nav-link active" href="{{ url('absen-data') }}">Profil</a></li>
            </ul>
        </div>
    </div>
</div>


<div id="statis" class="row staff-grid-row">
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="profile-widget">
            <div class="profile-img">
                <a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
            </div>
            <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Global Technologies</a></h4>
            <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5>
            <div class="small text-muted">CEO</div>
            <a href="{{ url ('absen-profil')}}" id="view" class="btn btn-white btn-sm m-t-10">View Profile</a>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3" >
        <div class="profile-widget" style="border-radius: 20px">
            <div class="profile-img">
                <a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
            </div>
            <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Global Technologies</a></h4>
            <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5>
            <div class="small text-muted">CEO</div>
            <a href="{{ url ('absen-profil')}}" id="view" class="btn btn-sm m-t-10 text-white" >View Profile</a>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="profile-widget" >
            <div class="profile-img">
                <a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
            </div>
            <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Global Technologies</a></h4>
            <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5>
            <div class="small text-muted">CEO</div>
            <a href="{{ url ('absen-profil')}}" id="view" class="btn btn-white btn-sm m-t-10">View Profile</a>
        </div>
    </div>
    <div  class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="profile-widget" >
            <div class="profile-img">
                <a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
            </div>
            <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Global Technologies</a></h4>
            <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5>
            <div class="small text-muted">CEO</div>
            <a href="{{ url ('absen-profil')}}" id="view" class="btn btn-white btn-sm m-t-10">View Profile</a>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="profile-widget">
            <div class="profile-img">
                <a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
            </div>
            <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Global Technologies</a></h4>
            <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5>
            <div class="small text-muted">CEO</div>
            <a href="{{ url ('absen-profil')}}" id="view" class="btn btn-white btn-sm m-t-10">View Profile</a>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="profile-widget">
            <div class="profile-img">
                <a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
            </div>
            <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Global Technologies</a></h4>
            <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5>
            <div class="small text-muted">CEO</div>
            <a href="{{ url ('absen-profil')}}" id="view" class="btn btn-white btn-sm m-t-10">View Profile</a>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="profile-widget">
            <div class="profile-img">
                <a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
            </div>
            <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Global Technologies</a></h4>
            <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5>
            <div class="small text-muted">CEO</div>
            <a href="{{ url ('absen-profil')}}" id="view" class="btn btn-white btn-sm m-t-10">View Profile</a>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="profile-widget">
            <div class="profile-img">
                <a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
            </div>
            <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Global Technologies</a></h4>
            <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5>
            <div class="small text-muted">CEO</div>
            <a href="{{ url ('absen-profil')}}" id="view" class="btn btn-white btn-sm m-t-10">View Profile</a>
        </div>
    </div>
    
</div>

<style>
    .profile-widget{
        border-radius: 20px;
    }
    
    #view{
        background-color:#364a51; 
        border-radius:20px;
        color: white;
    }
    #statis:hover .profile-widget{
  
        transform: scale(0.9);
        opacity: 0.5;
    }

    #statis .profile-widget:hover{
        filter: blur(0px);
        transform: scale(1.1);
        opacity: 1; 
        
    }
    #statis .profile-widget{
        transition:  0.5s;  
    }
</style>

@endsection