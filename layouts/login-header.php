<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faculty Profile System</title>
    <link rel="stylesheet" href="<?php echo url_for('assets/css/style.css')?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo url_for('assets/css/adminlte.min.css')?>">
</head>
<body>
<div class="jumbotron jumbotron-main">
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <div class="navbar-brand">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="<?php echo url_for('index.php')?>" >Faculty Profile System</a>
            </div>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-link"><a href="<?php echo url_for('index.php')?>">HOME</a></li>
                    <li class="nav-link"><a href="<?php echo url_for('about.php')?>">ABOUT</a></li>
                    <li class="nav-link"><a href="<?php echo url_for('contact.php')?>">CONTACT</a></li>
                    <li class="nav-link"><a href="<?php echo url_for('profile.php')?>">PROFILE</a></li>
                    <li class="active nav-link"><a href="<?php echo url_for('login.php')?>">LOGIN</a></li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container">
    <h1>LOGIN</h1>
</div>
</div>