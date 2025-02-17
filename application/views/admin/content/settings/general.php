<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>General Setting</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i class="iconly-Home icli svg-color"></i></a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item">Settings</li>
                    <li class="breadcrumb-item active">General</li>
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
            <div class="horizontal-wizard-wrapper vertical-options vertical-variations">
                <div class="row g-3">
                    <div class="col-xl-3 main-horizontal-header">
                        <div class="card">
                            <div class="card-body">
                                <div class="nav nav-pills horizontal-options" id="vertical-n-wizard-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="wizard-n-info-tab" data-bs-toggle="pill" href="#wizard-n-info" role="tab" aria-controls="wizard-n-info" aria-selected="true">
                                        <div class="horizontal-wizard">
                                            <div class="stroke-icon-wizard"><span>1</span></div>
                                            <div class="horizontal-wizard-content">
                                                <h5 class="f-w-600">General</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="nav-link" id="bank-n-wizard-tab" data-bs-toggle="pill" href="#bank-n-wizard" role="tab" aria-controls="bank-n-wizard" aria-selected="false">
                                        <div class="horizontal-wizard">
                                            <div class="stroke-icon-wizard"><span>2</span></div>
                                            <div class="horizontal-wizard-content">
                                                <h5 class="f-w-600">Integration</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="nav-link" id="inquiry-n-wizard-tab" data-bs-toggle="pill" href="#inquiry-n-wizard" role="tab" aria-controls="inquiry-n-wizard" aria-selected="false">
                                        <div class="horizontal-wizard">
                                            <div class="stroke-icon-wizard"><span>3</span></div>
                                            <div class="horizontal-wizard-content">
                                                <h5 class="f-w-600">System</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="nav-link" id="inquiry-n-wizard-tab" data-bs-toggle="pill" href="#inquiry-n-wizard" role="tab" aria-controls="inquiry-n-wizard" aria-selected="false">
                                        <div class="horizontal-wizard">
                                            <div class="stroke-icon-wizard"><span>4</span></div>
                                            <div class="horizontal-wizard-content">
                                                <h5 class="f-w-600">Users</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="nav-link" id="pay-n-wizard-tab" data-bs-toggle="pill" href="#pay-n-wizard" role="tab" aria-controls="pay-n-wizard" aria-selected="false">
                                        <div class="horizontal-wizard">
                                            <div class="stroke-icon-wizard"><span>5</span></div>
                                            <div class="horizontal-wizard-content">
                                                <h5 class="f-w-600">Security</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="nav-link" id="successful-n-wizard-tab" data-bs-toggle="pill" href="#successful-n-wizard" role="tab" aria-controls="successful-n-wizard" aria-selected="false">
                                        <div class="horizontal-wizard">
                                            <div class="stroke-icon-wizard"><span>5</span></div>
                                            <div class="horizontal-wizard-content">
                                                <h5 class="f-w-600">Cron</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <form>
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content dark-field" id="vertical-n-wizard-tabContent">
                                        <div class="tab-pane fade show active" id="wizard-n-info" role="tabpanel" aria-labelledby="wizard-n-info-tab">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="siteName">Website Name</label>
                                                        <input class="form-control" id="siteName" type="text" placeholder="Enter website name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="tagline">Tagline</label>
                                                        <input class="form-control" id="tagline" type="text" placeholder="Enter tagline">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="keywords">Keywords</label>
                                                        <textarea class="form-control" id="keywords" placeholder="Enter keywords"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="description">Description</label>
                                                        <textarea class="form-control" id="description" placeholder="Enter description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="logo">Logo</label>
                                                        <input class="form-control" id="logo" type="file" placeholder="Upload logo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="favicon">Favicon</label>
                                                        <input class="form-control" id="favicon" type="file" placeholder="Upload favicon">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="timezone">Timezone</label>
                                                        <select class="form-select" id="timezone">
                                                            <option value="">Select timezone</option>
                                                            <option value="UTC-12">UTC-12</option>
                                                            <option value="UTC-11">UTC-11</option>
                                                            <option value="UTC-10">UTC-10</option>
                                                            <!-- Add more timezone options as needed -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="bank-n-wizard" role="tabpanel" aria-labelledby="bank-n-wizard-tab">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="description">Front Head</label>
                                                        <textarea class="form-control" id="description" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="description">Front Footer</label>
                                                        <textarea class="form-control" id="description" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="description">Admin Panel Head</label>
                                                        <textarea class="form-control" id="description" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="description">Admin Panel Footer</label>
                                                        <textarea class="form-control" id="description" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="description">Publisher Head</label>
                                                        <textarea class="form-control" id="description" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="description">Publisher Footer</label>
                                                        <textarea class="form-control" id="description" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="description">Advertiser Head</label>
                                                        <textarea class="form-control" id="description" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="description">Advertiser Footer</label>
                                                        <textarea class="form-control" id="description" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="inquiry-n-wizard" role="tabpanel" aria-labelledby="inquiry-n-wizard-tab">
                                            <!--Content Here-->
                                        </div>
                                        <div class="tab-pane fade" id="pay-n-wizard" role="tabpanel" aria-labelledby="pay-n-wizard-tab">
                                            <!--Content Here-->
                                            adws
                                        </div>
                                        <div class="tab-pane fade" id="successful-n-wizard" role="tabpanel" aria-labelledby="successful-n-wizard-tab">
                                            <!--Content Here-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>