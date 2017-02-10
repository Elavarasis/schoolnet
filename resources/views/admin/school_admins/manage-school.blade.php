@extends('layouts.admin.form-general')

@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        School Details
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
					<a class="btn-sm btn-primary" href="{{ route('admin.school_admins.index') }}"> Back</a>
				</div>
				<h3 class="box-title">
					School Details
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
            @if(isset($school))
				{!! Form::model($school, ['files'=> true, 'method' => 'post', 'url' => "admin/school_admins/save_school/"])!!}
			@else
				{!! Form::open(array('files'=> true, 'url' => 'admin/school_admins/save_school/', 'method' => 'post')) !!}
			@endif
				
				<!-- school id in hidden field -->
				{!! Form::hidden('id', (isset($school->id)) ? $school->id : null) !!}
				
				<!-- admin id in hidden field -->
				{!! Form::hidden('admin_id', $admin_id) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for=" ">School Name</label>
                  {!! Form::text('schl_name', null, array('placeholder' => 'School Name','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Country</label>
                  {!! Form::select('schl_country_id', $countries, null, array('class' => 'form-control', 'id' => 'country_id')) !!}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">State</label>
                  {!! Form::select('schl_state_id', $states, null, array('class' => 'form-control', 'id' => 'state_id')) !!}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  {!! Form::select('schl_city_id', $cities, null, array('class' => 'form-control', 'id' => 'city_id')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Address</label>
				  {!! Form::textarea('schl_address',null,['placeholder' => 'School Adress','class'=>'form-control', 'rows' => 3]) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Contact Number</label>
                  {!! Form::text('schl_contact_no', null, array('placeholder' => 'Contact Number','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Email</label>
                  {!! Form::email('schl_email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
                
				<div class="form-group">
                  <label for=" ">School Level</label>
                  {!! Form::text('schl_level', null, array('placeholder' => 'School Level','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Features</label>
				  {!! Form::textarea('schl_features',null,['placeholder' => 'School Features','class'=>'form-control', 'rows' => 8]) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Logo</label>
				  @if(isset($school))
					<img width="100px" src="{{ URL::to('/') }}/public/images/school/{{$school->schl_logo}}" alt="" />
				  @endif
				  {!! Form::file('schl_logo', ['class' => 'form-control']) !!}
                </div>  
				
				<div class="checkbox">
                  <label style="width:100px;">Status</label>
                  {!! Form::hidden('schl_status', '0') !!} <!-- checkbox will pass this value when it's not checked -->
				  {!! Form::checkbox('schl_status', '1', null, ['class' => 'form-control-block']) !!}
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