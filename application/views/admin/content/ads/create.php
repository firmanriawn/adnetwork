<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2 class="text-primary">Create New Ads</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb float-end">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i class="iconly-Home icli svg-color"></i></a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item">Ads</li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid starts-->
<div class="container-fluid general-widget">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="horizontal-wizard-wrapper">
                        <div class="row g-3">
                            <div class="col-12 main-horizontal-header">
                                <div
                                    class="nav nav-pills horizontal-options"
                                    id="horizontal-wizard-tab"
                                    role="tablist"
                                    aria-orientation="vertical">
                                    <a
                                        class="nav-link active"
                                        id="wizard-info-tab"
                                        data-bs-toggle="pill"
                                        href="#wizard-info"
                                        role="tab"
                                        aria-controls="wizard-info"
                                        aria-selected="true">
                                        <div class="horizontal-wizard">
                                            <div class="stroke-icon-wizard">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                            <div class="horizontal-wizard-content">
                                                <h5>Personal info</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <a
                                        class="nav-link"
                                        id="bank-wizard-tab"
                                        data-bs-toggle="pill"
                                        href="#bank-wizard"
                                        role="tab"
                                        aria-controls="bank-wizard"
                                        aria-selected="false">
                                        <div class="horizontal-wizard">
                                            <div class="stroke-icon-wizard">
                                                <i class="fa-solid fa-link-slash"></i>
                                            </div>
                                            <div class="horizontal-wizard-content">
                                                <h5>Connect bank account</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <a
                                        class="nav-link"
                                        id="successful-wizard-tab"
                                        data-bs-toggle="pill"
                                        href="#successful-wizard"
                                        role="tab"
                                        aria-controls="successful-wizard"
                                        aria-selected="false">
                                        <div class="horizontal-wizard">
                                            <div class="stroke-icon-wizard">
                                                <i class="fa-solid fa-users"></i>
                                            </div>
                                            <div class="horizontal-wizard-content">
                                                <h5>Completed</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="tab-content dark-field" id="horizontal-wizard-tabContent">
                    <div
                        class="tab-pane fade show active"
                        id="wizard-info"
                        role="tabpanel"
                        aria-labelledby="wizard-info-tab">
                        <form class="row g-3 needs-validation basic-form" novalidate="">
                            <!-- Konten di sini telah dihapus -->
                        </form>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="bank-wizard"
                        role="tabpanel"
                        aria-labelledby="bank-wizard-tab">

                        
                    </div>

                    <div
                        class="tab-pane fade"
                        id="successful-wizard"
                        role="tabpanel"
                        aria-labelledby="successful-wizard-tab">
                        <div class="form-completed">
                            <!-- Konten di sini telah dihapus -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>