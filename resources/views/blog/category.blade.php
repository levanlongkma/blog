@extends('layouts.index')
@section('category')
	
	<section class="tada-container content-posts blog-2-columns">
	    
	    
	    	<!-- CONTENT COL 1 -->
	    	@foreach($arr->post as $key => $val)
	    	<div class="content col-xs-6 @if($key >= 2 && $key%2==0) clearfix @endif">
	        
	        
	        	<!-- ARTICLE 1 -->
	        	
	        	<article>
	            	<div class="post-image">
	                	<img src="{{asset('img/'.$val->thumbnail)}}" alt="{{$val->slug}}">
	                    <div class="category"><a href="{{asset('home/category/'.$arr->slug)}}">{{$arr->name}}</a></div>
	                </div>
	                <div class="post-text">
	                	<span class="date">{{$val->created_at->diffForHumans()}}</span>
	                    <h2><a href="{{asset('detail/'.$val->slug)}}">{{$val->title}}</a></h2>
	                    <p class="text">{{$val->description}}
	                                    <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
	                </div>
	                {{-- <div class="post-info">
	                	<div class="post-by">Post By <a href="#">{{$val->user->name}}</a></div>
	                </div> --}}
	            </article>
	        
	       </div>
	        @endforeach
	        
	   		<div class="clearfix"></div>
	        
	        
	        <!-- NAVIGATION -->
	        <div class="navigation">
	            	<a href="#" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
	                <a href="#" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
	                <div class="clearfix"></div>
	        </div>  
	                  
	                  
	</section>
@endsection