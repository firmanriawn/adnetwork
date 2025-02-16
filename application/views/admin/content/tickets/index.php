<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Support Tickets</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i class="iconly-Home icli svg-color"></i></a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Tickets</li>
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
                            <select class="form-select" id="priorityFilter">
                                <option value="">All Priority</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select class="form-select" id="statusFilter">
                                <option value="">All Status</option>
                                <option value="open">Open</option>
                                <option value="pending">Pending</option>
                                <option value="resolved">Resolved</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="display" id="publisher">
                            <thead>
                                <tr>
                                    <th>Ticket ID</th>
                                    <th>User ID</th>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Assigned To</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>101</td>
                                    <td>Example Subject</td>
                                    <td>Example description of the ticket.</td>
                                    <td>
                                        <span class="badge bg-warning text-white">Medium</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info text-white">Open</span>
                                    </td>
                                    <td>Admin User</td>
                                    <td>2023-10-01 12:00:00</td>
                                    <td>2023-10-01 12:00:00</td>
                                    <td>
                                        <ul class="action">
                                            <li class="view me-2">
                                                <a href="#"><i class="icon-eye"></i></a> 
                                            </li>
                                            <li class="edit me-2">
                                                <a href="#"><i class="icon-pencil-alt"></i></a>
                                            </li>
                                            <li class="delete me-2">
                                                <a href="javascript:void(0)" onclick="deleteTicket('#')"><i class="icon-trash"></i></a>
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
