@extends('layouts.admin.form-general')

@section('content')
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
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
					<a class="btn-sm btn-primary" href="{{ route('admin.cities.index') }}"> Back</a>
				</div>
				<h3 class="box-title">School admin Details</h3>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
                <div class="form-group">
                  <label for="">First Name:</label>
                  {{ $school_admin->first_name }} 
                </div>
				<div class="form-group">
                  <label for="">Last Name:</label>
                  {{ $school_admin->last_name }} 
                </div>
				<div class="form-group">
                  <label for="">Email:</label>
                  {{ $school_admin->email }} 
                </div>
				<div class="form-group">
                  <label for="">Designation:</label>
                  {{ $school_admin->designation }} 
                </div>
				<div class="form-group">
                  <label for="">DOB:</label>
                  {{ $school_admin->dob }} 
                </div>
				<div class="form-group">
                  <label for="">Phone mobile:</label>
                  {{ $school_admin->phone }} 
                </div>
				<div class="form-group">
                  <label for="">website:</label>
                  {{ $school_admin->website }} 
                </div>
               				
				<div class="form-group">
                  <label>Status:</label>
					@if ( $school_admin->status == 1 )
						<span class="btn-xs btn-success">Active</a>
					@else
						<span class="btn-xs btn-danger">In-Active</a>
					@endif
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