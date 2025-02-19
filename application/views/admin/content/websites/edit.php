<div class="container-fluid">
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>Edit Website</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="iconly-Home icli"></i></a></li>
					<li class="breadcrumb-item">Websites</li>
					<li class="breadcrumb-item active">Edit</li>
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
					<form action="<?= base_url('admin/websites/edit/' . $website->website_id) ?>" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Website Name</label>
									<input type="text" class="form-control" name="website_name"
										value="<?= set_value('website_name', $website->website_name) ?>" required>
									<?= form_error('website_name') ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Domain</label>
									<input type="text" class="form-control" name="domain"
										value="<?= set_value('domain', $website->domain) ?>" required>
									<?= form_error('domain') ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label">Keywords</label>
									<input type="text" class="form-control" name="keywords"
										value="<?= set_value('keywords', $website->keywords) ?>" required>
									<small class="text-muted">Separate keywords with comma</small>
									<?= form_error('keywords') ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label">Description</label>
									<textarea class="form-control" name="description"
										rows="4"><?= set_value('description', $website->description) ?></textarea>
								</div>
							</div>
						</div>
						<div class="mt-3">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="<?= base_url('admin/websites') ?>"
								class="btn btn-square btn-light text-dark">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
