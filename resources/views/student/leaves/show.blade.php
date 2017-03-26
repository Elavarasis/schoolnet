@extends('layouts.admin.form-general')

@section('content')
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Leave Details
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
				<div class="pull-right">
					<a class="btn-sm btn-primary" href="{{ route('stud.leaves.index') }}"> Back</a>
				</div>
				<h3 class="box-title">Leave Details</h3>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Student Name:</label>
                  {{ $leave->user->first_name }} {{ $leave->user->last_name }}
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Student Email:</label>
                  {{ $leave->user->email }}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Total Days/Hours:</label>
                  {{ $leave->lv_totaldays }}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">From:</label>
                  {{ $leave->lv_start_date }} {{ $leave->lv_start_time }}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">To:</label>
                  {{ $leave->lv_end_date }} {{ $leave->lv_end_time }}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Reason for Leave:</label>
                  {{ $leave->lv_reason }}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Applicant:</label>
                  {{ $leave->applicant->first_name }} {{ $leave->applicant->last_name }}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Applicant Email:</label>
                  {{ $leave->applicant->email }}
                </div>
				
				<div class="form-group">
                  <label>Status:</label>
					@if($leave->lv_status == 0)
						<span class="btn-xs btn-warning">Pending</a>
					@elseif($leave->lv_status == 1)
						<span class="btn-xs btn-success">Approved</a>
					@else
						<span class="btn-xs btn-danger">Rejected</a>
					@endif
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Staff's Remark:</label>
                  {{ $leave->lv_remarks }}
                </div>
				
              </div>
              <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection