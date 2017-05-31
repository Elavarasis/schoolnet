@extends('layouts.frontend.app')
@section('extra_header')
<link rel="stylesheet" href="{{url('/assets/frontend/css/style3.css')}}">
<link rel="stylesheet" href="{{url('/assets/frontend/css/style4.css')}}">

@endsection
@section('content')

	<div class="container cl-padding">
		<div class="row ">
			<div class="col-md-9">
				
				<div class="profile_outer">
					{!! Form::model($user, ['files'=> true, 'method' => 'post', 'url' => "profile/doupdate/"])!!}
					<div class="progress_outer" style="width:100%; height:18px; border:1px solid #1BBC9B;">
						<?php
						$total_sections 	= 3;
						$current_section	= 1;
						$width 				= $current_section / $total_sections * 100;
						?>
						<div class="progress_bar" style="width:<?=$width?>%; height:12px; background:#4ceaca none repeat scroll 0 0; margin:2px;"></div>
					</div>
					
					<div class="profile_inner" id="section_1">
						
						<div class="form-group">
						  <label for=" ">First Name</label>
						  {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
						</div>
						
						<div class="form-group">
						  <label for=" ">Last Name</label>
						  {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
						</div>
						
						<div class="form-group">
						  <label for=" ">Date of Birth</label>
						  {!! Form::text('dob', null, array('placeholder' => 'Date of Birth','class' => 'form-control dob')) !!}
						</div>  
						
						<div class="form-group">
						  <label for=" ">Contact Number</label>
						  {!! Form::text('nu_contact_no', null, array('placeholder' => 'Contact Number','class' => 'form-control')) !!}
						</div>
				
						<a href="javascript:void(0)" class="goto btn-small btn-primary" data-id="2">Next</a>
					</div>
					
					
					<div class="profile_inner" id="section_2" style="display:none;">
						
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
						
						<a href="javascript:void(0)" class="goto btn-small btn-primary" data-id="1">Prev</a>
						<a href="javascript:void(0)" class="goto btn-small btn-primary" data-id="3">Next</a>
					</div>
					
					<div class="profile_inner" id="section_3" style="display:none;">
					
						<div class="form-group">
						  <label for=" ">How come you know</label>
						  {!! Form::textarea('nu_hcyknow',null,['placeholder' => 'How come you know','class'=>'form-control', 'rows' => 3]) !!}
						</div>
						
						<div class="form-group">
						  <label for=" ">Profile Description</label>
						  {!! Form::textarea('nu_description',null,['placeholder' => 'Profile Description','class'=>'form-control', 'rows' => 6]) !!}
						</div>
						
						<div class="form-group">
						  <label for=" ">Profile Image</label>
						  @if(isset($normal_user))
							<img width="100px" src="{{ URL::to('/') }}/public/images/normal_user/{{$normal_user->image}}" alt="" />
						  @endif
						  {!! Form::file('nu_image', ['class' => 'form-control']) !!}
						</div>
						  {!! Form::hidden('nu_user_id', null) !!}
						<a href="javascript:void(0)" class="goto btn-small btn-primary" data-id="2">Prev</a>
						<button type="submit" class="btn-small btn-success">Submit</button>
					</div>
					{!! Form::close() !!}
				</div>				
				
			</div>
		</div>
	</div>

@endsection
@section('extra_footer')
<script src="{{url('/assets/frontend/js/jquery.flexslider.js')}}"></script> 
<script src="{{url('/assets/frontend/js/helper-plugins.js')}}"></script> 
<script src="{{url('/assets/frontend/js/init.js')}}"></script> 

<div class="clearfix"></div>
@endsection