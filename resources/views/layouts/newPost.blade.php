<div class="widget latest-posts">
    <h3 class="widget-title">
        New Posts
    </h3>
    <div class="posts-container">
        @foreach($new as $val)
            <div class="item">
                <img src="{{asset('img/'.$val->thumbnail)}}" alt="$val->slug" class="post-image" >
                <div class="info-post">
                    <h5><a href="{{asset('detail/'.$val->slug)}}">MAECENAS <br> CONSECTETUR</a></h5>
                    <span class="date">{{$val->created_at->diffForHumans()}}</span>  
                </div> 
                <div class="clearfix"></div>   
            </div>
        @endforeach

        
        
        <div class="clearfix"></div>
    </div>
</div>