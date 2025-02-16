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
            <div class="card">
                <div class="card-body">
                    <!-- Filter controls -->
                    <div class="row mb-3">
                        <div class="col-md-2 mb-2">
                            <select class="form-select" id="statusFilter">
                                <option value="">All Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Processing">Processing</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="display" id="advertiser">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Publisher</th>
                                    <th>Method</th>
                                    <th>Amount</th>
                                    <th>Request Date</th>
                                    <th>Process Date</th>
                                    <th>Status</th>
                                    <th>Transaction Reference</th>
                                    <th>Admin Remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>Bank Transfer</td>
                                    <td>$100</td>
                                    <td>2022-01-01</td>
                                    <td>2022-01-02</td>
                                    <td>Processed</td>
                                    <td>TRX123456</td>
                                    <td>No remarks</td>
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