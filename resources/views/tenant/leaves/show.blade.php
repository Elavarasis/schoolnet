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
					<a class="btn-sm btn-primary" href="{{ route('tenant.leaves.index') }}"> Back</a>
				</div>
				<h3 class="box-title">Leave Details</h3>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Student Name:</label>
                  {{ $leave->first_name }} {{ $leave->last_name }}
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Student Email:</label>
                  {{ $leave->email }}
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
                  {{ $leave->apl_first_name }} {{ $leave->apl_last_name }}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Applicant Email:</label>
                  {{ $leave->apl_email }}
                </div>
				
				{!! Form::model($leave, ['files'=> true, 'method' => 'post', 'url' => "tenant/leaves/update_status/"])!!}
				
				{!! Form::hidden('leave_id', (isset($leave->id)) ? $leave->id : 0) !!}
				<div class="form-group">
                  <label>Status:</label>
					<?php $status = array('Pending','Approved','Rejected'); ?>
					{!! Form::select('lv_status', $status, null, array('class' => 'form-control', 'id' => 'city_id')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Remarks</label>
				  {!! Form::textarea('lv_remarks',null,['placeholder' => 'Remarks','class'=>'form-control', 'rows' => 5]) !!}
                </div>
				
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				
				{!! Form::close() !!}
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