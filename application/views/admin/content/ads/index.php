<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Ads</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i class="iconly-Home icli svg-color"></i></a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Ads</li>
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
            <div class="card-body live-dark">
                <div class="alert alert-light-dark light alert-dismissible fade show text-dark border-left-wrapper mb-0" role="alert"><i class="fa-solid fa-circle-info"> </i>
                    <p class="mb-0">If you add an ad on this page, the ad will be marked for the admin account and make sure you have a balance.</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Filter controls -->
                    <div class="row mb-3">
                        <div class="col-md-2 mb-2">
                            <a href="<?= base_url();?>admin/ads/create" class="btn btn-outline-info">+ New Ads</a>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select class="form-select" id="statusFilter">
                                <option value="">All Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Blocked">Blocked</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="display" id="advertiser">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Advertiser</th>
                                    <th>Title</th>
                                    <th>Url</th>
                                    <th>Keywords</th>
                                    <th>Geo</th>
                                    <th>Device</th>
                                    <th>Os</th>
                                    <th>Browser</th>
                                    <th>Start/End</th>
                                    <th>CPM/CPC Limit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PUB001</td>
                                    <td>PUB001</td>
                                    <td>PUB001</td>
                                    <td>PUB001</td>
                                    <td>PUB001</td>
                                    <td>PUB001</td>
                                    <td>PUB001</td>
                                    <td>PUB001</td>
                                    <td>PUB001</td>
                                    <td>PUB001</td>
                                    <td>PUB001</td>
                                    <td>PUB001</td>
                                    <td>
                                        <ul class="action">
                                            <li class="view me-2">
                                                <a href="#"><i class="icon-eye"></i></a>
                                            </li>
                                            <li class="view me-2">
                                                <a href="#"><i class="icon-bar-chart"></i></a>
                                            </li>
                                            <li class="edit me-2">
                                                <a href="#"><i class="icon-pencil-alt"></i></a>
                                            </li>
                                            <li class="delete me-2">
                                                <a href="javascript:void(0)" onclick="deletePublisher('#')"><i class="icon-trash"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Zero Configuration  Ends-->
    </div>
</div>