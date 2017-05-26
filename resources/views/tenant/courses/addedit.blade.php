@extends('layouts.tenant.form-general')

@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Course
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Add New Course</li>
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
				<h3 class="box-title">
					@if(isset($course))
						Edit Course
					@else
						Add New Course
					@endif
				</h3>
            </div>
            <!-- /.box-header -->
			
			@if (count($errors) > 0)

				<div class="alert alert-danger">

					<strong>Whoops!</strong> There were some problems with your input.<br><br>

					<ul>

						@foreach ($errors->all() as $error)

							<li>{{ $error }}</li>

						@endforeach

					</ul>

				</div>

			@endif
			
            <!-- form start -->
            @if(isset($course))
				{!! Form::model($course, ['files'=> true, 'method' => 'PATCH','route' => ['tenant.courses.update', $course->id]]) !!}
			@else
				{!! Form::open(array('files'=> true, 'route' => 'tenant.courses.store','method'=>'POST')) !!}
			@endif
              <div class="box-body">
                <div class="form-group">
                  <label for=" ">Title <span>*</span></label>
                  {!! Form::text('course_title', null, array('placeholder' => 'Course Name','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Short Description</label>
				  {!! Form::textarea('course_short_desc',null,['placeholder' => 'Short Description','class'=>'form-control', 'rows' => 3]) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Description</label>
				  {!! Form::textarea('course_description',null,['placeholder' => 'Course Description','class'=>'form-control', 'rows' => 7]) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Duration</label>
                  {!! Form::text('course_duration', null, array('placeholder' => 'Duration','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Course Fee</label>
                  {!! Form::text('course_fee', null, array('placeholder' => 'Course Fee','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Parent</label>
                  {!! Form::select('course_parent', $courses, null, array('class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Image</label>
				  @if(isset($course))
					<img width="100px" src="{{ URL::to('/') }}/public/images/course/medium--{{$course->course_image}}" alt="" />
				  @endif
				  {!! Form::file('course_image', ['class' => 'form-control']) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Video Url</label>
                  {!! Form::text('course_video_url', null, array('placeholder' => 'Video Url','class' => 'form-control')) !!}
                </div>
				
				<div class="checkbox">
                  <label style="width:100px;">Featured</label>
                  {!! Form::hidden('course_featured', '0') !!} <!-- checkbox will pass this value when it's not checked -->
				  {!! Form::checkbox('course_featured', '1', null, ['class' => 'form-control-block']) !!}
                </div>
				
				<div class="checkbox">
                  <label style="width:100px;">Status</label>
                  {!! Form::hidden('course_status', '0') !!} <!-- checkbox will pass this value when it's not checked -->
				  {!! Form::checkbox('course_status', '1', null, ['class' => 'form-control-block']) !!}
                </div>
				
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            {!! Form::close() !!}
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection