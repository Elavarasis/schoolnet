@extends('layouts.admin.form-general')

@section('content')
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Course Details
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
					<a class="btn-sm btn-primary" href="{{ url()->previous() }}"> Back</a>
				</div>
				<h3 class="box-title">Course Details</h3>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
				<div class="form-group">
                  @if(isset($course->course_image))
					<img width="100px" class="pull-right" src="{{ URL::to('/') }}/public/images/course/medium--{{$course->course_image}}" alt="" />
				  @endif
                </div>
				
                <div class="form-group">
                  <b>{{ strtoupper($course->course_title) }}</b>
                </div>
                
                <div class="form-group">
                  {{ $course->course_description }}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Duration:</label>
                  {{ $course->course_duration }}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Fee:</label>
                  {{ $course->course_fee }}
                </div>
				
				<div class="form-group">
                  <label>Status:</label>
					@if ( $course->course_status == 1 )
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