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
				<h3 class="box-title">
					@if(isset($city))
						Edit City
					@else
						Add New City
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
            @if(isset($city))
				{!! Form::model($city, ['method' => 'PATCH','route' => ['admin.cities.update', $city->id]]) !!}
			@else
				{!! Form::open(array('route' => 'admin.cities.store','method'=>'POST')) !!}
			@endif
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">City Name</label>
                  {!! Form::text('city_name', null, array('placeholder' => 'City Name','class' => 'form-control')) !!}
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Country</label>
                  {!! Form::select('country_id', $countries, null, array('class' => 'form-control', 'id' => 'country_id')) !!}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">State</label>
                  {!! Form::select('state_id', $states, null, array('class' => 'form-control', 'id' => 'state_id')) !!}
                </div>
				
				<div class="checkbox">
                  <label style="width:100px;">Status</label>
                  {!! Form::hidden('status', '0') !!} <!-- checkbox will pass this value when it's not checked -->
				  {!! Form::checkbox('status', '1', null, ['class' => 'form-control-block']) !!}
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