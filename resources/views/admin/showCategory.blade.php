@extends('layouts.admin')
@section('content')

<div class="right_col" role="main">
	<div class="row tile_count">
		<button class="btn btn-success" data-toggle="modal" data-target="#myModal">Thêm mới</button>
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		  	<form  method="POST" role="form">
			<!-- Modal content-->
				{{csrf_field()}}
				<input type="hidden" name="_method" method="POST">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h3 class="modal-title">Thêm mới category</h3>
			      </div>
			      <div class="modal-body">
			      	<label>Category</label>
			        <input name="category" id="create-new" style="width:100% ; height:40px ;">
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-success create" data-dismiss="modal">Thêm mới</button>
			      </div>
			    </div>
		  	</form>

		    

		  </div>
		</div>
		<table class="table table-hover" id="category-table">
			<thead>
				<tr>
					<th>STT</th>				
					<th>Category</th>
					<th>Slug</th>				
					<th>Created_at</th>					
					<th>Action</th>
				</tr>
			</thead>
		</table>
	</div>
</div>


@endsection

@section('script')
	<script>

		$(document).ready(function(){
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			 
			$(function() {
			    var table = $('#category-table').DataTable({
			        processing: true,
			        serverSide: true,
			        ajax: '{!! route('admin.GetListCategory') !!}',
			        columns: [
			            { data: 'id', name: 'id' }, 
			            { data: 'name', name: 'name' },
			            { data: 'slug', name: 'slug' },
			            { data: 'created_at', name: 'created_at' },
			            {data: 'action', name: 'action', orderable: false, searchable: false},
			        ]
			    });
			    $('.create').click(function(e){
					var category = $('#create-new').val();
					swal({
					  title: "Thông báo !",
					  text: "Thêm mới thành công !",
					  icon: "success",
					  button: "OK",
					});
					$.ajax({
						url : '{{route('admin.createCategory')}}',
						type : 'POST',
						data : {
							name : category 
						},
						success : function (data){
							console.log(data);
							table.ajax.reload();
						}
					});
				});
			    $('#category-table').on('click','.edit',function(e){
					var id = $(this).val();
					var category = $('#'+id).val();
					swal({
					  title: "Thông báo !",
					  text: "Sửa thành công !",
					  icon: "success",
					  button: "OK",
					});
					$.ajax({
						url : '{{route('admin.editCategory')}}',
						type : 'POST',
						data : {
							id : id ,
							category : category 
						},
						success : function (data){
							console.log(data);
							table.ajax.reload();
						}
					});
				});
			   $('#category-table').on('click','.delete',function(e){
				var id = $(this).val();
				swal({
					  title: "Bạn có chắc chắn muốn xóa ?",
					  text: "Nếu như xóa, Tập tin này sẽ được chuyển đến thùng rác !",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true,
					})
					.then((willDelete) => {
					  if (willDelete) {
					    swal("Tập tin đã bị xóa.", {
					      icon: "success",
					    });
					    $.ajax({
							url : '{{route('admin.deleteCategory')}}',
							type : 'DELETE',
							data : {
								id : id 
							},

							success : function (data){
								table.ajax.reload();

							}
						});
					  } else {
					    swal("Xóa thất bại");
					  }
					});			
				}); 

			});
		});
		
	</script>
@endsection