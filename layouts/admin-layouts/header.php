<?php if(!isset($title)){
    $title = "";
} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo url_for('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?php echo url_for('assets/css/admin.css') ?>">
    <link rel="stylesheet" href="<?php echo url_for('assets/css/adminlte.min.css')?>">

    <link rel="stylesheet" href="<?php echo url_for('assets/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo url_for('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">

    <link rel="stylesheet" href="<?php echo url_for('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
    <link rel="stylesheet" href="<?php echo url_for('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
    <link rel="stylesheet" href="<?php echo url_for('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')?>">


    <link rel="stylesheet" href="<?php echo url_for('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">

    <title><?php echo $title ?></title>
</head>
<body class="hold-transition sidebar-mini  layout-navbar-fixed  layout-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block mt-1 ml-3">
                <h3><?php echo $title ?></h3>
            </li>
        </ul>
    </nav>
    <?php include 'aside.php'?>
    <div class="content-wrapper">