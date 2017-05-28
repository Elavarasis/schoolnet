@extends('layouts.frontend.app')
@section('extra_header')
<link rel="stylesheet" href="{{url('/assets/frontend/css/style3.css')}}">
<link rel="stylesheet" href="{{url('/assets/frontend/css/style4.css')}}">

<link href="{{url('/assets/frontend/css/slide.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('/assets/frontend/css/mixed.css')}}" rel="stylesheet" type="text/css">
	
<link href="{{url('/assets/frontend/css/last.css')}}" rel="stylesheet" type="text/css">	

<link rel="stylesheet"  href="{{url('/assets/frontend/src/css/lightslider.css')}}"/>
 <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{url('/assets/frontend/src/js/lightslider.js')}}"></script> 
    <script>
    	 $(document).ready(function() {
			$("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
		});
    </script>



<link rel="stylesheet" href="{{url('/assets/frontend/css/style1.css')}}">
<link rel="stylesheet" href="{{url('/assets/frontend/css/style5.css')}}">

<script type="text/javascript">
$(document).ready(function(){
  var currentPosition = 0;
  var slideWidth = 560;
  var slides = $('.slide');
  var numberOfSlides = slides.length;


  $('#slidesContainer').css('overflow', 'hidden');


  slides
    .wrapAll('<div id="slideInner"></div>')

	.css({
      'float' : 'left',
      'width' : slideWidth
    });


  $('#slideInner').css('width', slideWidth * numberOfSlides);


  $('#slideshow')
    .prepend('<span class="control" id="leftControl">Clicking moves left</span>')
    .append('<span class="control" id="rightControl">Clicking moves right</span>');


  manageControls(currentPosition);


  $('.control')
    .bind('click', function(){

	currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
    

    manageControls(currentPosition);
 
    $('#slideInner').animate({
      'marginLeft' : slideWidth*(-currentPosition)
    });
  });


  function manageControls(position){
   
	if(position==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
	
    if(position==numberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show() }
  }	
});
</script>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Study',     8],
          ['Eat',      2],
          ['Commute',  3],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          pieHole: 0.2,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
@endsection
@section('content')

		<section class="first-section no-ger">
		<div class="container">
			<div class="row">
			<div class="col-md-3">
				<div class="side-course">
					<ul>
						
						<li><img src="{{url('/assets/frontend/images/c-1.png')}}"><a href="{{url('/courses')}}">Courses</a> <i class="fa fa-angle-double-right"></i></li>
						<li><img src="{{url('/assets/frontend/images/c-2.png')}}"><a href="">Opportunity</a> <i class="fa fa-angle-double-right"></i></li>
						<li><img src="{{url('/assets/frontend/images/c-3.png')}}"><a href="#">Teacher</a> <i class="fa fa-angle-double-right"></i></li>
						<li><img src="{{url('/assets/frontend/images/c-4.png')}}"><a href="#">Education</a> <i class="fa fa-angle-double-right"></i></li>
						<li><img src="{{url('/assets/frontend/images/c-5.png')}}"><a href="{{url('/help')}}">Help</a><i class="fa fa-angle-double-right"></i></li>
						<li><img src="{{url('/assets/frontend/images/c-6.png')}}"><a href="#">Support</a> <i class="fa fa-angle-double-right"></i></li>
						<li><img src="{{url('/assets/frontend/images/c-7.png')}}"><a href="#">Groups</a> <i class="fa fa-angle-double-right"></i></li>
						<li><img src="{{url('/assets/frontend/images/c-8.png')}}"><a href="#">Parents</a> <i class="fa fa-angle-double-right"></i></li>
					</ul>
					
					</div>
					
					
					<div class="adv-1">
						<img src="{{url('/assets/frontend/images/ads1.jpg')}}">
					</div>
					
				</div>
			
			
				<div class="col-md-6">
				
				<div class="demo">
        <div class="item">            
            <div class="clearfix" style="max-width:100%;">
                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-1.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-1.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-2.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-2.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-3.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-3.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-4.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-4.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-5.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-5.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-6.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-6.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-7.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-7.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-8.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-8.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-9.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-9.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-10.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-10.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-11.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-11.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-12.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-12.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-13.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-13.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-14.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-14.jpg')}}" />
                         </li>
                    <li data-thumb="{{url('/assets/frontend/img/thumb/cS-15.jpg')}}"> 
                        <img src="{{url('/assets/frontend/img/cS-15.jpg')}}" />
                         </li>
                </ul>
            </div>
        </div>


    </div>	
	
				<div class="status-update">
				
					<textarea row="30" class="stat-mind" type="text" placeholder="on your mind...."></textarea>
					
					<div class="stat-date">
						
						<div class="stat-date1">
								<ul>
									<li>
									<button>Post</button>
									<button>View</button>
									</li>
								</ul>
						</div>
						
						<div class="stat-date2">
								<button>Share</button>
						</div>
					
					</div>				
					
				</div>
				
				<div class="land">
				
					<div class="land1">
					
					  <img src="{{url('/assets/frontend/images/img_01/a.jpg')}}">
					
					</div>
					
					<div class="land2">
					
						<h5>Giri</h5>
						<p>St. Marys School</p>
						
					
					</div>
					
					<div class="land3">
					
						<h5>landers</h5>
						<p>Open source teams of people, and work.</p>
					
					</div>
				
				</div>
				
				<div class="land">
				
					<div class="land1">
					
					<img src="{{url('/assets/frontend/images/teac.jpg')}}">
					
					</div>
					
					<div class="land2">
					
						<h5>Malar</h5>
						<p>Maths Teacher</p>
						
					
					</div>
					
					<div class="land3">
					
						<h5>landers</h5>
						<p>Open source teams of people, and work.</p>
					
					</div>
				
				</div>
				
				<div class="fors-img">
					<ul>
						<li>
							<img src="{{url('/assets/frontend/images/teac.jpg')}}">
							<p>Teacher</p>
						</li>
						<li>
							<img src="{{url('/assets/frontend/images/boy.png')}}">
							<p>Tutor</p>
						</li>
						<li>
							  <img src="{{url('/assets/frontend/images/img_01/a.jpg')}}">
							<p>Student</p>
						</li>
						<li>
							<img src="{{url('/assets/frontend/images/mom.jpg')}}">
							<p>Parent</p>
						</li>
					</ul>
				</div>
				
			</div>
				
				<div class="col-md-3">
			
			
			<div class="land-scroll">
			
				<ul>
				
					<li>
						
						<div class="kraft1">
							  <img src="{{url('/assets/frontend/images/img_01/a.jpg')}}">
						</div>
						<div class="kraft2">
							<h5>Giri</h5>
							<p>St. Marys School</p>
						</div>
						<div class="kraft3">
							<img src="{{url('/assets/frontend/images/award.png')}}">
						</div>
						<div class="dashes"></div>
					
					</li>
					
						<li>
						
						<div class="kraft1">
							  <img src="{{url('/assets/frontend/images/img_01/b.jpg')}}">
						</div>
						<div class="kraft2">
							<h5>Maria</h5>
							<p>Carmel School</p>
						</div>
						<div class="kraft3">
							<img src="{{url('/assets/frontend/images/award.png')}}">
						</div>
						<div class="dashes"></div>
					
					</li>
					
						<li>
						
						<div class="kraft1">
							  <img src="{{url('/assets/frontend/images/img_01/c.jpg')}}">
						</div>
						<div class="kraft2">
							<h5>Sara</h5>
							<p>CBSE School</p>
						</div>
						<div class="kraft3">
							<img src="{{url('/assets/frontend/images/award.png')}}">
						</div>
						<div class="dashes"></div>
					
					</li>
					
						<li>
						
						<div class="kraft1">
						  <img src="{{url('/assets/frontend/images/img_01/d.jpg')}}">
						</div>
						<div class="kraft2">
							<h5>Jameson</h5>
							<p>Bosco School</p>
						</div>
						<div class="kraft3">
							<img src="{{url('/assets/frontend/images/award.png')}}">
						</div>
						<div class="dashes"></div>
					
					</li>
					
						<li>
						
						<div class="kraft1">
							  <img src="{{url('/assets/frontend/images/img_01/e.jpg')}}">
						</div>
						<div class="kraft2">
							<h5>Bisna</h5>
							<p>Primary School</p>
						</div>
						<div class="kraft3">
							<img src="{{url('/assets/frontend/images/award.png')}}">
						</div>
						<div class="dashes"></div>
					
					</li>
					
						<li>
						
						<div class="kraft1">
							  <img src="{{url('/assets/frontend/images/img_01/f.jpg')}}">
						</div>
						<div class="kraft2">
							<h5>John Doe</h5>
							<p>A.P.J School</p>
						</div>
						<div class="kraft3">
							<img src="{{url('/assets/frontend/images/award.png')}}">
						</div>
						<div class="dashes"></div>
					
					</li>
					
						<li>
						
						<div class="kraft1">
							  <img src="{{url('/assets/frontend/images/img_01/g.jpg')}}">
						</div>
						<div class="kraft2">
							<h5>Dona</h5>
							<p>Akash School</p>
						</div>
						<div class="kraft3">
							<img src="{{url('/assets/frontend/images/award.png')}}">
						</div>
						<div class="dashes"></div>
					
					</li>
					
						<li>
						
						<div class="kraft1">
							  <img src="{{url('/assets/frontend/images/img_01/h.jpg')}}">
						</div>
						<div class="kraft2">
							<h5>John Doe</h5>
							<p>Nanjil School</p>
						</div>
						<div class="kraft3">
							<img src="{{url('/assets/frontend/images/award.png')}}">
						</div>
						<div class="dashes"></div>
					
					</li>
							
				</ul>	
			
			
		</div>
		
				<div class="foot-side">
				
				<h5>THE SCHOOL NETWORK</h5>
				
				<div class="down-line"></div>
					
					<ul>
						
						<li><a href="#"><i class="fa fa-long-arrow-right"></i> About Us</a></li>
						<li><a href="#"><i class="fa fa-long-arrow-right"></i> Terms & Conditions</a></li>
						<li><a href="#"><i class="fa fa-long-arrow-right"></i> Privacy Policy</a></li>
						<li><a href="#"><i class="fa fa-long-arrow-right"></i> Contact Us</a></li>
						<li><a href="#"><i class="fa fa-long-arrow-right"></i> Feedback</a></li>
						
					</ul>
		
		
				</div>	
		
		</div>
		
		</div>
		</div>
	</section>
	
	
	<section class="sec-section">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
				
				
				
					  <div id="testimonial-slider" class="owl-carousel left-test">
                <div class="testimonial">
                    <div class="pic">
                        <img src="{{url('/assets/frontend/images/img-1.jpg')}}" alt="">
                    </div>
					 <h3 class="testimonial-title"> Williamson</h3>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu dolor eget ante pretium commodo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </p>
                   
                </div>
 
                <div class="testimonial">
                    <div class="pic">
                          <img src="{{url('/assets/frontend/images/img_01/1a.jpg')}}">
                    </div>
					<h3 class="testimonial-title">kristian</h3>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu dolor eget ante pretium commodo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                    </p>
                 
                </div>
				
				<div class="testimonial">
                    <div class="pic">
                         <img src="{{url('/assets/frontend/images/img_01/1b.jpg')}}">
                    </div>
					<h3 class="testimonial-title"> Merin</h3>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu dolor eget ante pretium commodo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </p>
                    
                </div>
            </div>
				
				
				
				
				
				
				<div class="parent-ass">
					
					<h5>Parent Association</h5>
					
					<div class="down-line"></div>
					
					  <img src="{{url('/assets/frontend/images/img_01/a.jpg')}}">
					  <img src="{{url('/assets/frontend/images/img_01/b.jpg')}}">
					  <img src="{{url('/assets/frontend/images/img_01/c.jpg')}}">
					  <img src="{{url('/assets/frontend/images/img_01/d.jpg')}}">
					  <img src="{{url('/assets/frontend/images/img_01/e.jpg')}}">
					  <img src="{{url('/assets/frontend/images/img_01/f.jpg')}}">
					
					
					<button>Group</button> <button>Add</button>
				</div>
				
				</div>
				
				<div class="col-md-6">
				
	
  <!-- Slideshow HTML -->
  <div id="slideshow">
    <div id="slidesContainer">
      <div class="slide">
			<div class="slide-1">
				<img src="{{url('/assets/frontend/images/fc1.jpg')}}">
			</div>
			
			<div class="slide-2">
				<ul>
					<li><a href="{{url('/courses')}}"><button>View More</button></a></li>
					<li><a href="#"><button>Like</button></a></li>
					<li><a href="#"><button>Comment</button></a></li>
					<li><a href="#"><button>Share</button></a></li>
			</div>
			
      </div>
      <div class="slide">
			<div class="slide-1">
				<img src="{{url('/assets/frontend/images/fc2.jpg')}}">
			</div>
			
			<div class="slide-2">
				<ul>
					<li><a href="{{url('/courses')}}"><button>View More</button></a></li>
					<li><a href="#"><button>Like</button></a></li>
					<li><a href="#"><button>Comment</button></a></li>
					<li><a href="#"><button>Share</button></a></li>
			</div>
			
      </div>
	  
	   <div class="slide">
			<div class="slide-1">
				<img src="{{url('/assets/frontend/images/fc3.jpg')}}">
			</div>
			
			<div class="slide-2">
				<ul>
					<li><a href="{{url('/courses')}}"><button>View More</button></a></li>
					<li><a href="#"><button>Like</button></a></li>
					<li><a href="#"><button>Comment</button></a></li>
					<li><a href="#"><button>Share</button></a></li>
			</div>
			
      </div>
	  
	   <div class="slide">
			<div class="slide-1">
				<img src="{{url('/assets/frontend/images/fc4.jpg')}}">
			</div>
			
			<div class="slide-2">
				<ul>
					<li><a href="{{url('/courses')}}"><button>View More</button></a></li>
					<li><a href="#"><button>Like</button></a></li>
					<li><a href="#"><button>Comment</button></a></li>
					<li><a href="#"><button>Share</button></a></li>
			</div>
			
      </div>
	  
	   <div class="slide">
			<div class="slide-1">
				<img src="{{url('/assets/frontend/images/fc5.jpg')}}">
			</div>
			
			<div class="slide-2">
				<ul>
					<li><a href="{{url('/courses')}}"><button>View More</button></a></li>
					<li><a href="#"><button>Like</button></a></li>
					<li><a href="#"><button>Comment</button></a></li>
					<li><a href="#"><button>Share</button></a></li>
			</div>
			
      </div>
	  
	   <div class="slide">
			<div class="slide-1">
				<img src="{{url('/assets/frontend/images/fc6.jpg')}}">
			</div>
			
			<div class="slide-2">
				<ul>
					<li><a href="{{url('/courses')}}"><button>View More</button></a></li>
					<li><a href="#"><button>Like</button></a></li>
					<li><a href="#"><button>Comment</button></a></li>
					<li><a href="#"><button>Share</button></a></li>
			</div>
			
      </div>
	  
	   <div class="slide">
			<div class="slide-1">
				<img src="{{url('/assets/frontend/images/fc7.jpg')}}">
			</div>
			
			<div class="slide-2">
				<ul>
					<li><a href="{{url('/courses')}}"><button>View More</button></a></li>
					<li><a href="#"><button>Like</button></a></li>
					<li><a href="#"><button>Comment</button></a></li>
					<li><a href="#"><button>Share</button></a></li>
			</div>
			
      </div>
	  
	   <div class="slide">
			<div class="slide-1">
				<img src="{{url('/assets/frontend/images/fc8.jpg')}}">
			</div>
			
			<div class="slide-2">
				<ul>
					<li><a href="{{url('/courses')}}"><button>View More</button></a></li>
					<li><a href="#"><button>Like</button></a></li>
					<li><a href="#"><button>Comment</button></a></li>
					<li><a href="#"><button>Share</button></a></li>
			</div>
			
      </div>
	  
	   <div class="slide">
			<div class="slide-1">
				<img src="{{url('/assets/frontend/images/fc9.jpg')}}">
			</div>
			
			<div class="slide-2">
				<ul>
					<li><a href="{{url('/courses')}}"><button>View More</button></a></li>
					<li><a href="#"><button>Like</button></a></li>
					<li><a href="#"><button>Comment</button></a></li>
					<li><a href="#"><button>Share</button></a></li>
			</div>
			
      </div>

    </div>
  </div>


				<div class="clearfix"></div>
				
				<div class="land">
				
					<div class="land1">
					
					  <img src="{{url('/assets/frontend/images/img_01/a.jpg')}}">
					
					</div>
					
					<div class="land2">
					
						<h5>Giri</h5>
						<p>St. Marys School</p>
						
					
					</div>
					
					<div class="land3">
					
						<h5>landers</h5>
						<p>Open source teams of people, and work.</p>
					
					</div>
				
				</div>
				
				<div class="land">
				
					<div class="land1">
					
					<img src="{{url('/assets/frontend/images/teac.jpg')}}">
					
					</div>
					
					<div class="land2">
					
						<h5>Malar</h5>
						<p>Maths Teacher</p>
						
					
					</div>
					
					<div class="land3">
					
						<h5>landers</h5>
						<p>Open source teams of people, and work.</p>
					
					</div>
				
				</div>
				
				<div class="clearfix"></div>

<div id="mixedSlider">
                    <div class="MS-content">
						
						<div class="ms-head">
							<h4>Courses Online</h4>
						</div>
						
						<div class="down-line"></div>
					
                        <div class="item">
                            <div class="imgTitle">
                                
                                <img src="{{url('/assets/frontend/images/fc1.jpg')}}" alt="" />
                            </div>
                           
                           
                        </div>
                        <div class="item">
                            <div class="imgTitle">
                                
                                <img src="{{url('/assets/frontend/images/fc2.jpg')}}" alt="" />
                            </div>
                       
                           
                        </div>
                        <div class="item">
                            <div class="imgTitle">
                                
                                <img src="{{url('/assets/frontend/images/fc3.jpg')}}" alt="" />
                            </div>
                        
                           
                        </div>
                        <div class="item">
                            <div class="imgTitle">
                             
                                <img src="{{url('/assets/frontend/images/fc4.jpg')}}" alt="" />
                            </div>
                           
                           
                        </div>
						
                        <div class="item">
                            <div class="imgTitle">
                                
                                <img src="{{url('/assets/frontend/images/fc5.jpg')}}" alt="" />
                            </div>
                           
                          
                        </div>
						
						<div class="item">
                            <div class="imgTitle">
                                
                                <img src="{{url('/assets/frontend/images/fc6.jpg')}}" alt="" />
                            </div>
                           
                          
                        </div>
						
						<div class="item">
                            <div class="imgTitle">
                                
                                <img src="{{url('/assets/frontend/images/fc7.jpg')}}" alt="" />
                            </div>
                           
                          
                        </div>
						
						<div class="item">
                            <div class="imgTitle">
                                
                                <img src="{{url('/assets/frontend/images/fc8.jpg')}}" alt="" />
                            </div>
                           
                          
                        </div>
						
						
						
						
                    </div>
					
					<div class="fbs">
							<ul>
								<li><button>Like</button></li>
								<li><button>Comment</button></li>
								<li><button>Share</button></li>
							</ul>
						</div>
                    <div class="MS-controls">
                        <button class="MS-left"><i class="fa fa-angle-left"></i></button>
                        <button class="MS-right"><i class="fa fa-angle-right"></i></button>
                    </div>
                </div>
			
			
				<div class="temp-add">
					<img src="{{url('/assets/frontend/images/ads2.jpg')}}">
			
				</div>
			
				</div>
				
				<div class="col-md-3">
				
				<div class="pie-chart">
					
					<div id="donutchart" style="width: 100%; height: 170px;"></div>
					
				</div>
					
					<div class="add-start ajus">
					
						<div class="ads">
							<img src="{{url('/assets/frontend/images/ads2.jpg')}}">
						</div>
					
			
					</div>
					
					<div class="articles">
					
						<h3>Our Articles</h3>
						
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
			</div>
		</section>

@endsection
@section('extra_footer')

<script src="{{url('/assets/frontend/js/multislider.js')}}"></script> 
<script>
$('#basicSlider').multislider({
			continuous: true,
			duration: 2000
		});
		$('#mixedSlider').multislider({
			duration: 750,
			interval: 3000
		});
</script>


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
@endsection