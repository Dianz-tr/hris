@extends('layouts.master')

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper"><br>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="col">
                <h3 class="page-title">Calendar</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Event</li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </div><br><br>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card" style="box-shadow: -5px -5px 9px white, 3px 3px 7px rgb(179, 178, 178); border-radius:0px;">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama </th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($events as $event)
                            {{-- @php
                                echo dd($event);
                            @endphp --}}
                            <tr>
                                <td> {{ $loop->index + 1 }}</td>
                                <td> {{ $event->title }}</td>
                                <td> {{ $event->start_date }} </td>
                                <td> {{ $event->end_date }} </td>
                                <td>
                                    
                                    <a href="{{route ('deleteEvent', ['id' => $event->id]) }}" class="btn btn-danger btn-sm text-white" role="button">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection