<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School Network</title>
	
	
	<link rel="icon" href="{{url('/assets/frontend/imaes/favicon.png')}}" />
		
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sail&amp;subset=latin-ext" >
	<link rel="stylesheet" href="{{url('/assets/frontend/css/css/bootstrap.css')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{url('/assets/frontend/css/style.css')}}">
	<link rel="stylesheet" href="{{url('/assets/frontend/css/responsive.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
	
	
	<script src="http://code.jquery.com/jquery.js"></script>
<script src="{{url('/assets/frontend/src/skdslider.min.js')}}"></script>
<link href="{{url('/assets/frontend/src/skdslider.css')}}" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo2').skdslider({'delay':5000, 'animationSpeed': 1000,'showNextPrev':true,'showPlayButton':false,'autoSlide':true,'animationType':'sliding'});
			
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>

		
        <script src="{{url('/assets/frontend/js/popup.js')}}"></script>
        <script src="{{url('/assets/frontend/js/popup1.js')}}"></script>


<link rel="stylesheet" href="{{url('/assets/frontend/css/style1.css')}}">
<link rel="stylesheet" href="{{url('/assets/frontend/css/style5.css')}}">
<link rel="stylesheet" href="{{url('/assets/frontend/css/style6.css')}}">
<link rel="stylesheet" href="{{url('/assets/frontend/dev-style.css')}}">

 @yield('extra_header')


</head>
<body>
	
<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
			
					
				</div>
				
				<div class="col-md-4">
				
					<div class="home-signs">
						<ul>
							<li>

								<a class="home-sign-in" href="#"><p id="onclick">Sign up</p></a>
        
					</li>
		
		 <div id="contactdiv" class="top-up">
            <form class="form" action="#" id="contact">
                <img  src="{{url('/assets/frontend/images/close.png')}}" class="img sign-close" id="cancel"/>	
                
                
				<div class="sign-up-img">
					<img src="{{url('/assets/frontend/images/sign-in.png')}}">		<h3 class="sign-stud">Student / Tutor Register</h3>
				</div>
				
                
                <input class="just" type="text" id="name" placeholder=" Your Name"/>
                <br/>
               
                <input class="just"  type="text" id="email1" placeholder=" Your Email"/>
                <br/>
				
                <input class="just"  type="password" id="password1" placeholder="Create Password"/>
				<br/>
				
                <input class="just" type="password" id="password2" placeholder="Confirm Password"/>
				<br/>
               
                <input class="just" type="text" id="contactno" placeholder="Phone Number"/>
                <br/>
				<div class="checkbox checkbox-success">
                        <input id="checkbox3" type="checkbox">
                        <label for="checkbox3">
                           Remember Me
                        </label>
						
						   <input type="button" id="loginbtn" value="Sign Up"/>
						   
			
			
                    </div>
				
				
				
				<div class="sign-up-connect">
					<ul>
						<li><button class="but1" >Facebook</button></li>
						<li><button class="but2" >Twitter</button></li>
						<li><button class="but3" >Google +</button></li>
					</ul>
				</div>
				
             
            </form>
        </div>
						
					<li>
							<a class="home-sign-in" href="#"><p id="onclick1">Sign in</p></a>
					</li>
							
							
								 <div id="contactdiv1" class="top-up">
			{!! Form::open(array('method'=>'POST','id'=>'contact1','class'=>'form')) !!}
                <img  src="{{url('/assets/frontend/images/close.png')}}" class="img sign-close" id="cancel1"/>	               
                
				<div class="sign-up-img">
					<img src="{{url('/assets/frontend/images/sign-in.png')}}"><h3 class="sign-stud">Student / Tutor Login</h3>
				</div>
			
				{!! Form::email('email', null, array('placeholder' => 'Your Email','class' => 'form-control just', 'id' => 'email')) !!}
                <br/>
				
				{!! Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control just', 'id' => 'password' ) ) !!}
				<br/>
					<div class="checkbox checkbox-info sign-down">
                        <input id="checkbox4" type="checkbox"><label for="checkbox4">Remember Me</label>						
						 <a href="javascript:void(0)" class="do_login"><input type="button" id="loginbtn1" value="Login"/></a>
					</div><br><br>
				<span class="login_msg alert alert-danger" id="error" style="display:none;"></span>
				<span class="login_msg alert alert-success" id="success" style="display:none;"></span>
                    
				
               
				
				<p class="sign-forgot">Forgot password? click Here.</p>
			
				<div class="sign-up-connect">
					<ul>
						<li><button class="but1" >Facebook</button></li>
						<li><button class="but2" >Twitter</button></li>
						<li><button class="but3" >Google +</button></li>
					</ul>
				</div>
			 <br/>
				<p class="sign-hello"><a href="#">"HELLO! NEW HERE? CREATE An ACCOUNT</a></p>
				
            {!! Form::close() !!}
        </div>
							
						</ul>
						
					</div>
					
				</div>
				
				
				<div class="col-md-3">
					<div class="top-search">
						 <div id="custom-search-input">
								<div class="input-group col-md-12">
									<input type="text" class="  search-query form-control" placeholder="Search" />
									<span class="input-group-btn">
										<button class="btn sear btn-danger" type="button">
											<i class="fa fa-search"></i>
										</button>
									</span>
								</div>
							</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
	
	<div class="menu-section">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="logo">
						<a href="{{url('/')}}"><img src="{{url('/assets/frontend/images/logo.png')}}"></a>
					</div>
				</div>
			
				<div class="col-md-9">
					<div class="nav-bar">
						@if(isset(Auth::user()->id))
						<div class="bar">
								<ul>
									<li><a href="{{url('/')}}">Home</a></li>
									<li><a href="{{url('/profile')}}">Profile</a></li>
									<li><a href="#">Network</a></li>
									<li><a href="#">Learning</a></li>
									<li><a href="#">Payment</a></li>
								
								</ul>
								
						</div>
						@endif
						
						<div id="mySidenav" class="sidenav side-cick">
 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times-circle"></i></a>
  <a href="#"> <i class="fa fa-chevron-right mim"></i>Account Settings</a>
  <a href="#"> <i class="fa fa-chevron-right mim"></i>Notifications</a>
  <a href="#"> <i class="fa fa-chevron-right mim"></i>Message</a>
  <a href="#"> <i class="fa fa-chevron-right mim"></i>General Settings</a>
  @if(isset(Auth::user()->id))
  <a href="{{url('/logout')}}"> <i class="fa fa-chevron-right mim"></i>Logout</a>
  @endif
</div>

<span style="cursor:pointer" onclick="openNav()"><i class="fa fa-bars hyop"></i></span>
							</div>
					</div>
				</div>
				
			
		</div>
	</div>
	
    @yield('content')
	
		<section class="footer">
			<div class="container lifr">
				<div class="row">
					<div class="col-md-4">
						<div class="foot-links">
							<h5>QUICK LINK</h5>
						
						<ul>
	 
							 <li><i class="fa fa-caret-right"></i> <a href="{{url('/courses')}}"> Our Courses</a></li>
															  
							 <li><i class="fa fa-caret-right"></i> <a href="#"> News/Blog </a></li>
																
							 <li><i class="fa fa-caret-right"></i> <a href="#"> Event </a></li>
																
							 <li><i class="fa fa-caret-right"></i> <a href="#"> Privacy Policy </a></li>
																
							 <li><i class="fa fa-caret-right"></i> <a href="{{url('/help')}}"> Help </a></li>

							 <li><i class="fa fa-caret-right"></i> <a href="#"> Support </a></li>
												
							 <li><i class="fa fa-caret-right"></i> <a href="#"> Education </a></li>
							 
							  <li><i class="fa fa-caret-right"></i> <a href="#"> Teacher </a></li>
								@if(isset(Auth::user()->id))
								<li><i class="fa fa-caret-right"></i> <a href="{{url('/friends')}}"> Friends </a></li>
								@endif
						 </ul>
							
						</div>
					</div>
					
					<div class="col-md-4">
					
						<h5>CONTACT US</h5>
					
						<div class="foot-contact">
							
							<ul>
							
								<li>
								
								<i class="fa fa-envelope"></i>
								
								<p><a href="mailto:helpneed@edutech.com "> helpneed@edutech.com </a><p>
								
								</li>
								
								<li>
								
								<i class="fa fa-phone"></i>
								
								<p><a href="#">+8801712570051</a><p>
								
								</li>
								
								<li>
								
								<i class="fa fa-globe"></i>
								
								<p><a href="#">Edine rode, 1234 Plot/Rs, CA</a><p>
								
								</li>
							
							<ul>
					
					</div>
					
					</div>
					
					<div class="col-md-4">
					
					
                <h5>FEEDBACK</h5>
				<form action="" method="post">
					<input id="foot_name" type="text" class="inpTx" placeholder="Name">
					<input id="foot_email" type="Email" class="inpTx" placeholder="Email">
					<textarea id="foot_message" style="min-height:90px;" class="inpTx" placeholder="Message"></textarea>
					<input id="foot-send" type="submit" class="send-foot" value="SEND">
				</form>
          
					
					</div>
					
				</div>
			</div>
		</section>
		
		
		
		
		<section class="copy-foot">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<p> &copy; 2017 School network | Terms and Conditions | Privacy Policy <p>
					</div>
					
					<div class="col-md-5">
						
						<div class="foot-soc">
							<ul>
							
								<li><i class="fa fa-facebook"></i></li>
								<li><i class="fa fa-twitter"></i></li>
								<li><i class="fa fa-linkedin"></i></li>
								
							</ul>
						</div>
				
					</div>
					
				</div>
			</div>
		</section>
					
	<!-- JavaScripts -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
 
<script> 
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:1,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        pagination:true,
        navigation:false,
        navigationText:["",""],
        slideSpeed:1000,
        singleItem:true,
        autoPlay:true
    });
});
</script>
	
	

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3415878-12', 'dandywebsolution.com');
  ga('send', 'pageview');

</script>

	<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
@yield('extra_footer')
<script>
		$(document).ready(function(){		
			
			$(document).on('click','.do_login',function(e){
				var email		= $('#email').val();
				var password	= $('#password').val();
				var token 	= "{{ csrf_token() }}";
				var filter 	= /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
				url = '<?php echo url('/home/dologin'); ?>';
				data = {e:email, p:password};
				if(email == ''){
					$('#error').html( 'Please enter your email address' ).show();
				} else if (!filter.test(email)) {
					$('#error').html( 'Please enter valid email address' ).show();
				} else if(password == ''){
					$('#error').html( 'Please enter your password' ).show();
				} else {
					$.ajax({
						url: url,
						headers: {'X-CSRF-TOKEN': token},
						data: data,
						type: 'POST',
						datatype: 'JSON',
						success: function (response) {
							$('.login_msg').html('').hide();
							var res = $.parseJSON(response);
							if(res.status == 'error'){
								$('#error').html( res.message ).show();
							} else {
								$('#success').html( res.message ).show();
								setTimeout(
								  function() 
								  {
									location.reload();
								  }, 1000);
							}						
						}
					});
				}
			});
			
			$(document).on('keyup','.seach_non_friend',function(e){
				var key 		= $(this).val();
				var token = "{{ csrf_token() }}";
				url = '<?php echo url('/search_nonfriends'); ?>';
				data = {s:key};
				$.ajax({
					url: url,
					headers: {'X-CSRF-TOKEN': token},
					data: data,
					type: 'POST',
					success: function (response) {
						$('#fri_con').html(response);
					}
				});
			});
			
			$(document).on('click','.send_req',function(e){
				var freq_to_user_id	= $(this).data('uid');
				var $this	= $(this);
				var token = "{{ csrf_token() }}";
				url = '<?php echo url('/send_friend_req'); ?>';
				data = {r:freq_to_user_id};
				$.ajax({
					url: url,
					headers: {'X-CSRF-TOKEN': token},
					data: data,
					type: 'POST',
					success: function (response) {
						$this.html('Request sent');
					}
				});
			});
			
			$(document).on('click','.accept_req',function(e){
				var req_id			= $(this).data('rid');
				var freq_user_id	= $(this).data('uid');
				var $this	= $(this);
				var token = "{{ csrf_token() }}";
				url = '<?php echo url('/accept_friend_req'); ?>';
				data = {r:req_id, u:freq_user_id};
				$.ajax({
					url: url,
					headers: {'X-CSRF-TOKEN': token},
					data: data,
					type: 'POST',
					success: function (response) {
						$this.html('Friend Added');
					}
				});
			});
			
		});
	</script>
	
</body>
</html>
