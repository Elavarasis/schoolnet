<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School Network</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    School Network
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
	
	
	
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
