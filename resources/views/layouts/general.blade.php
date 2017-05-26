<!DOCTYPE html>
<html>
	<head>
	<!-- title -->
	<title>School Network</title>
	<!-- end title -->
	<!-- meta tags -->
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{url('/assets/images')}}//favicon.png" />
		
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sail&amp;subset=latin-ext" >
	{!! Html::style('assets/css/css/bootstrap.css') !!}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	{!! Html::style('assets/css/style.css') !!}
	{!! Html::style('assets/css/responsive.css') !!}
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
	
	
	<script src="http://code.jquery.com/jquery.js"></script>
	{!! Html::script('assets/src/skdslider.min.js'); !!}
	{!! Html::script('assets/src/skdslider.css'); !!}
	<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('#demo2').skdslider({'delay':5000, 'animationSpeed': 1000,'showNextPrev':true,'showPlayButton':false,'autoSlide':true,'animationType':'sliding'});
				
				jQuery('#responsive').change(function(){
				  $('#responsive_wrapper').width(jQuery(this).val());
				});
				
			});
	</script>

	{!! Html::script('assets/js/popup.js'); !!}
	{!! Html::script('assets/js/popup1.js'); !!}

	{!! Html::style('assets/wp-content/themes/twentyeleven/style.css') !!}
	{!! Html::style('assets/css/style1.css') !!}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
	{!! Html::script('assets/wp-content/uploads/amazingcarousel/sharedengine/amazingcarousel62ea.js?ver=1.2'); !!}
	{!! Html::script('assets/wp-content/plugins/google-captcha/js/scriptfe9d.js?ver=4.7.3'); !!}
	{!! Html::script('assets/wp-content/plugins/wonderplugin-lightbox/engine/wonderpluginlightboxd5f7.js?ver=2.0'); !!}

	
	<!-- end styles -->

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
                <img  src="{{url('/assets/images')}}//close.png" class="img sign-close" id="cancel"/>	
                
                
				<div class="sign-up-img">
					<img src="{{url('/assets/images')}}//sign-in.png">		<h3 class="sign-stud">Student / Tutor Register</h3>
				</div>
				
                
                <input class="just" type="text" id="name" placeholder=" Your Name"/>
                <br/>
               
                <input class="just"  type="text" id="email" placeholder=" Your Email"/>
                <br/>
				
                <input class="just"  type="password" id="password" placeholder="Create Password"/>
				<br/>
				
                <input class="just" type="password" id="password" placeholder="Confirm Password"/>
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
            <form class="form" action="#" id="contact1">
                <img  src="{{url('/assets/images')}}//close.png" class="img sign-close" id="cancel1"/>	
                
                
				<div class="sign-up-img">
					<img src="{{url('/assets/images')}}//sign-in.png"><h3 class="sign-stud">Student / Tutor Login</h3>
				</div>
			
                <input class="just"  type="text" id="email" placeholder=" Your Email"/>
                <br/>
				
                <input class="just"  type="password" id="password" placeholder="Password"/>
				<br/>
			
					
					<div class="checkbox checkbox-info sign-down">
                        <input id="checkbox4" type="checkbox">
                        <label for="checkbox4">
                          Remember Me
                        </label>
						
						 <a href="profile.html"><input type="button" id="loginbtn1" value="Login"/></a>
                    </div>
				
               
				
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
				
            </form>
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
						<a href="index.html"><img src="{{url('/assets/images')}}//logo.png"></a>
					</div>
				</div>
			
				<div class="col-md-9">
					<div class="nav-bar">
														<div id="mySidenav" class="sidenav side-cick">
 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times-circle"></i></a>
  <a href="#"> <i class="fa fa-chevron-right mim"></i>Account Settings</a>
  <a href="#"> <i class="fa fa-chevron-right mim"></i>Notifications</a>
  <a href="#"> <i class="fa fa-chevron-right mim"></i>Message</a>
  <a href="#"> <i class="fa fa-chevron-right mim"></i>General Settings</a>
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
	 
							 <li><i class="fa fa-caret-right"></i> <a href="#"> Our Courses</a></li>
															  
							 <li><i class="fa fa-caret-right"></i> <a href="#"> News/Blog </a></li>
																
							 <li><i class="fa fa-caret-right"></i> <a href="#"> Event </a></li>
																
							 <li><i class="fa fa-caret-right"></i> <a href="#"> Privacy Policy </a></li>
																
							 <li><i class="fa fa-caret-right"></i> <a href="#"> Help </a></li>

							 <li><i class="fa fa-caret-right"></i> <a href="#"> Support </a></li>
												
							 <li><i class="fa fa-caret-right"></i> <a href="#"> Education </a></li>
							 
							  <li><i class="fa fa-caret-right"></i> <a href="#"> Teacher </a></li>

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
	{!! Html::script('assets/wp-content/uploads/amazingcarousel/7/carouselengine/initcarousel.js'); !!}
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
			
			$(document).on('keyup','#seach_non_friend',function(e){
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
						$('#non_friends_list').html(response);
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
