@extends('layouts.master')

@section('content')
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Events</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Events</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_event"><i class="fa fa-plus"></i> Add Event</a>
                </div>
                @include('user_mgmt.task_mgmt.create')
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            
                                <!-- Calendar -->
                                <div id="calendar"></div>
                                <!-- /Calendar -->
                                
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

<script type="text/javascript">  
    $('#startdate').datepicker({ 
        autoclose: true,   
        format: 'yyyy-mm-dd'  
     });
     $('#enddate').datepicker({ 
        autoclose: true,   
        format: 'yyyy-mm-dd'
     }); 
</script>

{{-- 
<!-- Event Modal -->
<div class="modal custom-modal fade" id="event-modal">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Event</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer text-center">
            <button type="button" class="btn btn-success submit-btn save-event">Create event</button>
            <button type="button" class="btn btn-danger submit-btn delete-event" data-bs-dismiss="modal">Delete</button>
        </div>
    </div>
</div>
</div>
<!-- /Event Modal -->

<!-- Add Category Modal-->
<div class="modal custom-modal fade" id="add-category">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add a category</h4>
        </div>
        <div class="modal-body p-20">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-form-label">Category Name</label>
                        <input class="form-control" placeholder="Enter name" type="text" name="category-name">
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label">Choose Category Color</label>
                        <select class="form-control form-select" data-placeholder="Choose a color..." name="category-color">
                            <option value="success">Success</option>
                            <option value="danger">Danger</option>
                            <option value="info">Info</option>
                            <option value="pink">Pink</option>
                            <option value="primary">Primary</option>
                            <option value="warning">Warning</option>
                            <option value="orange">Orange</option>
                            <option value="brown">Brown</option>
                            <option value="teal">Teal</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger save-category" data-bs-dismiss="modal">Save</button>
        </div>
    </div>
</div>
</div> --}}

@endsection