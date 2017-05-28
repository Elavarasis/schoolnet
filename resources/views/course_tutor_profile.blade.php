@extends('layouts.frontend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			@if($user)
				<img width="50px" src="{{ URL::to('/') }}/public/images/teacher/{{$user->image}}" alt="" />
				<p>{{ $user->first_name }} {{ $user->last_name }}</p>
			@endif
        </div>
    </div>
</div>
@endsection
