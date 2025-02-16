<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Publisher</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i class="iconly-Home icli svg-color"></i></a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Publisher</li>
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
                        <a href="#" class="btn btn-outline-info">+ New Publisher</a>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select class="form-select" id="statusFilter">
                                <option value="">All</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Blocked">Blocked</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select class="form-select" id="statusFilter">
                                <option value="Verified">All</option>
                                <option value="Verified">Verified</option>
                                <option value="Unverified">Unverified</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="display" id="publisher">
                            <thead>
                                <tr>
                                    <th>Publisher ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Balance</th>
                                    <th>Total Site</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PUB001</td>
                                    <td>John Doe</td>
                                    <td>johndoe@email.com</td>
                                    <td>
                                        <span class="badge bg-success text-white rounded-pill px-3">Active</span>
                                        <span class="badge bg-info text-white rounded-pill px-3">Verified</span>
                                    </td>
                                    <td>
                                        <span class="text-success fw-bold">$209.00</span>
                                    </td>
                                    <td>2</td>
                                    <td>
                                        <ul class="action">
                                            <li class="view me-2">
                                                <a href="#"><i class="icon-eye"></i></a> 
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
