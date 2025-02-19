<!-- Include required CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid">
	<div class="page-title">
		<div class="row">
			<div class="col-sm-6 col-12">
				<h2>Keywords</h2>
			</div>
			<div class="col-sm-6 col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i
								class="iconly-Home icli svg-color"></i></a></li>
					<li class="breadcrumb-item">Admin</li>
					<li class="breadcrumb-item">Websites</li>
					<li class="breadcrumb-item active">Keywords</li>
				</ol>
			</div>
		</div>
	</div>
</div>


<div class="container-fluid general-widget">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="row mb-3">
						<div class="col-md-2 mb-2">
							<a href="<?= base_url('admin/keywords/create') ?>" class="btn btn-outline-info">+ New
								Keyword</a>
						</div>
					</div>
					<div class="table-responsive">
						<table class="display table" id="keywordsTable">
							<thead>
								<tr>
									<th>ID</th>
									<th>Keyword Name</th>
									<!-- <th>Status</th> -->
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const table = $('#keywordsTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: '<?= base_url("admin/keywords/get_data") ?>',
				type: 'POST',
				error: function (xhr, error, thrown) {
					console.log('DataTables error:', error);
					console.log('Server response:', xhr.responseText);
				}
			},
			columns: [
				{ data: 'keyword_id' },
				{ data: 'keyword_name' },
				{
					data: 'keyword_id',
					render: function (data) {
						return `
						<ul class="action">
							<li class="edit me-2">
								<a href="<?= base_url('admin/keywords/edit/') ?>${data}">
									<i class="icon-pencil-alt"></i>
								</a>
							</li>
							<li class="delete me-2">
								<a href="javascript:void(0)" onclick="deleteKeyword(${data})">
									<i class="icon-trash"></i>
								</a>
							</li>
						</ul>
					`;
					}
				}
			],
			order: [[0, 'desc']],
			// debugging
			// drawCallback: function (settings) {
			// 	console.log('DataTables data:', settings.json);
			// }
		});
	});

	function deleteKeyword(id) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#3085d6',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: '<?= base_url("admin/keywords/delete/") ?>' + id,
					type: 'POST',
					dataType: 'json',
					success: function (response) {
						if (response.success) {
							Swal.fire('Deleted!', response.message, 'success');
							$('#keywordsTable').DataTable().ajax.reload();
						} else {
							Swal.fire('Error!', response.message, 'error');
						}
					},
					error: function (xhr, status, error) {
						console.log('Delete error:', error);
						console.log('Server response:', xhr.responseText);
						Swal.fire('Error!', 'Something went wrong', 'error');
					}
				});
			}
		});
	}
</script>
