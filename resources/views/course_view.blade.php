@extends('layouts.general')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			<div class="col-md-3">
			@if($allcourses)
				@foreach($allcourses as $course)
					<img width="50px" src="{{ URL::to('/') }}/public/images/course/{{$course->course_image}}" alt="" />
					{{ $course->course_title }}
					<a href="{{ url('/courses/view') }}/{{ $course->id }}">View</a>
				@endforeach
			@endif
			</div>
			
			<div class="col-md-9">
			@if($single)
				<img width="50px" src="{{ URL::to('/') }}/public/images/course/{{$single->course_image}}" alt="" />
				<h3>{{ $single->course_title }}</h3>
				<p>{{ $single->course_short_desc }}</p>
				<p>{{ $single->course_description }}</p>
				<iframe width="420" height="315" src="{{ $single->course_video_url }}"></iframe> 
				<a href="{{ url('/courses/tutors') }}/{{ $single->id }}">View Tutors</a>
			@endif
			</div>
        </div>
    </div>
</div>
@endsection
