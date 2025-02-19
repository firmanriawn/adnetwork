<!-- CSS DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css"
	href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">

<div class="container-fluid">
	<div class="page-title">
		<div class="row">
			<div class="col-sm-6 col-12">
				<h2>Websites</h2>
			</div>
			<div class="col-sm-6 col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i
								class="iconly-Home icli svg-color"></i></a></li>
					<li class="breadcrumb-item">Admin</li>
					<li class="breadcrumb-item">Websites</li>
					<li class="breadcrumb-item active">List</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- Container-fluid starts-->
<div class="container-fluid general-widget">
	<div class="row">
		<!-- Zero Configuration  Starts-->
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<!-- Filter controls -->
					<div class="row mb-3">
						<div class="col-md-2 mb-2">
							<a href="<?= base_url('admin/websites/create') ?>" class="btn btn-md btn-outline-info">+ New
								Website</a>
						</div>
						<div class="col-md-3 mb-2">
							<input type="text" id="keywordFilter" class="form-control" placeholder="Filter by Keywords">
						</div>
						<div class="col-md-2 mb-2">
							<select class="form-select" id="statusFilter">
								<option value="">All Status</option>
								<option value="active">Active</option>
								<option value="inactive">Inactive</option>
								<option value="pending">Pending</option>
							</select>
						</div>
						<div class="col-md-2 mb-2">
							<select class="form-select" id="verificationFilter">
								<option value="">All</option>
								<option value="1">Verified</option>
								<option value="0">Unverified</option>
							</select>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table" id="websitesTable">
							<thead>
								<tr>
									<th>ID</th>
									<th>Website Name</th>
									<th>Domain</th>
									<th>Keywords</th>
									<th>Publisher</th>
									<th>Status</th>
									<th>Verified</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- Zero Configuration  Ends-->
	</div>
</div>

<style>
	#loadingIndicator {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(255, 255, 255, 0.8);
		display: none;
		justify-content: center;
		align-items: center;
		z-index: 9999;
	}

	.badge {
		font-size: 0.8rem;
		font-weight: normal;
		padding: 0.35em 0.65em;
	}

	.badge.bg-light {
		border: 1px solid #dee2e6;
	}

	.table td {
		vertical-align: middle;
	}

	.keyword-badge {
		font-size: 0.75rem;
		font-weight: 500;
		padding: 0.35em 0.65em;
		border-radius: 4px;
		margin: 0.1rem;
		display: inline-block;
		white-space: nowrap;
		text-transform: lowercase;
	}

	.keyword-badge:hover {
		background-color: #008385;
		transition: background-color 0.2s ease;
	}

	td .keyword-badge {
		margin-bottom: 0.25rem;
		margin-right: 0.25rem;
	}
</style>

<!-- Div for loading outside table -->
<div id="loadingIndicator">
	<div class="spinner-border text-primary" role="status">
		<span class="visually-hidden">Loading...</span>
	</div>
</div>

<!-- Jquery, Datatables, Responsive -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script>
	$(document).ready(function () {
		// Function to show/hide loading
		function showLoading() {
			$('#loadingIndicator').css('display', 'flex');
		}

		function hideLoading() {
			$('#loadingIndicator').hide();
		}

		// Initialize DataTable with more organized configuration
		var table = $('#websitesTable').DataTable({
			processing: true,
			serverSide: true,
			pageLength: 10,
			responsive: true,
			ajax: {
				url: '<?= base_url("admin/websites/get_data") ?>',
				type: 'POST',
				data: function (d) {
					d.keyword = $('#keywordFilter').val();
					d.status = $('#statusFilter').val();
					d.is_verified = $('#verificationFilter').val();
				}
			},
			columns: [
				{
					data: 'website_id',
					width: '5%'
				},
				{
					data: 'website_name',
					width: '15%'
				},
				{
					data: 'domain',
					width: '15%',
					render: function (data) {
						return '<a href="https://' + data + '" target="_blank">' + data + '</a>';
					}
				},
				{
					data: 'keywords',
					width: '20%',
					render: function (data) {
						if (!data) return '-';
						var keywords = data.split(',');
						return keywords.map(function (keyword) {
							return '<span class="badge bg-info text-white rounded-pill keyword-badge">' +
								keyword.trim() + '</span>';
						}).join(' ');
					}
				},
				{
					data: 'publisher',
					width: '15%'
				},
				{
					data: 'status',
					width: '10%',
					render: function (data) {
						var badges = {
							'active': 'success',
							'inactive': 'danger',
							'pending': 'warning'
						};
						return '<span class="badge bg-' + (badges[data] || 'secondary') +
							' text-white">' + data.toUpperCase() + '</span>';
					}
				},
				{
					data: 'is_verified',
					width: '10%',
					render: function (data) {
						if (data == 1) {
							return '<span class="badge bg-success text-white">' +
								'<i class="fas fa-check me-1"></i>Verified</span>';
						}
						return '<span class="badge bg-secondary text-white">' +
							'<i class="fas fa-times me-1"></i>Unverified</span>';
					}
				},
				{
					data: 'website_id',
					width: '10%',
					orderable: false,
					render: function (data) {
						return `
							<ul class="action">
								<li class="edit me-2">
									<a href="<?= base_url('admin/websites/edit/') ?>${data}" >
										<i class="icon-pencil-alt"></i>
									</a>
								</li>
								<li class="delete me-2">
									<a href="javascript:void(0)" onclick="deleteWebsite(${data})">
										<i class="icon-trash"></i>
									</a>
								</li>
							</ul>
						`;
					}
				}
			],
			order: [[0, 'desc']],
			dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
				'<"row"<"col-sm-12"tr>>' +
				'<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
			language: {
				processing: '<div class="spinner-border text-primary" role="status">' +
					'<span class="visually-hidden">Loading...</span></div>',
				lengthMenu: "Show _MENU_ entries",
				search: "Search:",
				paginate: {
					first: '<i class="fas fa-angle-double-left"></i>',
					previous: '<i class="fas fa-angle-left"></i>',
					next: '<i class="fas fa-angle-right"></i>',
					last: '<i class="fas fa-angle-double-right"></i>'
				}
			}
		});

		// Refresh table when filter changes
		$('#keywordFilter, #statusFilter, #verificationFilter').on('change', function () {
			table.ajax.reload();
		});

		// additional style
		$('<style>')
			.text(`
				.dataTables_wrapper .dataTables_length select {
					min-width: 80px;
				}
				.badge {
					font-weight: 500;
				}
				.btn-group .btn {
					padding: 0.25rem 0.5rem;
				}
				.btn-group .btn i {
					font-size: 0.875rem;
				}
				.dataTables_processing {
					background: rgba(255,255,255,0.9);
					border-radius: 0.25rem;
					box-shadow: 0 0 10px rgba(0,0,0,0.1);
				}
			`)
			.appendTo('head');

		// Delete handler
		window.deleteWebsite = function (id) {
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
						url: '<?= base_url("admin/websites/delete/") ?>' + id,
						type: 'POST',
						dataType: 'json',
						success: function (response) {
							if (response.success) {
								Swal.fire(
									'Deleted!',
									'Website has been deleted.',
									'success'
								);
								$('#websitesTable').DataTable().ajax.reload();
							} else {
								Swal.fire(
									'Error!',
									response.message || 'Failed to delete website',
									'error'
								);
							}
						},
						error: function (xhr, status, error) {
							console.error('Delete error:', error);
							Swal.fire(
								'Error!',
								'Something went wrong while deleting the website.',
								'error'
							);
						}
					});
				}
			});
		};

		// Verify handler
		window.verifyWebsite = function (id) {
			Swal.fire({
				title: 'Verify Website',
				text: "Are you sure want to verify this website?",
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, verify it!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: '<?= base_url("admin/websites/verify/") ?>' + id,
						type: 'POST',
						dataType: 'json',
						success: function (response) {
							if (response.success) {
								Swal.fire('Verified!', response.message, 'success');
								$('#websitesTable').DataTable().ajax.reload();
							} else {
								Swal.fire('Error!', response.message, 'error');
							}
						},
						error: function (xhr, status, error) {
							console.error('Verification error:', error);
							Swal.fire('Error!', 'Failed to verify website. Please try again.', 'error');
						}
					});
				}
			});
		};
	});
</script>

<!-- Make sure SweetAlert2 is included -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
