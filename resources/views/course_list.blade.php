@extends('layouts.frontend.app')
@section('extra_header')
<link rel="stylesheet" href="{{url('/assets/frontend/css/style3.css')}}">
<link rel="stylesheet" href="{{url('/assets/frontend/css/style4.css')}}">

@endsection
@section('content')

		<section class="cource-a">
			<div class="container">
				<div class="row">
				
					<div class="col-md-3">
					
					<div class="scroll-g">
						@if($allcourses)
							@foreach($allcourses as $course)
								<div class="comment-de">
									<figure><img alt="" src="{{ URL::to('/') }}/public/images/course/{{$course->course_image}}" class="img-responsive"></figure>
									<div class="comment-overflow">
										<h5>{{ $course->course_title }}</h5>
										<p>&nbsp;<!-- category --></p>
										<a href="{{ url('/courses/view') }}/{{ $course->id }}" type="button" class="btn btn-success">View</a>
									</div>
								</div>
							@endforeach
						@endif					
					</div>
						
					<div class="g-add">
						<img src="{{url('/assets/frontend/images/ads1.jpg')}}" style="width:100%;height:280px;">
					</div>

					</div>							

		
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
		
				<div class="single-property">
             
              <div class="property-slider">
                <div id="property-images" class="flexslider img-pro"style="">
                  <ul class="slides item-img">
					@if($allcourses)
						@foreach($allcourses as $course)
							<li class="item "> <img src="{{ URL::to('/') }}/public/images/course/{{$course->course_image}}" alt="">
								<h1>{{ $course->course_title }}</h1>
								<p>{{ $course->course_short_desc }}</p>

								<h5 class="cate">&nbsp;<!-- Category : Education--></h5>

								<button class="comment-overflow_a"><a href="{{ url('/courses/view') }}/{{ $course->id }}">View</a></button>
							</li>
						@endforeach
					@endif
                  </ul>
                </div><h1 class="img-pro-feat">  Featured courses<h1>
                <div id="property-thumbs" class="flexslider">
                  <ul class="slides">
					@if($featured_courses)
						@foreach($featured_courses as $featured)
							<li class="item"> 
								<a href="{{ url('/courses/view') }}/{{ $featured->id }}">
									<img src="{{ URL::to('/') }}/public/images/course/{{$featured->course_image}}" alt=""> 
								</a>
							</li>
						@endforeach
					@endif
                  </ul>
                </div>
              </div>
              
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
            </div>
					</div>	
					<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
					
					<div ><img src="{{url('/assets/frontend/images/img_01/add_2.jpg')}}" class="" alt=""> </div>
					
					
						<h3 class="fincs">Our Articles</h3>
						
						<div class="lines"></div>
					
						<div class="our-article">
						
								<span>10 Nov</span>
								
							<img src="{{url('/assets/frontend/images/art.jpg')}}">
							
							<span></span>
						
						</div>
						
						<div class="art-para">
						
							<h5>Our Articles</h5>
							
							<p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						
						</div>

				
			
					</div>	
				

					
	
				</div>
			
			</div>
		
		</section>

@endsection
@section('extra_footer')
<script src="{{url('/assets/frontend/js/jquery.flexslider.js')}}"></script> 
<script src="{{url('/assets/frontend/js/helper-plugins.js')}}"></script> 
<script src="{{url('/assets/frontend/js/init.js')}}"></script> 

<div class="clearfix"></div>
@endsection