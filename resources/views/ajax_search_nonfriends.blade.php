<?php
if($active_users){
	foreach($active_users as $user){
		$friend	= 	DB::table('friends')
					->where('frnd_user_id',$user_id)
					->where('frnd_friend_id',$user->id)
					->orWhere('frnd_friend_id',$user_id)
					->where('frnd_user_id',$user->id)
					->where('frnd_status',1)	
					->first();
			
		switch($user->role){
			case 'tenant' : $image_path = url('/').'/public/images/tenant/';
							break;
			case 'teacher' : $image_path = url('/').'/public/images/teacher/';
							break;
			case 'parent' : $image_path = url('/').'/public/images/parent/';
							break;
			case 'student' : $image_path = url('/').'/public/images/student/';
							break;
			default		: $image_path = '';
							break;
		}
		
		if(!$friend){
			echo '<div class="row"><div class="col-lg-2"><img width="124px" class="img-responsive" src="'.$image_path.'/'.$user->image.'" alt="" /></div>
					<div class="col-lg-8">
							<p class="sara">'.$user->first_name.' &nbsp; '.$user->last_name.'</p></div>';
			echo '<div class="col-lg-2 ">
								<a href="javascript:void(0)" class="send_req btn btn-success comment-overflow-e-s" style="color: white;" data-uid="'.$user->id.'">Send Request</a></div></div><hr>';
		}			
	}
}
?>