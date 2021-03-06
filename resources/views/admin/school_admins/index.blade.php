@extends('layouts.admin.datatable')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage School Admins
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
					<a class="btn btn-success" href="{{ route('admin.school_admins.create') }}">Add New</a>
				</div>
				<h3 class="box-title">List of all School Admins</h3>
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
					<!--<th>Photo</th>-->
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>designation</th>
					<th>dob</th>
					<th>status</th>
					<th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
					{{--*/ $i = 0 /*--}}
					@foreach ($school_admins as $key => $school_admin)
					<tr>
						<td>{{ ++$i }}</td>
						<!--<td><img width="50px" src="{{ URL::to('/') }}/public/images/{{$school_admin->get_school_admin->image}}" alt="" /></td>-->
						<td>{{ $school_admin->first_name }}</td>
						<td>{{ $school_admin->last_name }}</td>
						<td>{{ $school_admin->email }}</td>
						<td>{{ $school_admin->get_school_admin->designation}}</td>
						<td>{{ date("d/m/Y", strtotime($school_admin->get_school_admin->dob) )}}</td>
						<td>
							@if($school_admin->status == 1)
								<span class="btn-xs btn-success">Active</a>
							@else
								<span class="btn-xs btn-danger">In-Active</a>
							@endif
						</td>
						<td>
							<a class="btn btn-info" href="{{url('admin/school_admins/school/'.$school_admin->id.'/')}}">Manage School</a>
							<a class="btn btn-info" href="{{ route('admin.school_admins.show',$school_admin->id) }}">Show</a>
							<a class="btn btn-primary" href="{{ route('admin.school_admins.edit',$school_admin->id) }}">Edit</a>
							{!! Form::open(['method' => 'DELETE','route' => ['admin.school_admins.destroy', $school_admin->get_school_admin->user_id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}

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
					<th>designation</th>
					<th>dob</th>
					<th>status</th>
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