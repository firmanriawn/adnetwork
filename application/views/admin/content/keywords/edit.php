<div class="container-fluid">
	<div class="page-title">
		<div class="row">
			<div class="col-sm-6 col-12">
				<h2>Edit Keyword</h2>
			</div>
			<div class="col-sm-6 col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i
								class="iconly-Home icli svg-color"></i></a></li>
					<li class="breadcrumb-item">Admin</li>
					<li class="breadcrumb-item">Keywords</li>
					<li class="breadcrumb-item active">Edit Keyword</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="card">
    <div class="card-body">
        <form id="keywordForm" action="<?= base_url('admin/keywords/edit/' . $keyword->keyword_id) ?>" method="post">
            <div class="mb-3">
                <label for="keyword_name" class="form-label">Keyword Name</label>
                <input type="text" class="form-control" id="keyword_name" name="keyword_name" 
                       value="<?= $keyword->keyword_name ?>" required>
            </div>
            
            <div class="d-flex gap-2">
                <button type="submit" id="submitBtn" class="btn btn-primary">Update</button>
                <a href="<?= base_url('admin/keywords') ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<!-- Add jQuery and SweetAlert2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    $('#keywordForm').on('submit', function(e) {
        e.preventDefault();
        
        // Reset error states
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').remove();
        
        $('#submitBtn').prop('disabled', true)
            .html('<span class="spinner-border spinner-border-sm me-2"></span>Processing...');
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message || 'Keyword updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = '<?= base_url("admin/keywords") ?>';
                    });
                } else {
                    $('#submitBtn').prop('disabled', false).html('Update');
                    if(response.errors) {
                        let errorMessage = '';
                        $.each(response.errors, function(key, value) {
                            errorMessage += value + '<br>';
                            $('#' + key).addClass('is-invalid')
                                .after('<div class="invalid-feedback">' + value + '</div>');
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            html: errorMessage
                        });
                    } else if(response.message) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message
                        });
                    }
                }
            },
            error: function(xhr, status, error) {
                $('#submitBtn').prop('disabled', false).html('Update');
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Something went wrong. Please try again.'
                });
            }
        });
    });
    
    // Reset validation on input
    $('input').on('input', function() {
        $(this).removeClass('is-invalid').next('.invalid-feedback').remove();
    });
});
</script> 
