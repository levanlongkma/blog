
@extends('layouts.index')

@section('contact')
	<section class="tada-container content-posts page post-right-sidebar">


	    	<!-- CONTENT -->
	    	<div class="content col-xs-8">
	        
	        
	        	<!-- ARTICLE 1 -->
	        	<article>
	            	<div class="post-image">
	                	<img src="img/img-contact.jpg" alt="contact image"> 
	                </div>
	                <div class="post-text">
	                    <h2>Contact US</h2>
	                </div>                 
	                <div class="post-text text-content">                  
	                	<div class="text"><p>Sed ut massa tristique, vehicula tellus in, fringilla ligula. Phasellus dignissim est sed egestas fringilla. Vivamus egestas nec dolor vitae egestas. Nulla a ante odio. Vestibulum lobortis tincidunt nulla non varius. Fusce ornare, ante nec ullamcorper scelerisque.</p>                    
	                    <br><ul class="bullet">
	                    	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
	                        <li>Integer lorem quam, interdum id nulla vel, varius lacinia metus</li>
	                        <li>Nunc quis elit scelerisque, dapibus sem et, venenatis nunc</li>
	                        <li>Proin eu laoreet augue. Aenean at rutrum nibh</li>
	                    </ul>
	                    <p>Nullam tristique massa faucibus, sodales sapien ac, tincidunt dolor. Quisque ut lobortis lectus, non suscipit ante. Duis lectus metus, consequat vitae ante et, ullamcorper scelerisque nisl.</p>
	                    </div>
	                </div>

	                <div class="comment-form">
	                    <span class="field-name">Your Name (required)</span>
	                    <input type="text" class="name">
	                    <span class="field-name">Your Name (required)</span>
	                    <input type="text" class="email">
	                    <span class="field-name">Subject</span>
	                    <input type="text" class="email">                    
	                    <span class="field-name">Your Message</span>
	                    <textarea class="message"></textarea>
	                    
	                    <button type="submit">Send</button>
	                
	                </div>
	            
	       	 	</article>
	        
	        
	        </div>


	        <!-- SIDEBAR -->        
	        <div class="sidebar col-xs-4">
	        	
	            
	            <!-- ABOUT ME -->                  
	            <div class="widget about-me">
	            	<div class="ab-image">
	                	<img src="img/about-me.jpg" alt="about me">
	                    <div class="ab-title">About Me</div>
	                </div>
	                <div class="ad-text">
	                	<p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
	                    <span class="signing"><img src="img/signing.png" alt="signing"></span>
	                </div>
	            </div>


	            <!-- NEWS POSTS -->  
	            @include('layouts.newPost')                            
	            


	            <!-- FOLLOW US -->                              
	            <div class="widget follow-us">
	            	<h3 class="widget-title">
	                	Follow Us
	                </h3>
	            	<div class="follow-container">
	                    <a href="#"><i class="icon-facebook5"></i></a>
	                    <a href="#"><i class="icon-twitter4"></i></a>
	                    <a href="#"><i class="icon-google-plus"></i></a>
	                    <a href="#"><i class="icon-vimeo4"></i></a>
	                    <a href="#"><i class="icon-linkedin2"></i></a>                
	                </div>
	            	<div class="clearfix"></div>
	            </div>            


	            <!-- TAGS -->                              
	            <div class="widget tags">
	            	<h3 class="widget-title">
	                	Tags
	                </h3>
	            	<div class="tags-container">
	                    <a href="#">Audio</a>
	                    <a href="#">Travel</a>
	                    <a href="#">Food</a>
	                    <a href="#">Event</a>
	                    <a href="#">Wordpress</a>
	                    <a href="#">Video</a>
	                    <a href="#">Design</a>
	                    <a href="#">Sport</a>
	                    <a href="#">Blog</a>
	                    <a href="#">Post</a> 
	                    <a href="#">Img</a>
	                    <a href="#">Masonry</a>                                    
	                </div>
	            	<div class="clearfix"></div>
	            </div> 


	            <!-- ADVERTISING -->                              
	            <div class="widget advertising">
					<div class="advertising-container">
	                	<img src="img/350x300.png" alt="banner 350x300">
	                </div>
				</div>


	            <!-- NEWSLETTER -->                              
	            <div class="widget newsletter">
	            	<h3 class="widget-title">
	                	Newsletter
	                </h3>
	            	<div class="newsletter-container">
						<h4>DO NOT MISS OUR NEWS</h4>
	                    <p>Sign up and receive the <br> latest news of our company</p> 
	                    <form>
	                       <input type="email" class="newsletter-email" placeholder="Your email address...">
	                       <button type="submit" class="newsletter-btn">Send</button>
	                  	</form>                                  
	                </div>
	            	<div class="clearfix"></div>
	            </div>  
	            
	        </div> <!-- #SIDEBAR -->
	        
	   		<div class="clearfix"></div>
	</section>
@endsection