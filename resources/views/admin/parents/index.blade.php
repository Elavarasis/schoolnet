@extends('layouts.admin.datatable')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Parents
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
					<a class="btn btn-success" href="{{ route('admin.parents.create') }}">Add New</a>
				</div>
				<h3 class="box-title">List of all Parents</h3>
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
					<th>D.O.B</th>
					<th>Status</th>
					<th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
					{{--*/ $i = 0 /*--}}
					@foreach ($parents as $key => $parent)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $parent->first_name }}</td>
						<td>{{ $parent->last_name }}</td>
						<td>{{ $parent->email }}</td>
						<td>{{ date("d/m/Y", strtotime($parent->get_parent->pa_dob) )}}</td>
						<td>
							@if($parent->status == 1)
								<span class="btn-xs btn-success">Active</a>
							@else
								<span class="btn-xs btn-danger">In-Active</a>
							@endif
						</td>
						<td>
							<!--<a class="btn btn-info" href="{{ route('admin.parents.show',$parent->id) }}">Show</a>-->
							<a class="btn btn-primary" href="{{ route('admin.parents.edit',$parent->id) }}">Edit</a>
							{!! Form::open(['method' => 'DELETE','route' => ['admin.parents.destroy', $parent->get_parent->pa_user_id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}

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