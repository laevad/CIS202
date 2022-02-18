<?php require_once '../functions/initialize.php' ?>
<?php require_login(); ?>
<?php $title = 'Faculty Profile System' ?>
<?php include '../layouts/admin-layouts/header.php' ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo url_for('admin/')?>">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fa fa-chart-line"></i>
                    Faculty Count per Department
                </div>
                <div class="card-body">
                    <canvas class="chart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fa fa-chart-line"></i>
                    Faculty Count based on Highest Degree
                </div>
                <div class="card-body">
                    <canvas class="chart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3 ">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fa fa-chart-line"></i>
                    Faculty Count based on Rank
                </div>
                <div class="card-body">
                    <canvas class="chart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../layouts/admin-layouts/footer.php' ?>





