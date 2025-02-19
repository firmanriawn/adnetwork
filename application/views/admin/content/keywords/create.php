<div class="container-fluid">
	<div class="page-title">
		<div class="row">
			<div class="col-sm-6 col-12">
				<h2>Add New Keyword</h2>
			</div>
			<div class="col-sm-6 col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i
								class="iconly-Home icli svg-color"></i></a></li>
					<li class="breadcrumb-item">Admin</li>
					<li class="breadcrumb-item">Keywords</li>
					<li class="breadcrumb-item active">Add New Keyword</li>
				</ol>
			</div>
		</div>
	</div>
</div>


<div class="card">
	<div class="card-body">
		<form id="keywordForm" action="<?= base_url('admin/keywords/create') ?>" method="post">
			<div class="mb-3">
				<label for="keyword_name" class="form-label">Keyword Name</label>
				<input type="text" class="form-control" id="keyword_name" name="keyword_name" required>
			</div>

			<div class="d-flex gap-2">
				<button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
				<a href="<?= base_url('admin/keywords') ?>" class="btn btn-secondary">Cancel</a>
			</div>
		</form>
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	$(document).ready(function () {
		$('#keywordForm').on('submit', function (e) {
			e.preventDefault();

			// Reset any previous error states
			$('.is-invalid').removeClass('is-invalid');
			$('.invalid-feedback').remove();

			$('#submitBtn').prop('disabled', true)
				.html('<span class="spinner-border spinner-border-sm me-2"></span>Processing...');

			$.ajax({
				url: $(this).attr('action'),
				type: 'POST',
				data: $(this).serialize(),
				dataType: 'json',
				success: function (response) {
					if (response.success) {
						window.location.href = '<?= base_url("admin/keywords") ?>';
					} else {
						$('#submitBtn').prop('disabled', false).html('Submit');
						
						// Handle validation errors
						if (response.errors) {
							let errorMessage = '';
							$.each(response.errors, function (key, value) {
								errorMessage += value + '<br>';
								$('#' + key).addClass('is-invalid');
								// Remove any existing feedback first
								$('#' + key).next('.invalid-feedback').remove();
								$('#' + key).after('<div class="invalid-feedback">' + value + '</div>');
							});
							Swal.fire({
								icon: 'error',
								title: 'Validation Error',
								html: errorMessage
							});
						} else if (response.message) {
							// Handle other error messages
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: response.message
							});
						}
					}
				},
				error: function (xhr, status, error) {
					$('#submitBtn').prop('disabled', false).html('Submit');
					console.error(xhr.responseText); // Log the error for debugging
					Swal.fire({
						icon: 'error',
						title: 'Error!',
						text: 'Something went wrong. Please try again.'
					});
				}
			});
		});

		$('input').on('input', function () {
			$(this).removeClass('is-invalid').next('.invalid-feedback').remove();
		});
	});
</script>
