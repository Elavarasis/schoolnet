@extends('layouts.frontend.app')
@section('extra_header')
<link rel="stylesheet" href="{{url('/assets/frontend/css/style3.css')}}">
@endsection
@section('content')

<div class="container sunm-cont">
	<div class="row well">
		<div class="col-md-3 scroll-a-h">
		<?php $non_friends = array(); ?>
			@if($active_users)
				@foreach($active_users as $user)
					<?php 
					$friend	= 	DB::table('friends')
								->where('frnd_user_id',$user_id)
								->where('frnd_friend_id',$user->id)
								->orWhere('frnd_friend_id',$user_id)
								->where('frnd_user_id',$user->id)
								->where('frnd_status',1)
								->first();
					
					switch($user->role){
						case 'tenant' : $image_path = URL::to('/').'/public/images/tenant/';
										break;
						case 'teacher' : $image_path = URL::to('/').'/public/images/teacher/';
										break;
						case 'parent' : $image_path = URL::to('/').'/public/images/parent/';
										break;
						case 'student' : $image_path = URL::to('/').'/public/images/student/';
										break;
						default		: $image_path = '';
										break;
					}
					?>
					@if($friend)
						<div class="comment-de">
							<figure><img alt="" src="{{ $image_path }}/{{$user->image}}"></figure>
							<div class="comment-overflow comment-overflow-e">
								<h5>{{ $user->first_name }} &nbsp; {{ $user->last_name }}</h5>
							</div>
						</div>
					@else
						<?php
							$non_friends[]	=	array(
												'id' => $user->id,
												'first_name' => $user->first_name,
												'last_name' => $user->last_name,
												'img_url' => $image_path.'/'.$user->image,
												);
						?>
					@endif
				@endforeach
			@endif
		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12 well">
					<input type="text" id="myInput" class="seach_non_friend" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
				</div>
			</div>
					
					<div id="non_friends_list">
						@if($non_friends)
							@foreach($non_friends as $non_friend)
							<div class="row ">
								<?php 
								$received_req = DB::table('friend_requests')
												->where('freq_user_id',$non_friend['id'])
												->where('freq_to_user_id',$user_id)
												->where('freq_status','pending')
												->first();
												
								$sent_req 	= DB::table('friend_requests')
												->where('freq_user_id',$user_id)
												->where('freq_to_user_id',$non_friend['id'])
												->where('freq_status','pending')
												->first();
								?>
								<div class="col-lg-2"><img width="124px" class="img-responsive" src="{{ $non_friend['img_url'] }}" alt="" /></div>
								<div class="col-lg-8">
									<p class="sara">{{ $non_friend['first_name'] }} &nbsp; {{ $non_friend['last_name'] }}
									</p>
								</div>
								@if($received_req)
									<div class="col-lg-2 ">
										<a href="javascript:void(0)" class="accept_req btn btn-success comment-overflow-e-s" style="color: white;" data-uid="{{ $non_friend['id'] }}" data-rid="{{ $received_req->id }}">Add Friend</a>
									</div>
								@elseif($sent_req)
									<div class="col-lg-2 ">
										<a href="javascript:void(0)" class="btn btn-warning comment-overflow-e-s" style="color: white;">Request sent</a>
									</div>
								@else
									<div class="col-lg-2 ">
										<a href="javascript:void(0)" class="send_req btn btn-success comment-overflow-e-s" style="color: white;" data-uid="{{ $non_friend['id'] }}">Send Request</a>
									</div>
								@endif
							</div>
								<hr>						
							@endforeach
						@endif
				</div>
		</div>
	</div>
</div>
@endsection
