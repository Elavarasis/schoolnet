@extends('layouts.frontend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			@if($alltutors)
				@foreach($alltutors as $tutor)
					<p>{{ $tutor->get_user->first_name }} {{ $tutor->get_user->last_name }}</p>
					<a href="{{ url('/courses/tutor') }}/{{ $tutor->ct_user_id }}">View Profile</a>
				@endforeach
			@endif
        </div>
    </div>
</div>
@endsection
