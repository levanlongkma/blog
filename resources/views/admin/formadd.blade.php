@extends('layouts.admin')
@section('content')
<div class="right_col" role="main">
	<div class="tile_count">
		<form action="{{route('admin.add')}}" method="POST" role="form" enctype="multipart/form-data"> 
			{{csrf_field()}}
			<div class="row">
				<h1>CREATE POST</h1>
				<div class="col-md-8" style="border-right: #e5e5e5 solid 1px;">
						<legend>Form title</legend>
							<div class="form-group">
																
								<label for="">Title</label>	
								@if($errors->has('title'))	
									<p style="color: red">{{ $errors->first('title') }}</p>
								@endif							
								<input type="text"  name="title" id="input" class="form-control" value="{{ old('title') }}" >
								<label>Description</label>
								@if($errors->has('description'))	
									<p style="color: red">{{ $errors->first('description') }}</p>
								@endif	
								<input type="text" style="width: 100% ; height: 100px" name="description" value="{!! old('description') !!}">
								<label>Content</label>
								@if($errors->has('content'))	
									<p style="color: red">{{ $errors->first('content') }}</p>
								@endif	
								<textarea name="content" class="tinymce">{{ old('content') }}</textarea>
							</div>						
						</div>													
					
				
				<div class="col-md-4" >
			
					<div class="top" style="border-top: #73879C solid 5px">
						<div class="border-top" style="height: 44px">
							<h3><i class="fa fa-bookmark" aria-hidden="true" style="color: #666666"></i> STATUS</h3>
						</div>
						<br>
						<div class="border-bot">		
							<select class="form-control" style="width: 100% ; height: 35px" id="ddlProducts" name="status"> 
							  	<option value="private">Private</option>
							  	<option value="public">Public</option>
							</select>		
						</div>
					</div>
					<br>
					<div class="mid" style="border-top: #73879C solid 5px">
						<div class="mid-top top">
							<h3><i class="fa fa-bars" aria-hidden="true" style="color: #666666"></i> CATEGORY</h3>
						</div>
						<div class="mid-bot">
							<select class="form-control" style="width: 100% ; height: 35px" name="category_id" id="">
								@if(!empty($category))
								  	@foreach($category as $value)
								  		<option value="{{$value->id}}">{{$value->name}}</option>
								  	@endforeach
							    @endif
							</select>
						</div>
						<br>
						
					</div>
					<br>
					<div class="mid" style="border-top: #73879C solid 5px">
						<div class="mid-top top">
							<h3><i class="fa fa-tag" aria-hidden="true" style="color: #666666"></i> TAGS</h3>
						</div>
						<div class="mid-bot">
							<select  style="width: 100% ; height: 35px"  class="js-example-basic-multiple" name="tags[]" multiple="multiple" >
								@if(!empty($tag))
								  	@foreach($tag as $value)
								  		<option value="{{$value->id}}" >{{$value->name}}</option>
								  	@endforeach
							    @endif
							</select>
						</div>
						<br>						
					</div>
					<br>

					<div class="bot" style="border-top: #73879C solid 5px">
						<div class="mid-top top">
							<h3><i class="fa fa-picture-o" aria-hidden="true" style="color: #666666"></i> IMAGE</h3>
							<div class="input-group image-preview">
				                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
				                <span class="input-group-btn">
				                    <!-- image-preview-clear button -->
				                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
				                        <span class="glyphicon glyphicon-remove"></span> Clear
				                    </button>
				                    <!-- image-preview-input -->
				                    <div class="btn btn-default image-preview-input">
				                        <span class="glyphicon glyphicon-folder-open"></span>
				                        <span class="image-preview-input-title">Browse</span>
				                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
				                    </div>
				                </span>
				            </div><!-- /input-group image-preview [TO HERE]--> 
						</div>
					</div>
					<br>
					<button type="submit" class="btn btn-success">Create</button>
				</div>
			</div>
			<br>
			
			<div style="width: 100% ; height: 30px"></div>
		</form>
	</div>
</div>

@endsection
@section('script')
	<script>
		$(document).ready(function() {
		    $('.js-example-basic-multiple').select2();
		});
	</script>
@endsection