@extends('layouts.admin.datatable')

@section('content')
	
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Leaves
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
					<a class="btn btn-success" href="{{ route('stud.leaves.create') }}">Apply Leave</a>
				</div>
				<h3 class="box-title">List of all Leaves</h3>
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
					<th>Student ID</th>
					<th>Name</th>
					<th>Total Days/Hours</th>
					<th>From (d-m-Y)</th>
					<th>To (d-m-Y)</th>
					<th>Status</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
					{{--*/ $i = 0 /*--}}
					@foreach ($leaves as $key => $leave)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $leave->lv_user_id }}</td>
						<td>{{ $leave->user->first_name }} {{ $leave->user->last_name }}</td>
						<td>{{ $leave->lv_totaldays }}</td>
						<td>{{ date('d-m-Y',strtotime($leave->lv_start_date)) }} {{ $leave->lv_start_time }}</td>
						<td>{{ date('d-m-Y',strtotime($leave->lv_end_date)) }} {{ $leave->lv_end_time }}</td>
						<td>
							@if($leave->lv_status == 0)
								<span class="btn-xs btn-warning">Pending</a>
							@elseif($leave->lv_status == 1)
								<span class="btn-xs btn-success">Approved</a>
							@else
								<span class="btn-xs btn-danger">Rejected</a>
							@endif
						</td>
						<td>
							<a class="btn btn-info" href="{{ route('stud.leaves.show',$leave->id) }}">Show</a>
							
							@if($leave->lv_status == 0)
								<a class="btn btn-primary" href="{{ route('stud.leaves.edit',$leave->id) }}">Edit</a>
							@endif
							
							{!! Form::open(['method' => 'DELETE','route' => ['stud.leaves.destroy', $leave->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}

							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Student ID</th>
					<th>Name</th>
					<th>Total Days/Hours</th>
					<th>From (d-m-Y)</th>
					<th>To (d-m-Y)</th>
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