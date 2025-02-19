<!-- jQuery and jQuery Cookie plugin in header -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid">
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>Add New Website</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="iconly-Home icli"></i></a></li>
					<li class="breadcrumb-item">Websites</li>
					<li class="breadcrumb-item active">Add New</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<form id="websiteForm" action="<?= base_url('admin/websites/create') ?>" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Publisher</label>
									<select class="form-select" name="user_id" required>
										<option value="">Select Publisher</option>
										<?php foreach ($users as $user): ?>
											<option value="<?= $user->user_id ?>" <?= set_select('user_id', $user->user_id) ?>>
												<?= $user->name ?> (<?= $user->email ?>)
											</option>
										<?php endforeach; ?>
									</select>
									<div class="invalid-feedback"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Website Name</label>
									<input type="text" class="form-control" name="website_name"
										value="<?= set_value('website_name') ?>" required>
									<?= form_error('website_name') ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Domain</label>
									<input type="text" class="form-control" name="domain"
										value="<?= set_value('domain') ?>" required>
									<?= form_error('domain') ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label">Keywords</label>
									<input type="text" class="form-control" name="keywords"
										value="<?= set_value('keywords') ?>" required>
									<small class="text-muted">Separate keywords with comma</small>
									<?= form_error('keywords') ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label">Description</label>
									<textarea class="form-control" name="description"
										rows="4"><?= set_value('description') ?></textarea>
								</div>
							</div>
						</div>

						<!-- Tambahkan loading indicator -->
						<div id="loadingIndicator" style="display: none;">
							<span class="spinner-border spinner-border-sm"></span> Processing...
						</div>

						<div class="mt-3">
							<button type="submit" id="submitBtn" class="btn btn-primary me-2">Submit</button>
							<a href="<?= base_url('admin/websites') ?>"
								class="btn btn-square btn-light text-dark">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		// Auto-save form ke cookies
		const formFields = ['user_id', 'website_name', 'domain', 'keywords', 'description'];

		// Load saved data from cookies when page is opened
		formFields.forEach(field => {
			const savedValue = Cookies.get(`website_form_${field}`);
			if (savedValue) {
				$(`[name="${field}"]`).val(savedValue);
			}
		});

		// Save to cookies whenever user inputs
		$('#websiteForm input, #websiteForm select, #websiteForm textarea').on('change', function () {
			const field = $(this).attr('name');
			const value = $(this).val();
			Cookies.set(`website_form_${field}`, value, { expires: 1 }); // expired in 1 day
		});

		// Form submission with AJAX
		$('#websiteForm').on('submit', function (e) {
			e.preventDefault();

			// Show processing state
			$('#submitBtn').prop('disabled', true)
				.html('<span class="spinner-border spinner-border-sm me-2" role="status"></span>Processing...');

			$.ajax({
				url: $(this).attr('action'),
				type: 'POST',
				data: $(this).serialize(),
				dataType: 'json',
				success: function (response) {
					if (response.success) {
						// Remove cookies because form is successfully submitted
						formFields.forEach(field => {
							Cookies.remove(`website_form_${field}`);
						});

						// Redirect directly if successful
						window.location.href = '<?= base_url("admin/websites") ?>';
					} else {
						// Reset button state
						$('#submitBtn').prop('disabled', false).html('Submit');

						// Show validation errors
						if (response.errors) {
							let errorMessage = '';
							$.each(response.errors, function (key, value) {
								errorMessage += value + '<br>';
								$(`[name="${key}"]`).addClass('is-invalid')
									.after('<div class="invalid-feedback">' + value + '</div>');
							});

							// Show error with regular alert if SweetAlert is not loaded
							if (typeof Swal === 'undefined') {
								alert('Please check your input:\n' + $(errorMessage).text());
							} else {
								Swal.fire({
									icon: 'error',
									title: 'Validation Error',
									html: errorMessage
								});
							}
						}
					}
				},
				error: function (xhr, status, error) {
					// Reset button state
					$('#submitBtn').prop('disabled', false).html('Submit');

					// Show error with regular alert if SweetAlert is not loaded
					if (typeof Swal === 'undefined') {
						alert('Error: ' + error);
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Error!',
							text: 'Something went wrong while saving the data.'
						});
					}
				}
			});
		});

		// Clear validation errors when input changes
		$('input, select, textarea').on('input change', function () {
			$(this).removeClass('is-invalid')
				.next('.invalid-feedback').remove();
		});
	});
</script>
