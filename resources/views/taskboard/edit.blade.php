@extends('layouts.master')

@section('content')

<!-- Page Wrapper -->

<div class="page-wrapper" style="padding: 50px; margin-top:100px;">
    <h3 class="page-title">Project</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Project</li>
        </ul><br>
    <div class="card" >
        <div class="card-body">
            <form action="{{ route('updateProject', ['id' => $project->id])}}" method="post">
                {{ csrf_field() }}
    
                <div class="form-group">
                    <label for="nama">Title</label>
                    <input type="title" name="title" id="title" class="form-control" required="required" value="{{ $project->title }}" placeholder="Masukkan nama jurusan">
                </div>
    
                <div class="form-group">
                    <label for="date">Tanggal</label>
                    <input type="date" name="date" id="date" class="form-control" required="required" value="{{ $project->date }}" placeholder="Masukkan tanggal">
                </div>
    
                <div class="text-right">
                    <a href="{{ route('daftarProject') }}" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                    <button type="submit" class="btn btn-primary" onclick="contoh()">Simpan</button>
                </div>
                <script type="text/javascript">

                    function contoh() {
            
                       swal({
            
                            title: "Disimpan!",
            
                            text: "Data berhasil disimpan!",
            
                            icon: "success",
            
                            button: true
            
                        });
            
                    }

                    
            
                </script>
            </form>
            
        </div>
    </div>
</div>

@endsection