<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Dashboard</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i class="iconly-Home icli svg-color"></i></a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid starts-->
<div class="container-fluid general-widget">
    <div class="row">
        <div class="col-sm-6 col-xl-3 box-col-6">
            <div class="card widget-1">
                <div class="card-body">
                    <div class="widget-content">
                        <div class="widget-round danger">
                            <div class="bg-round">
                                <i class="icon-user fa-lg"> </i>
                                <svg class="half-circle svg-fill">
                                    <use href="<?= base_url(); ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4>10,000</h4><span class="f-light">Total Publisher</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 box-col-6">
            <div class="card widget-1">
                <div class="card-body">
                    <div class="widget-content">
                        <div class="widget-round primary">
                            <div class="bg-round">
                                <i class="icon-user fa-lg"> </i>
                                <svg class="half-circle svg-fill">
                                    <use href="<?= base_url(); ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4>4,200</h4><span class="f-light">Total Advertiser</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 box-col-6">
            <div class="card widget-1">
                <div class="card-body">
                    <div class="widget-content">
                        <div class="widget-round secondary">
                            <div class="bg-round">
                                <i class="icon-announcement fa-lg"> </i>
                                <svg class="half-circle svg-fill">
                                    <use href="<?= base_url(); ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4>7000</h4><span class="f-light">Total Campaigns</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 box-col-6">
            <div class="card widget-1">
                <div class="card-body">
                    <div class="widget-content">
                        <div class="widget-round success">
                            <div class="bg-round">
                                <i class="icon-world fa-lg"> </i>
                                <svg class="half-circle svg-fill">
                                    <use href="<?= base_url(); ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4>5700</h4><span class="f-light">Total Websites</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-12 box-col-12">
            <div class="col-md-3 mb-2">
                <input class="form-control digits" type="month" id="monthInput">
                <script>
                    const today = new Date();
                    const year = today.getFullYear();
                    const month = String(today.getMonth() + 1).padStart(2, '0');
                    document.getElementById('monthInput').value = `${year}-${month}`;
                </script>
            </div>
            <div class="card">
                <div class="card-header card-no-border pb-0">
                    <h3>Statistics </h3>
                </div>
                <div id="statschart"></div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6 box-col-6">
            <div class="card">
                <div class="card-header card-no-border pb-0">
                    <h3>Browser </h3>
                </div>
                <div class="card-body apex-chart">
                    <div id="browserchart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6 box-col-6">
            <div class="card">
                <div class="card-header card-no-border pb-0">
                    <h3>Device </h3>
                </div>
                <div class="card-body apex-chart">
                    <div id="devicechart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6 box-col-6">
            <div class="card">
                <div class="card-header card-no-border pb-0">
                    <h3>Operating System </h3>
                </div>
                <div class="card-body apex-chart">
                    <div id="oschart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6 box-col-6">
            <div class="card">
                <div class="card-header card-no-border pb-0">
                    <h3>Country </h3>
                </div>
                <div class="card-body apex-chart">
                    <div id="countrychart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->