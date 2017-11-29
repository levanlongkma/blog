@extends('layouts.admin')
@section('content')

<div class="right_col" role="main">
	<div class="row tile_count">
		<a href="{{route('admin.fadd')}}"><button class="btn btn-success">Thêm mới</button></a>
		<table class="table table-hover" id="users-table">
			<thead>
				<tr>
					<th>STT</th>				
					<th>Title</th>
					<th>Status</th>				
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
			    var table = $('#users-table').DataTable({
			        processing: true,
			        serverSide: true,
			        ajax: '{!! route('admin.getList') !!}',
			        columns: [
			            { data: 'id', name: 'id' }, 
			            { data: 'title', name: 'title' },
			            { data: 'status', name: 'status' },
			            { data: 'created_at', name: 'created_at' },
			            {data: 'action', name: 'action', orderable: false, searchable: false},
			        ]
			    });


			   $('#users-table').on('click','.delete',function(e){
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
							url : '{{route('admin.delete')}}',
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