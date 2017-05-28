@extends('layouts.frontend.app')
@section('extra_header')
<link rel="stylesheet" href="{{url('/assets/frontend/css/style3.css')}}">
@endsection
@section('content')

		<div class="container help-mp">
<div class="row ">
<div class="col-md-3 ">
<ul class="listing-ada">
					<li><img src="{{url('/assets/frontend/images/img_01/1395826613845.png')}}"class="img-responsive"></li><li>Topics</li>
					<ul class="virg">
					<p><i class="fa fa-check-circle circle-a"></i> <a href="#">Set Clear Rules</a></p>
					<p><i class="fa fa-check-circle circle-a"></i><a href="#"> Talk to Your Children</a></p>
					<p><i class="fa fa-check-circle circle-a"></i> <a href="#">Know the Warning Signs</a></p>
					<p><i class="fa fa-check-circle circle-a"></i> <a href="#">Limits for Your Children</a></p>
					</ul>
					</ul>
					<img src="{{url('/assets/frontend/images/img_01/add_1.jpg')}}"class="img-responsive">
</div>
<div class="col-md-6">
<div class="col-help">
			<h3><i class="fa fa-question-circle"></i> Set Clear Rules</h3>
			</div>
			<ul class="fa-chat">
			<li><i class="fa fa-info-circle fa-chat-true"></i><p class="wider-em"> being prepared to answer questions that your child asks about school. If you need help with making the book, ask a member of your support team</p></li>
			<li> <i class="fa fa-info-circle fa-chat-true"></i><p class="wider-em"> Children may also benefit from looking at published books about starting school. Click here for a list of useful books and resources</p></li>
			<li><i class="fa fa-info-circle fa-chat-true"></i><p class="wider-em">At school your child will need to be able to do what the teacher asks, follow rules, and interact appropriately with both adults and other children.</p></li>
			<li><i class="fa fa-info-circle fa-chat-true"></i><p class="wider-em"> One of the most effective ways to encourage positive behaviour is by rewarding that behaviour. This is known as “positive reinforcement”. By rewarding desired behaviour it is more likely to happen again.</p></li>
			<li><i class="fa fa-info-circle fa-chat-true"></i><p class="wider-em"> Challenging behaviour is usually a way that children try to tell us something (e.g. seeking attention, requesting or avoiding something). </p></li>
			<li> <i class="fa fa-info-circle fa-chat-true"></i><p class="wider-em"> Children may also benefit from looking at published books about starting school. Click here for a list of useful books and resources</p></li>
			
			</ul>
			

</div>
<div class="col-md-3">
<a type="button" class="btn btn-success dpo"style="    color: white;">SENT MESSAGE</a>
					<a type="button" class="btn btn-success opo"style="    color: white;">ONLINE CHAT</a>
					
					<div class="">
					<img src="{{url('/assets/frontend/images/img_01/add_4.jpg')}}"class="img-responsive">
					</div>

</div>
</div>		
</div>		
				

@endsection
