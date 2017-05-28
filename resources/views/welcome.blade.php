@extends('layouts.frontend.app')

@section('content')
	
	<section class="first-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="slider">
					<div style="width:100%; margin:0 auto;">
							<ul id="demo2">
							<li>
							<img src="{{url('/assets/frontend/slides/1.jpg')}}" />
							<!--Slider Description example-->
							 <div class="slide-desc">
									<h2>Slider Title 1</h2>
									<p>Demo description here. Demo description here. Demo description here. Demo description here. Demo description here. <a class="more" href="#">more</a></p>
							  </div>
							</li>
							<li><img src="{{url('/assets/frontend/slides/2.jpg')}}" />
							   <div class="slide-desc">
									<h2>Slider Title 2</h2>
									<p>Demo description here. Demo description here. Demo description here. Demo description here. Demo description here. <a class="more" href="#">more</a></p>
							  </div>
							</li>
							<li><img src="{{url('/assets/frontend/slides/3.jpeg')}}" />
							<!--NO Description Here-->
							</li>
							<li><img src="{{url('/assets/frontend/slides/4.jpg')}}" />
							  <div class="slide-desc">
									<h2>Slider Title 4</h2>
									<p>Demo description here. Demo description here. Demo description here. Demo description here. Demo description here. <a class="more" href="#">more</a></p>
							  </div>
							</li>
							<li><img src="{{url('/assets/frontend/slides/5.jpg')}}" /></li>
							<li><img src="{{url('/assets/frontend/slides/6.jpg')}}" />
							  <div class="slide-desc">
									<h2>Slider Title 6</h2>
									<p>Demo description here. Demo description here. Demo description here. Demo description here. Demo description here. <a class="more" href="#">more</a></p>
							  </div>
							</li>
							</ul>
							</div>
					</div>
				</div>
				
				<div class="col-md-4">
				
				<div class="list-scroll">
				
					<div class="listen">
					
						<ul>
							<li>
								<div class="rock">
										<img src="{{url('/assets/frontend/images/img_01/a.jpg')}}">
								</div>
								<div class="mock">
										<h5>Giri</h5>
										<p>St. Marys School</p>
								</div>
								<div class="cock">
										<img src="{{url('/assets/frontend/images/award.png')}}">
								</div>
								<div class="dash"></div>
							</li>
						
							<li>
								<div class="rock">
										<img src="{{url('/assets/frontend/images/img_01/b.jpg')}}">
								</div>
								<div class="mock">
										<h5>Maria</h5>
										<p>Carmel School</p>
								</div>
								<div class="cock">
										<img src="{{url('/assets/frontend/images/award.png')}}">
								</div>
								<div class="dash"></div>
							</li>
							
							<li>
								<div class="rock">
										<img src="{{url('/assets/frontend/images/img_01/c.jpg')}}">
								</div>
								<div class="mock">
										<h5>Sara</h5>
										<p>CBSE School</p>
								</div>
								<div class="cock">
										<img src="{{url('/assets/frontend/images/award.png')}}">
								</div>
								<div class="dash"></div>
							</li>
							
							<li>
								<div class="rock">
										<img src="{{url('/assets/frontend/images/img_01/d.jpg')}}">
								</div>
								<div class="mock">
										<h5>Jameson</h5>
										<p>Christian School</p>
								</div>
								<div class="cock">
										<img src="{{url('/assets/frontend/images/award.png')}}">
								</div>
								<div class="dash"></div>
							</li>
							
							<li>
								<div class="rock">
										<img src="{{url('/assets/frontend/images/img_01/e.jpg')}}">
								</div>
								<div class="mock">
										<h5>Bisna</h5>
										<p>Akash School</p>
								</div>
								<div class="cock">
										<img src="{{url('/assets/frontend/images/award.png')}}">
								</div>
								<div class="dash"></div>
							</li>
							
							<li>
								<div class="rock">
										<img src="{{url('/assets/frontend/images/img_01/f.jpg')}}">
								</div>
								<div class="mock">
										<h5>John Doe</h5>
										<p>Nanjil School</p>
								</div>
								<div class="cock">
										<img src="{{url('/assets/frontend/images/award.png')}}">
								</div>
								<div class="dash"></div>
							</li>
							
						</ul>
				
				
				</div>
			
			</div>
		</div>
		
		</div>
		</div>
	</section>
	
	
	<section class="sec-section">
		<div class="container">
		<div class="row">

<div class="col-md-8">

<div class="slide-feat">
			 <h2>Featured Courses</h2>  
				
				 <div class="slide-line"></div>
				 
			</div>
    <header id="myCarousel" class="carousel slide">
    	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner" role="listbox">
			<div class="item active">
			  <div class="row">

            <div class="col-md-6">
			
               
					<div class="amazingcarousel-item-container">  
						  <span>$125</span>  
						  <div class="amazingcarousel-image"><img src="{{url('/assets/frontend/images/fc1.jpg')}}"  alt="Golden Wheat Field" /></div>  
						  <div class="amazingcarousel-title">English Grammar</div> <div class="slide-line"></div>  
						  <div class="amazingcarousel-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>      

						  <div class="slide-links">  
					  <ul>  
						  <li><i class="fa fa-thumbs-up"></i></li>  
						  <li><i class="fa fa-comments-o"></i></li>  
						  <li><i class="fa fa-share-alt"></i></li>  
					  </ul>  
				  </div>  

				  <div class="slide-view">  
					  <a href="{{url('/courses')}}">View More</a>  
				  </div>  

						  </div> 
				
            </div>
			
			
            <div class="col-md-6">
                 <div class="amazingcarousel-item-container">  
					  <span>$125</span>  
					  <div class="amazingcarousel-image"><img src="{{url('/assets/frontend/images/fc2.jpg')}}"  alt="Golden Wheat Field" /></div>  
					  <div class="amazingcarousel-title">Maths</div><div class="slide-line"></div>  
					  <div class="amazingcarousel-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>     

					  <div class="slide-links">  
					  <ul>  
						  <li><i class="fa fa-thumbs-up"></i></li>  
						  <li><i class="fa fa-comments-o"></i></li>  
						  <li><i class="fa fa-share-alt"></i></li>  
					  </ul>  
				  </div>  

				  <div class="slide-view">  
					  <a href="{{url('/courses')}}">View More</a>  
				  </div>  

					  </div> 
            </div>
         
        </div>
			</div>

			<div class="item">
			  <div class="row">
            <div class="col-md-6">
                <div class="amazingcarousel-item-container">  
					  <span>$125</span>  
					  <div class="amazingcarousel-image"><img src="{{url('/assets/frontend/images/fc3.jpg')}}"  alt="Golden Wheat Field" /></div>  
					  <div class="amazingcarousel-title">Physics</div><div class="slide-line"></div>  
					  <div class="amazingcarousel-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>        

					  <div class="slide-links">  
					  <ul>  
						  <li><i class="fa fa-thumbs-up"></i></li>  
						  <li><i class="fa fa-comments-o"></i></li>  
						  <li><i class="fa fa-share-alt"></i></li>  
					  </ul>  
				  </div>  

				  <div class="slide-view">  
					  <a href="{{url('/courses')}}">View More</a>  
				  </div>  

					  </div> 
            </div>
            
            <div class="col-md-6">
                <div class="amazingcarousel-item-container">  
					  <span>$125</span>  
						  <div class="amazingcarousel-image"><img src="{{url('/assets/frontend/images/fc4.jpg')}}"  alt="Golden Wheat Field" /></div>  
						  <div class="amazingcarousel-title">Botany</div><div class="slide-line"></div>  
						  <div class="amazingcarousel-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>     

						  <div class="slide-links">  
					  <ul>  
						  <li><i class="fa fa-thumbs-up"></i></li>  
						  <li><i class="fa fa-comments-o"></i></li>  
						  <li><i class="fa fa-share-alt"></i></li>  
					  </ul>  
				  </div>  

				  <div class="slide-view">  
					  <a href="{{url('/courses')}}">View More</a>  
				  </div>  

						  </div>  
            </div>
        </div>
			</div>
			
			<div class="item">
			  <div class="row">
            <div class="col-md-6">
               <div class="amazingcarousel-item-container">
						<span>$125</span>
					<div class="amazingcarousel-image"><img src="{{url('/assets/frontend/images/fc5.jpg')}}"  alt="Golden Wheat Field" /></div>
					<div class="amazingcarousel-title">Chemistry</div><div class="slide-line"></div>
					<div class="amazingcarousel-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div> 

					<div class="slide-links">
					<ul>
						<li><i class="fa fa-thumbs-up"></i></li>
						<li><i class="fa fa-comments-o"></i></li>
						<li><i class="fa fa-share-alt"></i></li>
					</ul>
				</div>

				<div class="slide-view">
					<a href="{{url('/courses')}}">View More</a>
				</div>

					</div>
            </div>
            
            <div class="col-md-6">
               	<div class="amazingcarousel-item-container">
					<span>$125</span>
				<div class="amazingcarousel-image"><img src="{{url('/assets/frontend/images/fc6.jpg')}}"  alt="Golden Wheat Field" /></div>
				<div class="amazingcarousel-title">Economics</div><div class="slide-line"></div>
				<div class="amazingcarousel-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>   

				<div class="slide-links">
					<ul>
						<li><i class="fa fa-thumbs-up"></i></li>
						<li><i class="fa fa-comments-o"></i></li>
						<li><i class="fa fa-share-alt"></i></li>
					</ul>
				</div>

				<div class="slide-view">
					<a href="{{url('/courses')}}">View More</a>
				</div>

				</div> 
            </div>
        </div>
			</div>
			
			<div class="item">
			  <div class="row">
            <div class="col-md-6">
                 <div class="amazingcarousel-item-container">
					 <span>$125</span>
					<div class="amazingcarousel-image"><img src="{{url('/assets/frontend/images/fc7.jpg')}}"  alt="Golden Wheat Field" /></div>
					<div class="amazingcarousel-title">Arabic</div><div class="slide-line"></div>
					<div class="amazingcarousel-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>    

				<div class="slide-links">
					<ul>
						<li><i class="fa fa-thumbs-up"></i></li>
						<li><i class="fa fa-comments-o"></i></li>
						<li><i class="fa fa-share-alt"></i></li>
					</ul>
				</div>

				<div class="slide-view">
					<a href="{{url('/courses')}}">View More</a>
				</div>

					</div>
            </div>
            
            <div class="col-md-6">
                 <div class="amazingcarousel-item-container">
					<span>$125</span>
				<div class="amazingcarousel-image"><img src="{{url('/assets/frontend/images/fc8.jpg')}}"  alt="Golden Wheat Field" /></div>
				<div class="amazingcarousel-title">Grammar</div><div class="slide-line"></div>
				<div class="amazingcarousel-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div> 
				
				<div class="slide-links">
					<ul>
						<li><i class="fa fa-thumbs-up"></i></li>
						<li><i class="fa fa-comments-o"></i></li>
						<li><i class="fa fa-share-alt"></i></li>
					</ul>
				</div>

				<div class="slide-view">
					<a href="{{url('/courses')}}">View More</a>
				</div>
				
				</div>
            </div>
        </div>
			</div>
			
			<div class="item">
			  <div class="row">
            <div class="col-md-6">
                <div class="amazingcarousel-item-container">
					<span>$125</span>
						<div class="amazingcarousel-image"><img src="{{url('/assets/frontend/images/fc5.jpg')}}"  alt="Golden Wheat Field" /></div>
						<div class="amazingcarousel-title">Geography</div><div class="slide-line"></div>
						<div class="amazingcarousel-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>  

						<div class="slide-links">
					<ul>
						<li><i class="fa fa-thumbs-up"></i></li>
						<li><i class="fa fa-comments-o"></i></li>
						<li><i class="fa fa-share-alt"></i></li>
					</ul>
				</div>

				<div class="slide-view">
					<a href="{{url('/courses')}}">View More</a>
				</div>
						
						</div>
            </div>
            
            <div class="col-md-6">
                <div class="amazingcarousel-item-container">  
					  <span>$125</span>  
						  <div class="amazingcarousel-image"><img src="{{url('/assets/frontend/images/fc4.jpg')}}"  alt="Golden Wheat Field" /></div>  
						  <div class="amazingcarousel-title">Botany</div><div class="slide-line"></div>  
						  <div class="amazingcarousel-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>     

						  <div class="slide-links">  
					  <ul>  
						  <li><i class="fa fa-thumbs-up"></i></li>  
						  <li><i class="fa fa-comments-o"></i></li>  
						  <li><i class="fa fa-share-alt"></i></li>  
					  </ul>  
				  </div>  

				  <div class="slide-view">  
					  <a href="{{url('/courses')}}">View More</a>  
				  </div>  

						  </div>  
            </div>
        </div>
			</div>


		  </div>


		  <a class="left  adiy" href="#myCarousel" role="button" data-slide="prev">
			<span  aria-hidden="true"><i class="fa fa-chevron-circle-left"></i>
</span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span  aria-hidden="true"><i class="fa fa-chevron-circle-right"></i>
</span>
			<span class="sr-only">Next</span>
		  </a>
	</div>
    </header>

</div>
					

				<div class="col-md-4">
					
					<div class="add-start">
					
						<div class="ads">
							<img src="{{url('/assets/frontend/images/ads1.jpg')}}">
						</div>
						
						<div class="ads">
							<img src="{{url('/assets/frontend/images/ads2.jpg')}}">
						</div>
						
						<div class="ads">
							<img src="{{url('/assets/frontend/images/ads3.jpg')}}">
						</div>
			
					</div>
			
				</div>
				
				</div>
			</div>
		</section>
		
		
		
		<section class="third-section" id="courses">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
					
					<h3>All Courses</h3>
					
					<div class="lines"></div>
					
						<div class="all-course">
							
							<div class="all-course-1">
							
								<ul>
							
									<li>
									
									<p><i class="fa fa-graduation-cap"></i><a href="{{url('/courses')}}"> English Grammer </a></p>
									
									</li>
									
									<li>
									
									<p><i class="fa fa-graduation-cap"></i><a href="{{url('/courses')}}"> Maths </a></p>
									
									</li>
									
									<li>
									
									<p><i class="fa fa-graduation-cap"></i><a href="{{url('/courses')}}"> Physics </a></p>
									
									</li>
									
									<li>
									
									<p><i class="fa fa-graduation-cap"></i><a href="{{url('/courses')}}"> Chemistry </a></p>
									
									</li>
									
									<li>
									
									<p><i class="fa fa-graduation-cap"></i><a href="{{url('/courses')}}"> Botany </a></p>
									
									</li>
									
									<li>
									
									<p><i class="fa fa-graduation-cap"></i><a href="{{url('/courses')}}"> Zoology </a></p>
									
									</li>
									
									<li>
									
									<p><i class="fa fa-graduation-cap"></i><a href="{{url('/courses')}}"> Civics </a></p>
									
									</li>
							
								</ul>
							
							</div>
							
							<div class="all-course-2">
							
								<ul>
							
									<li>
									
									<p><i class="fa fa-graduation-cap"></i><a href="{{url('/courses')}}"> History </a></p>
									
									</li>
									
									<li>
									
									<p><i class="fa fa-graduation-cap"></i><a href="{{url('/courses')}}"> Geography </a></p>
									
									</li>
									
									<li>
									
									<p><i class="fa fa-graduation-cap"></i><a href="{{url('/courses')}}"> Accountancy </a></p>
									
									</li>
									
									<li>
									
									<p><i class="fa fa-graduation-cap"></i><a href="{{url('/courses')}}"> Economics </a></p>
									
									</li>
									
									<li>
									
									<p><i class="fa fa-graduation-cap"></i> Arabic </p>
									
									</li>
									
									<li>
									
									<p><i class="fa fa-graduation-cap"></i> Academic English </p>
									
									</li>
									
									<li>
									
									<p><i class="fa fa-graduation-cap"></i> Grammar </p>
									
									</li>
							
								</ul>
								
								<div class="view-more">
								<a href="#">VIEW MORE</a>
							</div>
							
							</div>
					
						
			
						</div>
						
					</div>
					
					<div class="col-md-4">
					
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
		
		</section>
		
		
		<section class="fourth-section test-mon">
	
		
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					<h3>Testmonial</h3>
					
					<div class="lines"></div>
					
					</div>
				</div>
			
			</div>
		
		</section>
		
				<section class="fifth-section">
					
					<div class="container">
    
            <div id="testimonial-slider" class="owl-carousel">
                <div class="testimonial">
                    <div class="pic">
                        <img src="{{url('/assets/frontend/images/img-1.jpg')}}" alt="">
                    </div>
					 <h3 class="testimonial-title"> Williamson</h3>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu dolor eget ante pretium commodo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean purus sem, aliquam eget lorem at, efficitur mattis risus. Morbi efficitur molestie cursus. Etiam eget sodales lorem. Proin volutpat lectus at pulvinar consectetur. Aliquam erat volutpat. Sed.
                    </p>
                   
                </div>
 
                <div class="testimonial">
                    <div class="pic">
                        <img src="{{url('/assets/frontend/images/img_01/1a.jpg')}}">
                    </div>
					<h3 class="testimonial-title">kristian</h3>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu dolor eget ante pretium commodo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean purus sem, aliquam eget lorem at, efficitur mattis risus. Morbi efficitur molestie cursus. Etiam eget sodales lorem. Proin volutpat lectus at pulvinar consectetur. Aliquam erat volutpat. Sed.
                    </p>
                 
                </div>
				
				<div class="testimonial">
                    <div class="pic">
                         <img src="{{url('/assets/frontend/images/img_01/1b.jpg')}}">
                    </div>
					<h3 class="testimonial-title"> Merin</h3>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu dolor eget ante pretium commodo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean purus sem, aliquam eget lorem at, efficitur mattis risus. Morbi efficitur molestie cursus. Etiam eget sodales lorem. Proin volutpat lectus at pulvinar consectetur. Aliquam erat volutpat. Sed.
                    </p>
                    
                </div>
            </div>
        </div>

						
					
					</div>
				</div>
			</div>
		</section>
				
				
				
					
	

@endsection
