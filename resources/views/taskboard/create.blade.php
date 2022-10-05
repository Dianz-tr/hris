@extends('layouts.master')

@section('content')

<!-- Page Wrapper -->

<br>
<div class="page-wrapper" style="padding: 50px;">
    <h3 class="page-title">Edit Project</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('project')}}">Project</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ul><br>
    <div class="card" >
        <div class="card-body">
            <form action="{{ route('storeProject') }}" method="post">
                {{ csrf_field() }}
    
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required="required" placeholder="Masukkan title">
                </div>
                <div class="form-group">
                    <label for="nama">Tanggal</label>
                    <input type="date" name="date" id="date" class="form-control" required="required" placeholder="Masukkan tanggal">
                </div>
    
                {{-- <div class="form-group">
                    <label for="date">Deskripsi</label>
                    <textarea type='date' name="date" id="deskripsi" rows="3" class="form-control" required="required" placeholder="Masukkan deskripsi jurusan"></textarea>
                </div> --}}
    
                <div class="text-right">
                    <a href="{{ route('daftarProject') }}" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                    <button type="submit" class="btn btn-primary" onclick="dua()">Simpan</button>
                </div>
            </form>
            <script>
                function dua() {
                
                swal({
    
                    title: "Berhasil!",
    
                    text: "Data berhasil disimpan!",
    
                    icon: "success",
    
                    button: true
    
                });
    
            }
            </script>
        </div>
    </div>
</div>

@endsection