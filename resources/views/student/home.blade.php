@extends('layouts.admin.tabs')

@section('content')

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ URL::to('/') }}/public/images/student/{{$user->image}}" alt="Profile picture" width="100px;">

              <h3 class="profile-username text-center">{{ $user->first_name }} {{ $user->last_name }}</h3>

              <p class="text-muted text-center">{{ $user->st_class }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  {{ $user->address }}<br>
				  {{ $user->city_name }},
				  {{ $user->state_name }},
				  {{ $user->country_name }}		  
                </li>
				<li class="list-group-item">
                  <b>Class</b> <a class="pull-right">{{ $user->st_class }}</a>
                </li>
				<li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ $user->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right">{{ $user->st_contact_no }}</a>
                </li>
				<li class="list-group-item">
                  <b>D.O.B</b> <a class="pull-right">{{ date('d/m/Y',strtotime($user->dob)) }}</a>
                </li>
				<li class="list-group-item">
                  <b>How come you know : </b><p>{{ $user->st_hcyknow }}</p>
                </li>
				<li class="list-group-item">
                  <b>Profile Description : </b><p>{{ $user->st_description }}</p>
                </li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			  
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
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			  <li class="active"><a href="#editprofile" data-toggle="tab">Edit My Profile</a></li>
			  <li><a href="#changepass" data-toggle="tab">Change Password</a></li>
            </ul>
            <div class="tab-content">

              <div class="tab-pane active" id="editprofile">
				<!-- form start -->
				{!! Form::model($user, ['files'=> true, 'method' => 'post', 'url' => "stud/home/save_profile/"])!!}
				
				  {!! Form::hidden('id', (isset($user->id)) ? $user->id : null) !!}
				
				  {{--*/ $user->dob = date("d/m/Y", strtotime($user->dob) ) /*--}} <!-- change date format of DOB to d/m/Y -->
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
					  <label for=" ">Address</label>
					  {!! Form::textarea('address',null,['placeholder' => 'Adress','class'=>'form-control', 'rows' => 3]) !!}
					</div>
					
					<div class="form-group">
					  <label for=" ">City</label>
					  {!! Form::text('city', null, array('placeholder' => 'City','class' => 'form-control')) !!}
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
					  <label for=" ">Date of Birth</label>
					  {!! Form::text('dob', null, array('placeholder' => 'Date of Birth','class' => 'form-control dob')) !!}
					</div>  
					
					<div class="form-group">
					  <label for=" ">Contact Number</label>
					  {!! Form::text('st_contact_no', null, array('placeholder' => 'Contact Number','class' => 'form-control')) !!}
					</div>
					
					<div class="form-group">
					  <label for=" ">How come you know</label>
					  {!! Form::textarea('st_hcyknow',null,['placeholder' => 'How come you know','class'=>'form-control', 'rows' => 3]) !!}
					</div>
					
					<div class="form-group">
					  <label for=" ">Profile Description</label>
					  {!! Form::textarea('st_description',null,['placeholder' => 'Profile Description','class'=>'form-control', 'rows' => 6]) !!}
					</div>
					
					<div class="form-group">
					  <label for=" ">Profile Image</label>
					  @if(isset($student))
						<img width="100px" src="{{ URL::to('/') }}/public/images/student/{{$student->image}}" alt="" />
					  @endif
					  {!! Form::file('st_image', ['class' => 'form-control']) !!}
					</div>
					  {!! Form::hidden('st_user_id', null) !!}
					
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
			  
			  <div class="tab-pane" id="changepass">
				{!! Form::model($user, ['files'=> true, 'method' => 'post', 'url' => "stud/home/reset_password/"])!!}

				  <div class="box-body">
					<div class="form-group">
					  <label for=" ">New Password</label>
					  {!! Form::text('password', null, array('placeholder' => 'New Password','class' => 'form-control')) !!}
					</div>
					
					<div class="form-group">
					  <label for=" ">Confirm Password</label>
					  {!! Form::text('confirm_password', null, array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
					</div>
					{!! Form::hidden('user_id', null) !!}
				  </div>
				  <!-- /.box-body -->

				  <div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				  </div>
				{!! Form::close() !!}
			  </div>

			  
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

@endsection