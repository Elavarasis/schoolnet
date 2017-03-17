@extends('layouts.tenant.form-general')

@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Event
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Add New Event</li>
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
					<a class="btn-sm btn-primary" href="{{ route('tenant.events.index') }}"> Back</a>
				</div>
				<h3 class="box-title">
					@if(isset($event))
						Edit Event
					@else
						Add New Event
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
            @if(isset($event))
				{!! Form::model($event, ['files'=> true, 'method' => 'PATCH','route' => ['tenant.events.update', $event->id]]) !!}
				{{--*/ $event->event_startDate = date("d/m/Y", strtotime($event->event_startDate) ) /*--}}
				{{--*/ $event->event_endDate = date("d/m/Y", strtotime($event->event_endDate) ) /*--}}
			@else
				{!! Form::open(array('files'=> true, 'route' => 'tenant.events.store','method'=>'POST')) !!}
			@endif
              <div class="box-body">
                <div class="form-group">
                  <label for=" ">Name <span>*</span></label>
                  {!! Form::text('event_name', null, array('placeholder' => 'Event Name','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Description</label>
				  {!! Form::textarea('event_description',null,['placeholder' => 'Event Description','class'=>'form-control', 'rows' => 5]) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Venue</label>
                  {!! Form::text('event_venue', null, array('placeholder' => 'Event Venue','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Start Date</label>
                  {!! Form::text('event_startDate', null, array('placeholder' => 'Event Start Date','class' => 'form-control','id' => 'start_date')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">End Date</label>
                  {!! Form::text('event_endDate', null, array('placeholder' => 'Event End Date','class' => 'form-control','id' => 'end_date')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Image</label>
				  @if(isset($event))
					<img width="100px" src="{{ URL::to('/') }}/public/images/event/medium--{{$event->cat_image}}" alt="" />
				  @endif
				  {!! Form::file('event_image', ['class' => 'form-control']) !!}
                </div>
				
				<div class="checkbox">
                  <label style="width:100px;">Status</label>
                  {!! Form::hidden('event_status', '0') !!} <!-- checkbox will pass this value when it's not checked -->
				  {!! Form::checkbox('event_status', '1', null, ['class' => 'form-control-block']) !!}
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