@extends('layouts.index')
@section('search')
		<section class="tada-container content-posts">
    
    
    	<!-- CONTENT -->
    	<div class="content col-xs-8">
        
        
        	<!-- ARTICLE 1 -->
        	@if(!empty($search))
        		@foreach($search as $val)
		        	<article>
		            	<div class="post-image">
		                	<img src="{{asset('img/'.$val->thumbnail)}}" alt="{{$val->slug}}">
		                    <div class="category"><a href="{{asset('home/category/'.$val->category->slug)}}">{{$val->category->name}}</a></div>
		                </div>
		                <div class="post-text">
		                	<span class="date">{{$val->created_at->diffForHumans()}}</span>
		                    <h2><a href="{{asset('detail/'.$val->slug)}}">{{$val->title}}</a></h2>
		                    <p class="text">{{$val->content}}
		                                    <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
		                </div>
		                <div class="post-info">
		                	<div class="post-by">Post By <a href="#">{{$val->user->name}}</a></div>
		                    <div class="extra-info">
		                    	<a href="#"><i class="icon-facebook5"></i></a>
		                		<a href="#"><i class="icon-twitter4"></i></a>
		                		<a href="#"><i class="icon-google-plus"></i></a>
		                        <span class="comments">25 <i class="icon-bubble2"></i></span>
		                    </div>
		                    <div class="clearfix"></div>
		                </div>
		            </article>
            	@endforeach
            @endif
        
        
        	
        	<div class="navigation">
            	<a href="#" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
                <a href="#" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
                <div class="clearfix"></div>
            </div>
        
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

            <!-- LATEST POSTS --> 
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