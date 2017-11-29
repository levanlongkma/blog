
@extends('layouts.index')

@section('post')
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
    <section class="tada-container content-posts post sidebar-right">
            
            
            	<!-- CONTENT -->
            	<div class="content col-xs-8">
            
                
                	<!-- ARTICLE 1 -->    
                	<article>
                    	<div class="post-image">
                        	<img src="{{asset('img/'.$post->thumbnail)}}" alt="{{$post->title}}"> 
                        </div>
                        <div class="category">
                        	<a href="{{asset('home/category/'.$post->category->slug)}}">{{$post->category->name}}</a>
                        </div>
                        <div class="post-text">
                        	<span class="date">{{$post->created_at->diffForHumans()}}</span>
                            <h2>MAECENAS CONSECTETUR</h2>
                        </div>                 
                        <div class="post-text text-content">
                        	<div class="post-by">Post By <a href="#">{{$post->user->name}}</a></div>                    
                        	<div class="text"><p>{!!$post->content!!}            	
        					</p>                    
                            <div class="gallery">
                            	<div class="item-gallery-left">
                                	<img src="{{asset('img/img-post-gallery-1.jpg')}}">
                                    <img src="{{asset('img/img-post-gallery-2.jpg')}}">
                                </div>
                                <div class="item-gallery-center">
                                	<img src="{{asset('img/img-post-gallery-big.jpg')}}">
                                </div>	
                                <div class="item-gallery-right">    
                                    <img src="{{asset('img/img-post-gallery-3.jpg')}}">
                                    <img src="{{asset('img/img-post-gallery-4.jpg')}}">
                            	</div>	
                                    <div class="clearfix"></div> 
                            </div>
                            <ul class="bullet">
                            	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                <li>Integer lorem quam, interdum id nulla vel, varius lacinia metus</li>
                                <li>Nunc quis elit scelerisque, dapibus sem et, venenatis nunc</li>
                                <li>Proin eu laoreet augue. Aenean at rutrum nibh</li>
                            </ul>
                            <p>Nullam tristique massa faucibus, sodales sapien ac, tincidunt dolor. Quisque ut lobortis lectus, non suscipit ante. Duis lectus metus, consequat vitae ante et, ullamcorper scelerisque nisl. 
        					<br><br>
        					Nullam tristique massa faucibus, sodales sapien ac, tincidunt dolor. Quisque ut lobortis lectus, non suscipit ante. Phasellus et aliquet velit. Donec in dui vitae tellus sodales dapibus non quis libero. 
                            Quisque nec tortor ac ligula sagittis rutrum in a felis.
                         	<br><br>
                            <quote>“ Vestibulum at justo ante. Fusce finibus pretium aliquam. Sed pharetra purus at augue faucibus sagittis. 
                            Interdum et malesuada fames ac ante ipsum primis in faucibus. ”</quote><br><br>
                            Quisque euismod sapien vel neque tincidunt vulputate. Duis nulla elit, mollis eu fringilla euinterdum vel libero. 
                            Phasellus quis felis tempor, vulputate juquis, ullamcorper nisi.</p>
                            
                            <div class="clearfix">
                            	Tags:<ul>
                            		<li class="category" style="display: inline-block; float: left;margin-top: -75px">
                            	@foreach($post->tags as $value )
                            	
		                        	<a href="{{asset('home/category/'.$post->category->slug)}}">{{$value->name}}</a>
									
		                        @endforeach
		                    		</li>
                            	</ul>
                            </div>
                            </div>
                        </div>
                        <div class="social-post">
                            <a href="#"><i class="icon-facebook5"></i></a>
                            <a href="#"><i class="icon-twitter4"></i></a>
                            <a href="#"><i class="icon-google-plus"></i></a>
                            <a href="#"><i class="icon-vimeo4"></i></a>
                            <a href="#"><i class="icon-linkedin2"></i></a>                  
                        </div>
                        
                    
                		<!-- NAVIGATION POST -->
                        <div class="navigation-post">
                            <div class="prev-post">
                                <img src="img/prev-post.jpg">
                                <a href="#" class="prev">
                                    <i class="icon-arrow-left8"></i> Previous Posts
                                    <span class="name-post">DUIS FACILISIS AUGUE VITAE</span>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="next-post">                	
                                <a href="#" class="next">
                                        Next Posts <i class="icon-arrow-right8"></i>                
                                        <span class="name-post">DUIS FACILISIS AUGUE VITAE</span>
                                </a> 
                                <img src="img/next-post.jpg">  
                                <div class="clearfix"></div>             
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        
                        <!-- AUTHOR POST -->
                        <div class="author-post-container">
                            <div class="author-post">
                                <div class="author-image">
                                    <img src="{{asset('img/img-author.jpg')}}">
                                </div>
                                <div class="author-info">
                                    <span class="author-name">{{$post->user->email}}</span>
                                    <span class="author-description">Morbi gravida, sem non egestas ullamcorper, tellus ante laoreet nisl, id iaculis urna eros vel turpis curabitur.</span>
                                    <span class="author-social">
                                        <a href="https://www.facebook.com/profile.php?id=100014702806128"><i class="icon-facebook5"></i></a>
                                        <a href="#"><i class="icon-twitter4"></i></a>
                                        <a href="#"><i class="icon-google-plus"></i></a>
                                        <a href="#"><i class="icon-vimeo4"></i></a>
                                        <a href="#"><i class="icon-linkedin2"></i></a>            
                                    </span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                                
                        </div>
                        
                        
                        <!-- RELATED POSTS -->
                        <div class="related-posts">
                                <h2>Related Article</h2>
                                
                                <div class="related-item-container">
                                    @foreach($random as $val)
            
                                    <div class="related-item">
                                        <div class="related-image">
                                            <img src="{{asset('img/'.$val->thumbnail)}}">
                                            <span class="related-category"><a href="{{asset('home/category/'.$val->category->slug)}}">{{$val->category->name}}</a></span>
                                        </div>
                                        <div class="related-text">
                                            <span class="related-date">{{$val->created_at->diffForHumans()}}</span>
                                            <span class="related-title"><a href="{{asset('detail/'.$val->slug)}}">VIVAMUS ET <br> TURPIS LACINIA</a></span>
                                        </div>
                                        <div class="related-author">
                                            {{-- Post by <a href="#">{{$val->user->name}}</a> --}}
                                        </div>
                                    </div>                                                            	
                                    @endforeach
                                    <div class="clearfix"></div>
                                
                                </div>
                                
                          </div>      
                                
                                
                          <!-- COMMENTS -->      
                        <div class="comments">
                                    
                            <div class="fb-comments" data-href="{{route('admin.test',$post->slug)}}" data-numposts="5"></div>    
                        </div>                                  
                    
                    
               	 	</article>
                
                
                </div>
                
                
                <!-- SIDEBAR -->
                <div class="sidebar col-xs-4">
                	
                    
                    <!-- ABOUT ME -->                  
                    <div class="widget about-me">
                    	<div class="ab-image">
                        	<img src="{{asset('img/about-me.jpg')}}" alt="about me">
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
                 <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5370366f06e43f1d"></script> 
<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_native_toolbox_q4bu"></div>


    </section>
@endsection