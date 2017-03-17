@extends('layouts.tenant.datatable')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Events
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
					<a class="btn btn-success" href="{{ route('tenant.events.create') }}">Add New</a>
				</div>
				<h3 class="box-title">List of all Events</h3>
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
					<th>Event</th>
					<th>Venue</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Image</th>
					<th>Status</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
					{{--*/ $i = 0 /*--}}
					@foreach ($events as $key => $event)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $event->event_name }}</td>
						<td>{{ $event->event_venue }}</td>
						<td>{{ $event->event_startDate }}</td>
						<td>{{ $event->event_endDate }}</td>
						<td>
							@if(isset($event->event_image))
								<img width="50px" src="{{ URL::to('/') }}/public/images/event/small--{{$event->event_image}}" alt="" />
							@endif
						</td>
						<td>
							@if($event->event_status == 1)
								<span class="btn-xs btn-success">Active</a>
							@else
								<span class="btn-xs btn-danger">In-Active</a>
							@endif
						</td>
						<td>
							<a class="btn btn-primary" href="{{ route('tenant.events.edit',$event->id) }}">Edit</a>
							{!! Form::open(['method' => 'DELETE','route' => ['tenant.events.destroy', $event->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}

							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Event</th>
					<th>Venue</th>
					<th>Start Date</th>
					<th>End Date</th>
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