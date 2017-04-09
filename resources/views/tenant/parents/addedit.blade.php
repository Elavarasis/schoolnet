@extends('layouts.tenant.form-general')

@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Parent
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Add New Parent</li>
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
					<a class="btn-sm btn-primary" href="{{ route('tenant.parents.index') }}"> Back</a>
				</div>
				<h3 class="box-title">
					@if(isset($parent))
						Edit parent
					@else
						Add New parent
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
            @if(isset($parent))
				{!! Form::model($parent, ['files'=> true, 'method' => 'PATCH','route' => ['tenant.parents.update', $parent->id]]) !!}
			
				{{--*/ $parent->dob = date("d/m/Y", strtotime($parent->dob) ) /*--}} <!-- change date format of DOB to d/m/Y -->
			@else
				{!! Form::open(array('files'=> true, 'route' => 'tenant.parents.store','method'=>'POST')) !!}
			@endif
              <div class="box-body">
                <div class="form-group">
                  <label for=" ">First Name</label>
                  {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Last Name</label>
                  {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Mother's First Name</label>
                  {!! Form::text('pa_mother_fname', null, array('placeholder' => "Mother's First Name",'class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Mother's Last Name</label>
                  {!! Form::text('pa_mother_lname', null, array('placeholder' => "Mother's Last Name",'class' => 'form-control')) !!}
                </div>             

				@if(!isset($parent))
				<div class="form-group">
                  <label for=" ">Email</label>
                  {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Password</label>
                  {!! Form::text('password', null, array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
				@endif
				
				<!--<div class="form-group">
                  <label for="exampleInputEmail1">School</label>
                  {!! Form::select('pa_school_id', $schools, null, array('class' => 'form-control', 'id' => 'school_id')) !!}
                </div>-->
				
				<div class="form-group">
                  <label for=" ">Address</label>
				  {!! Form::textarea('address',null,['placeholder' => 'Adress','class'=>'form-control', 'rows' => 3]) !!}
                </div>
							
				<div class="form-group">
                  <label for="exampleInputEmail1">Country</label>
                  {!! Form::select('country_id', $countries, null, array('class' => 'form-control', 'id' => 'country_id')) !!}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">State</label>
                  {!! Form::select('state_id', $states, null, array('class' => 'form-control', 'id' => 'state_id')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">City</label>
                  {!! Form::select('city', $cities, null, array('class' => 'form-control', 'id' => 'city_id')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Date of Birth</label>
                  {!! Form::text('dob', null, array('placeholder' => 'Date of Birth','class' => 'form-control dob')) !!}
                </div>  
				
				<div class="form-group">
                  <label for=" ">Are you Guardian?&nbsp;&nbsp;</label>
						{!! Form::hidden('pa_guardian', '0') !!} <!-- checkbox will pass this value when it's not checked -->
						{!! Form::checkbox('pa_guardian', '1', null, ['class' => 'form-control-block']) !!}
				</div>
				
				<div class="form-group">
                  <label for=" ">Contact Number</label>
                  {!! Form::text('pa_contact_no', null, array('placeholder' => 'Contact Number','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">How come you know</label>
				  {!! Form::textarea('pa_hcyknow',null,['placeholder' => 'How come you know','class'=>'form-control', 'rows' => 3]) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Profile Description</label>
				  {!! Form::textarea('pa_description',null,['placeholder' => 'Profile Description','class'=>'form-control', 'rows' => 6]) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Profile Image</label>
				  @if(isset($parent))
					<img width="100px" src="{{ URL::to('/') }}/public/images/parent/{{$parent->image}}" alt="" />
				  @endif
				  {!! Form::file('pa_image', ['class' => 'form-control']) !!}
                </div>
                  {!! Form::hidden('pa_user_id', null) !!}
				
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