<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Websites</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i class="iconly-Home icli svg-color"></i></a></li>
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
                        <div class="col-md-4 mb-2">
                            <form id="keyword-form">
                                <div class="input-wrapper" id="input-wrapper">
                                    <!-- Tag yang sudah dipilih akan muncul di sini -->
                                    <input type="text" id="keyword-input" class="tag-input" placeholder="All Keyword">
                                    <div class="dropdown" id="dropdown">
                                        <div data-value="Data1">Data1</div>
                                        <div data-value="Data2">Data2</div>
                                        <div data-value="Data3">Data3</div>
                                        <div data-value="Data4">Data4</div>
                                        <div data-value="Data5">Data5</div>
                                    </div>
                                </div>
                                <!-- Input tersembunyi untuk menyimpan hasil akhir (comma separated) -->
                                <input type="hidden" id="result" name="result">
                            </form>
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
                        <table class="display" id="advertiser">
                            <thead>
                                <tr>
                                    <th>Web ID</th>
                                    <th>Website Name</th>
                                    <th>Domain</th>
                                    <th>Keywords</th>
                                    <th>Publisher</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>WEB001</td>
                                    <td>Tech Blog</td>
                                    <td><a href="http://techblog.com" target="_blank">techblog.com</a></td>
                                    <td>
                                        <span class="badge bg-info text-white rounded-pill">technology</span>
                                        <span class="badge bg-info text-white rounded-pill">gadgets</span>
                                        <span class="badge bg-info text-white rounded-pill">review</span>
                                    </td>
                                    <td>John Doe</td>
                                    <td>
                                        <span class="badge bg-success text-white rounded-pill px-3">Active</span>
                                        <span class="badge bg-info text-white rounded-pill px-3">Verified</span>
                                    </td>
                                    <td>
                                        <ul class="action">
                                            <li class="view me-2">
                                                <a href="#"><i class="icon-eye"></i></a>
                                            </li>
                                            <li class="edit me-2">
                                                <a href="#"><i class="icon-pencil-alt"></i></a>
                                            </li>
                                            <li class="delete me-2">
                                                <a href="javascript:void(0)" onclick="deleteWebsite('#')"><i class="icon-trash"></i></a>
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