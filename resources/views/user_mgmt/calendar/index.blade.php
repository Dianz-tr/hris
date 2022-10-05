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
                        <h3 class="page-title">Events</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Events</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="{{ url('event/add')}}" class="btn add-btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#add_event" style="background-color:#364a51;"><i class="fa fa-plus"></i> Add Event</a>
                    </div>
                    @include('user_mgmt.calendar.create')
                </div>
            </div>
            <!-- /Page Header -->

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                @endif
                    
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    {!! $calendar->calendar() !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->

    <style>
        .row .card{
            border-radius: 17px;
            background: #f7f7f7;
            box-shadow:  5px 5px 16px #cdcdcd,
                        -5px -5px 16px #ffffff;
        }
        /* .row .card .card-body {
            box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;
            border-radius: 10px;
        } */
    </style>
@endsection

@section('addJavascript')
    
{{-- <script type="text/javascript">  
    $('#startdate').datepicker({ 
        autoclose: true,   
        dateFormat: 'yy-mm-dd'  
     });
     $('#enddate').datepicker({ 
        autoclose: true,   
        dateFormat: 'yy-mm-dd'
     }); 
</script> --}}

    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script> --}}
    {!! $calendar->script() !!}
   

@endsection