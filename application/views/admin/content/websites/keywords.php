<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Keywords</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i class="iconly-Home icli svg-color"></i></a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item">Websites</li>
                    <li class="breadcrumb-item active">Keywords</li>
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
                        <a href="#" class="btn btn-outline-info">+ New Keyword</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="display" id="advertiser">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Keyword Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PUB001</td>
                                    <td>John Doe</td>
                                    <td>
                                        <span class="badge bg-success text-white rounded-pill px-3">Active</span>
                                    </td>
                                    <td>
                                        <ul class="action">
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
