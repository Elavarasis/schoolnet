@extends('layouts.admin.datatable')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage {{ $title }}
        <small>Settings</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
				<div class="pull-right">
					@if( strtolower($title) == 'courses')
						<a class="btn btn-success" href="{{ route('tenant.courses.create') }}">Add New</a>
					@else
						<a class="btn-sm btn-primary" href="{{ url()->previous() }}">Back</a>
					@endif
				</div>
				<h3 class="box-title">List of all {{ $title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			  @if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			  @endif
			  @if ($message = Session::get('error'))
				<div class="alert alert-danger">
					<p>{{ $message }}</p>
				</div>
			  @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>No</th>
					<th>Title</th>
					<th>Duration</th>
					<th>Fee</th>
					<th>Image</th>
					<th>Status</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
					{{--*/ $i = 0 /*--}}
					@foreach ($courses as $key => $course)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $course->course_title }}</td>
						<td>{{ $course->course_duration }}</td>
						<td>{{ $course->course_fee }}</td>
						<td>
							@if(isset($course->course_image))
								<img width="50px" src="{{ URL::to('/') }}/public/images/course/small--{{$course->course_image}}" alt="" />
							@endif
						</td>
						<td>
							@if($course->course_status == 1)
								<span class="btn-xs btn-success">Active</a>
							@else
								<span class="btn-xs btn-danger">In-Active</a>
							@endif
						</td>
						<td>
							<a class="btn btn-info" href="{{ route('tenant.courses.show',$course->id) }}">Show</a>
							@if (DB::table('courses')->where('course_parent', '=', $course->id)->exists())
								<a class="btn btn-info" href="{{ url('tenant/courses/sub',$course->id) }}">Sub Courses</a>
							@endif
							<a class="btn btn-primary" href="{{ route('tenant.courses.edit',$course->id) }}">Edit</a>
							{!! Form::open(['method' => 'DELETE','route' => ['tenant.courses.destroy', $course->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}

							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Title</th>
					<th>Duration</th>
					<th>Fee</th>
					<th>Image</th>
					<th>Status</th>
					<th>Action</th>
                </tr>
                </tfoot>
              </table>
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

<script>
  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }
</script>