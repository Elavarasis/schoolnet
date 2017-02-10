@extends('layouts.admin.datatable')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Students
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
					<a class="btn btn-success" href="{{ route('admin.students.create') }}">Add New</a>
				</div>
				<h3 class="box-title">List of all Students</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			  @if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>No</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Class</th>
					<th>D.O.B</th>
					<th>Status</th>
					<th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
					{{--*/ $i = 0 /*--}}
					@foreach ($students as $key => $student)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $student->first_name }}</td>
						<td>{{ $student->last_name }}</td>
						<td>{{ $student->email }}</td>
						<td>{{ $student->get_student->st_class}}</td>
						<td>{{ date("d/m/Y", strtotime($student->get_student->st_dob) )}}</td>
						<td>
							@if($student->status == 1)
								<span class="btn-xs btn-success">Active</a>
							@else
								<span class="btn-xs btn-danger">In-Active</a>
							@endif
						</td>
						<td>
							<!--<a class="btn btn-info" href="{{ route('admin.students.show',$student->id) }}">Show</a>-->
							<a class="btn btn-primary" href="{{ route('admin.students.edit',$student->id) }}">Edit</a>
							{!! Form::open(['method' => 'DELETE','route' => ['admin.students.destroy', $student->get_student->st_user_id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}

							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Class</th>
					<th>D.O.B</th>
					<th>Status</th>
					<th width="280px">Action</th>
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