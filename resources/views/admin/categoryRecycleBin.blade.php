@extends('layouts.admin')
@section('content')

<div class="right_col" role="main">
	<div class="row tile_count"> 
		<table class="table table-hover" id="CatogoryRecyclebin-table">
			<thead>
				<tr>
					<th>STT</th>
					<th>Category</th>
					<th>Slug</th>
					<th>Deleted at</th>
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
			    var table = $('#CatogoryRecyclebin-table').DataTable({
			        processing: true,
			        serverSide: true,
			        ajax: '{!! route('admin.GetListCategoryRecycleBin') !!}',
			        columns: [
			            { data: 'id', name: 'id' }, 
			            { data: 'name', name: 'name' },
			            { data: 'slug', name: 'slug' },
			            { data: 'deleted_at', name: 'deleted_at' },
			            {data: 'action', name: 'action', orderable: false, searchable: false},
			        ]
			    });


			   $('#CatogoryRecyclebin-table').on('click','.restore',function(e){
					var id = $(this).val();
					swal({
					  title: "Thông báo !",
					  text: "Tập tin của bạn đã được khôi phục !",
					  icon: "success",
					  button: "OK",
					});
					$.ajax({
						url : '{{route('admin.RestoreCategoryRecycleBin')}}',
						type : 'POST',
						data : {
							id : id 
						},
						success : function (data){
							table.ajax.reload();
						}
					});
				});
				$('#CatogoryRecyclebin-table').on('click','.delete',function(e){
					var id = $(this).val();
					swal({
					  title: "Bạn có chắc chắn muốn xóa ?",
					  text: "Nếu như xóa, bạn không thể được phục hồi tập tin này !",
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
							url : '{{route('admin.DeleteCategoryRecycleBin')}}',
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
