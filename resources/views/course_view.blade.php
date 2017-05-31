@extends('layouts.frontend.app')
@section('extra_header')
<link rel="stylesheet" href="{{url('/assets/frontend/css/style3.css')}}">
<link rel="stylesheet" href="{{url('/assets/frontend/css/style4.css')}}">

@endsection
@section('content')

	<div class="container cl-padding">
		<div class="row ">
		<div class="col-md-3 scroll-a">
			@if($allcourses)
				@foreach($allcourses as $course)
					<div class="comment-de">
						<figure><img alt="" src="{{ URL::to('/') }}/public/images/course/{{$course->course_image}}" class="img-responsive"></figure>
						<div class="comment-overflow">
							<h5>{{ $course->course_title }}</h5>
							<p>&nbsp;<!-- category --></p>
							<a href="{{ url('/courses/view') }}/{{ $course->id }}" type="button" class="btn btn-success">View</a>
						</div>
					</div>
				@endforeach
			@endif
		</div>
		<div class="col-md-9">
		<div class="row">
			@if($single)
				<div class="col-lg-4 ">
					<div class="cource-d">
						<img src="{{ URL::to('/') }}/public/images/course/{{$single->course_image}}" class="img-responsive" style="width:270px; height: 100%;">
					</div>
				</div>
				<div class="col-lg-4 ">
					<div class="">
						<p>&nbsp;</p>
						<strong>{{ $single->course_title }}</strong>
						<p>{{ $single->course_short_desc }}</p>
					</div>				
				</div>
				<div class="col-lg-4 ">
				 <iframe width="280" height="100%" src="{{ $single->course_video_url }}"></iframe>
				</div>
				<div class="row">
					<div class="col-md-12 ">
						<div class="cource-e">
							<p>{{ $single->course_description }}</p>
						</div>
						<div class="cource-f">
							<a type="button" class="btn btn-success">APPLY EXAM</a>
							<a type="button" href="{{ url('/courses/tutors') }}/{{ $single->id }}" class="btn btn-success">VIEW TUTORS</a>
						</div>
					</div>
				</div>
			@endif
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