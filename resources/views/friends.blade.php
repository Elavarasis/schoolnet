@extends('layouts.general')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			<div class="col-md-3">
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
						<img width="50px" src="{{ $image_path }}/{{$user->image}}" alt="" />
						{{ $user->first_name }} &nbsp; {{ $user->last_name }}
						<br>
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
				<input type="text" id="seach_non_friend" placeholder="search for names..">
				<div id="non_friends_list">
				@if($non_friends)
					@foreach($non_friends as $non_friend)
						<?php $friend_req = DB::table('friend_requests')
											->where('freq_user_id',$non_friend['id'])
											->where('freq_to_user_id',$user_id)
											->where('freq_status','pending')
											->first();
						?>
						<img width="50px" src="{{ $non_friend['img_url'] }}" alt="" />
						{{ $non_friend['first_name'] }} &nbsp; {{ $non_friend['last_name'] }}
						@if($friend_req)
							<a href="javascript:void(0)" class="accept_req" data-uid="{{ $non_friend['id'] }}" data-rid="{{ $friend_req->id }}">Add Friend</a>
						@else
							<a href="javascript:void(0)" class="send_req" data-uid="{{ $non_friend['id'] }}">Send Request</a>
						@endif
						<br>						
					@endforeach
				@endif
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
