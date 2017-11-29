@extends('layouts.admin')
@section('content')

<div class="right_col" role="main">
	<div class="row tile_count"> 
		<table class="table table-hover" id="recyclebin-table">
			<thead>
				<tr>
					<th>STT</th>
					{{-- <th>Thumbnail</th> --}}
					<th>Title</th>
					<th>Status</th>
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
			    var table = $('#recyclebin-table').DataTable({
			        processing: true,
			        serverSide: true,
			        ajax: '{!! route('admin.getRecyclebin') !!}',
			        columns: [
			            { data: 'id', name: 'id' }, 
			            // {data: 'thumbnail', name: 'thumbnail', orderable: false, searchable: false},
			            { data: 'title', name: 'title' },
			            { data: 'status', name: 'status' },
			            { data: 'deleted_at', name: 'deleted_at' },
			            {data: 'action', name: 'action', orderable: false, searchable: false},
			        ]
			    });


			   $('#recyclebin-table').on('click','.restore',function(e){
					var id = $(this).val();
					swal({
					  title: "Thông báo !",
					  text: "Tập tin của bạn đã được khôi phục !",
					  icon: "success",
					  button: "OK",
					});
					$.ajax({
						url : '{{route('admin.restoreRecyclebin')}}',
						type : 'POST',
						data : {
							id : id 
						},
						success : function (data){
							table.ajax.reload();
						}
					});
				});
				$('#recyclebin-table').on('click','.delete',function(e){
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
							url : '{{route('admin.deleteRecyclebin')}}',
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
